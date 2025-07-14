<?php
include_once "database.php";


function getAllUser()
{
    $sql = "SELECT * FROM user";
    return pdo_query($sql);
}
function getUserByEmail($email)
{
    $sql = "SELECT * FROM user WHERE email = :email";
    $result = pdo_query_one($sql, [':email' => $email]);
    return $result;
}

function signUp($username, $password, $email)
{

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO user (username, pass, email) VALUES (:username, :password, :email)";
    return pdo_execute($sql, [
        ':username' => $username,
        ':password' => $hashed_password,
        ':email' => $email,

    ]);
}



function inFo($id)
{
    $sql = "SELECT * FROM user WHERE user_id = :id";
    return pdo_query($sql, [
        ':id' => $id,
    ]);
}


function updateUser($id, $name)
{
    $sql = "UPDATE user SET username = :name WHERE user_id = :id";
    return pdo_execute($sql, [
        ':name' => $name,
        ':id' => $id,
    ]);
}


function updatePass($id, $pass)
{
    $sql = "UPDATE user SET pass = :pass WHERE user_id = :id";
    return pdo_execute($sql, [
        ':pass' => $pass,
        ':id' => $id,
    ]);
}



function saveResetToken($userId, $token, $expiry)
{
    $sql = "UPDATE user SET reset_token = :token, token_expiry = :expiry WHERE user_id = :id";
    return pdo_execute($sql, [
        ':token' => $token,
        ':expiry' => $expiry,
        ':id' => $userId,
    ]);
}


function getUserByToken($token)
{

    $sql = "SELECT * FROM user
        WHERE reset_token= :token";
    $result = pdo_query_one($sql, [':token' => $token]);
    return $result;
}


function updatePassword($userId, $newPassword)
{
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    $sql = "UPDATE user SET pass = :password, reset_token = NULL, token_expiry = NULL WHERE user_id = :id";
    return pdo_execute($sql, [
        ':password' => $hashedPassword,
        ':id' => $userId,
    ]);
}
function deleteUser($id)
{
    $sql = "DELETE FROM user WHERE id = :id";
    pdo_execute($sql, [
        ':id' => $id,
    ]);
}
// function countU()
// {
//     $sql = "SELECT COUNT(*) as soluong FROM user WHERE role = 0";
//     return pdo_query_one($sql);
// }
