<?php
if (isset($_GET['ctrl'])) {
    switch ($_GET['ctrl']) {
        case 'page':
            include_once 'controller/admin/ctrl_page.php';
            break;
        case 'films':
            include_once 'controller/admin/ctrl_film.php';
            break;
        case 'user':
            include_once 'controller/admin/ctrl_user.php';
            break;
        default:
            echo "Trang không tồn tại";
    }
} else {
    include_once 'controller/admin/ctrl_page.php';
}
