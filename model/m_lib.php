<?php
include_once "database.php";

function getLibByUserId($userId)
{
    $sql = "
        SELECT 
            f.*, 
            c.catagory_name 
        FROM 
            library l 
        JOIN 
            film f 
            ON l.film_id = f.film_id 
        JOIN 
            category c 
            ON f.category_id = c.category_id 
        WHERE 
            l.user_id = :userId
    ";
    return pdo_query($sql, ['userId' => $userId]);
}


function addLib($userId, $filmId)
{
    $checkSql = "SELECT COUNT(*) AS count FROM library WHERE user_id = :userId AND film_id = :filmId";
    $checkResult = pdo_query_one($checkSql, ['userId' => $userId, 'filmId' => $filmId]);

    if ($checkResult['count'] > 0) {
        return  'Phim đã tồn tại trong thư viện.';
    }
    $sql = "INSERT INTO library (user_id, film_id) VALUES (:userId, :filmId)";
    $result = pdo_execute($sql, ['userId' => $userId, 'filmId' => $filmId]);

    if ($result) {
        return 'Thêm phim thành công.';
    } else {
        return  'Thêm phim thất bại.';
    }
}

function delLib($userId, $filmId)
{
    $sql = "DELETE FROM library WHERE user_id = :userId AND film_id = :filmId";
    $result = pdo_execute($sql, ['userId' => $userId, 'filmId' => $filmId]);

    if ($result) {
        return 'Xóa phim thành công.';
    } else {
        return 'Xóa phim thất bại.';
    }
}
