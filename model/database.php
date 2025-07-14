<?php

function pdoGetConnection()
{
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=tuyetvoi_da2", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
        return $conn;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
function pdo_query($sql, $params = [])
{
    $stmt = pdoGetConnection()->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function pdo_query_one($sql, $params = [])
{
    $stmt = pdoGetConnection()->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function pdo_execute($sql, $params = [])
{
    $stmt = pdoGetConnection()->prepare($sql);
    return $stmt->execute($params);
}
