<?php
include_once 'model/m_lib.php';

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addLib'])) {
        $filmId = $_POST['film_id'];
        $result = addLib($userId, $filmId);
        if ($result) {
            echo '<script>alert("' . $result . '")</script>';
        }
    }
    $getlib = getLibByUserId($userId);
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delLib'])) {
        $filmId = $_POST['film_id'];
        $result = delLib($userId, $filmId);
        if ($result) {
            echo '<script>alert("' . $result . '")</script>';
            header("Location: " . $_SERVER['REQUEST_URI']);
            exit;
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addLib'])) {
    echo '<script>alert("Vui lòng đăng nhập để thêm phim vào thư viện")</script>';
}
