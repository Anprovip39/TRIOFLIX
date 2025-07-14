<?php
include_once 'model/database.php';
function deleteCmt($comment_id)
{
    $sql = "DELETE FROM comment WHERE comment_id = :comment_id";
    pdo_execute($sql, [
        ':comment_id' => $comment_id,
    ]);
}
