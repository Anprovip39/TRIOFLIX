<?php
include_once "model/database.php";
function getAllcate()
{
    $sql = "SELECT *from category";
    return pdo_query($sql);
}
function addCate($name, $img)
{
    $sql = "INSERT INTO category (catagory_name, img) VALUES (:name, :img)";
    return pdo_execute($sql, [
        ':name' => $name,
        ':img' => $img,
    ]);
}
function deleteCate($id)
{
    $sqlCheck = "SELECT COUNT(*) AS film_count FROM film WHERE category_id = :id";
    $result = pdo_query_one($sqlCheck, [':id' => $id]);

    if ($result['film_count'] > 0) {
        return "Không thể xóa thể loại vì còn phim";
    }

    $sqlDelete = "DELETE FROM category WHERE category_id = :id";
    $isDeleted = pdo_execute($sqlDelete, [':id' => $id]);

    if ($isDeleted) {
        return "Thể loại đã được xóa thành công.";
    } else {
        return "Xóa thất bại.";
    }
}

function updateCate($category_id, $name, $img)
{
    $sql = "UPDATE category SET catagory_name = :name, img = :img WHERE category_id = :category_id";
    return pdo_execute($sql, [
        ':name'   => $name,
        ':category_id' => $category_id,
        ':img' => $img,
    ]);
}
function filmStatistics()
{
    $sql = 'SELECT c.catagory_name, COUNT(f.film_id) AS num_films
    FROM category c
    LEFT JOIN film f ON c.category_id = f.category_id
    GROUP BY c.catagory_name';
    return pdo_query($sql);
}
