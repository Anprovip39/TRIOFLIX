<?php
if (isset($_GET['view'])) {
    switch ($_GET['view']) {
        case 'login':
            include_once "view/layoutUser/login/xuli.php";
            include_once "view/layoutUser/login/register.php";
            break;
        case 'user':
            $title = 'Thông tin người dùng';
            $css_file = "info_user.css";
            include_once 'model/m_user.php';
            include_once 'view/header.php';

            include_once 'view/layoutUser/user/handleUser.php';
            include_once 'view/layoutUser/user/user.php';
            include_once 'view/footer.php';
            break;
        case 'reset-pass':
            $title = 'Đổi mật khẩu';
            include_once 'view/layoutUser/login/forgetPass.php';
            break;
        case 'newpass':
            $title = 'Đổi mật khẩu';
            include_once 'view/layoutUser/login/resetpass.php';
            break;
    }
} else {
    $title = 'Trang chủ';
    $js_file = "headerFixed.js";
    $css_file = "home.css";
    include_once 'model/m_film.php';
    $getAllFilm = getAllFilm();
    $getTopFilm = getTopFilm();
    include_once 'view/header.php';
    include_once 'view/home.php';
    include_once 'view/footer.php';
}
