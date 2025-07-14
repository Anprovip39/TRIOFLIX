<?php

// include_once 'layout_user/model/m_comment.php';
// include_once 'layout_user/model/m_film.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['gui'])) {
    $cmt = trim($_POST['cmt']);
    if (isset($_SESSION['user_id'])) {
        if (!empty($cmt)) {
            inputBL($cmt, $_GET['id'], $_SESSION['user_id']);
            $_SESSION['message'] = 'Bình luận của bạn đã được gửi';
            header("Location: " . $_SERVER['REQUEST_URI']);
            exit;
        } else {
            $_SESSION['message'] = 'Vui lòng nhập bình luận';
        }
    } else {
        //exit;
        $_SESSION['message'] = 'Vui lòng đăng nhập để bình luận';
    }
}
