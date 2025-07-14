<?php
// session_start();
include_once "model/m_user.php";

$users = getAllUser();
$checkSign = "";
$checkLog = "";
$form_status = "signIn";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sign'])) {
    $name = $_POST['txt'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $repassword = $_POST['repass'];
    $kiemTra = false;
    foreach ($users as $key) {
        if ($key['email'] == $email) {
            $kiemTra = true;
            break;
        }
    }
    if ($kiemTra) {
        $_SESSION['eSign'] = "Email này đã được đăng ký";
        $form_status = "signUp";
    } else {
        if ($password !== $repassword) {
            $_SESSION['eSign'] = "Mật khẩu không khớp!";

            $form_status = "signUp";
        } else {
            signUp($name, $password, $email);
            $_SESSION['cSign'] = "Đăng ký thành công!";
            $form_status = "signUp";
        }
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['log'])) {
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $kiemTra = 0;
    foreach ($users as $key) {
        if ($email == $key['email'] && password_verify($password, $key['pass']) && $key['role'] != 1) {
            $_SESSION['user_id'] = $key['user_id'];
            $_SESSION['user_name'] = $key['username'];
            $kiemTra = 1;
            break;
        }
        if ($email == $key['email'] && password_verify($password, $key['pass']) && $key['role'] == 1) {
            $kiemTra = 2;
            break;
        }
    }
    if ($kiemTra == 1) {
        header("location: ?ctrl=page");
        exit();
    } else if ($kiemTra == 2) {

        header("location: admin.php");
        exit();
        // admin
    } else {
        $checkLog = "Email hoặc mật khẩu không đúng";
    }
}
if (isset($_SESSION['cSign'])) {
    $cSign = $_SESSION['cSign'];
    unset($_SESSION['cSign']);
}
if (isset($_SESSION['eSign'])) {
    $eSign = $_SESSION['eSign'];
    unset($_SESSION['eSign']);
}
