<?php
include_once "database.php";

function getBL($id)
{
    $sql = "SELECT bl.comment, bl.film_id, DATE_FORMAT(bl.time, '%d/%m/%Y') AS time, 
                    kh.username 
            FROM comment bl 
            JOIN user kh ON bl.user_id = kh.user_id 
            WHERE bl.film_id = :id ORDER BY bl.comment_id DESC";
    return pdo_query($sql, [
        ':id' => $id,
    ]);
}

function inputBL($cmt, $idhh, $idkh)
{
    $sql = "INSERT INTO comment (comment, film_id, user_id, time) 
            VALUES (:cmt, :idhh, :idkh, CURRENT_DATE)";
    pdo_execute($sql, [
        ':cmt' => $cmt,
        ':idhh' => $idhh,
        ':idkh' => $idkh,
    ]);
}


function countCmt($id)
{
    $sql = "SELECT COUNT(*) AS sobl 
            FROM comment 
            WHERE film_id = :id ";
    return pdo_query($sql, [
        ':id' => $id,
    ]);
}
