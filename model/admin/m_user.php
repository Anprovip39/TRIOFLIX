<?php
include_once 'model/database.php';
function deleteUser($user_id)
{
    $sql = "DELETE FROM user WHERE user_id = :user_id";
    pdo_execute($sql, [
        ':user_id' => $user_id,
    ]);
}


function toggleUserRole($user_id, $current_role)
{
    $new_role = ($current_role == 0) ? 1 : 0;

    $sql = "UPDATE user SET role = :role WHERE user_id = :user_id";
    pdo_execute($sql, [
        ':user_id' => $user_id,
        ':role' => $new_role,
    ]);
}
