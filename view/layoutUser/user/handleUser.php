<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['capnhat'])) {
        $user_id = $_POST['user_id'];
        $username = $_POST['username'];
        updateUser($user_id, $username);
        $_SESSION['user_name'] = $username;
        $_SESSION['rename'] = "Tên người dùng đã được cập nhật thành công.";
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit();
    } elseif (isset($_POST['updatepass'])) {
        $user_id = $_POST['user_id'];
        $oldpass = $_POST['oldpass'];
        $newpass = $_POST['newpass'];
        $renewpass = $_POST['renewpass'];
        $user = inFo($user_id);
        $current_pass = $user[0]['pass'];
        if (!password_verify($oldpass, $current_pass)) {
            $_SESSION['error'] = "Mật khẩu cũ không chính xác.";
            header("Location: " . $_SERVER['REQUEST_URI']);
            exit();
        } elseif ($newpass != $renewpass) {
            $_SESSION['error'] = "Mật khẩu mới và mật khẩu xác nhận không khớp.";
            header("Location: " . $_SERVER['REQUEST_URI']);
            exit();
        } else {
            $hashed_newpass = password_hash($newpass, PASSWORD_DEFAULT);
            updatePass($user_id, $hashed_newpass);
            $_SESSION['success'] = "Mật khẩu đã được cập nhật thành công.";
            header("Location: " . $_SERVER['REQUEST_URI']);
            exit();
        }
    }
}
if (isset($_SESSION['success'])) {
    $success = $_SESSION['success'];
    unset($_SESSION['success']);
}
if (isset($_SESSION['rename'])) {
    $rename = $_SESSION['rename'];
    unset($_SESSION['rename']);
}

if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
}
