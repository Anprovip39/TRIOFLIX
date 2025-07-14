<?php
if (isset($_GET['view'])) {
    switch ($_GET['view']) {
        case 'user':
            $title = 'Người dùng';
            $css_file = 'admin_user.css';
            include_once 'model/admin/m_user.php';
            include_once 'model/admin/m_film.php';
            // include_once 'view/layoutAdmin/admin_user/delete_user.php';
            include_once 'view/layoutAdmin/admin_user/update_user.php';

            $getuser = getAlluser();
            include_once 'view/layoutAdmin/header.php';
            include_once 'view/layoutAdmin/admin_navbar.php';
            include_once 'view/layoutAdmin/admin_user/admin_user.php';
            include_once 'view/layoutAdmin/footer.php';
            break;
        case 'bill':
            $title = 'Hóa đơn';
            $css_file = 'admin_order.css';
            include_once 'model/admin/m_film.php';
            $getpurchase = getAllpurchase();
            include_once 'view/layoutAdmin/header.php';
            include_once 'view/layoutAdmin/admin_navbar.php';
            include_once 'view/layoutAdmin/admin_oder.php';
            include_once 'view/layoutAdmin/footer.php';
            break;
        case 'comment':
            $title = 'Bình luận';
            $css_file = 'admin_comments.css';

            include_once 'model/admin/m_cmt.php';
            include_once 'model/admin/m_film.php';
            include_once 'view/layoutAdmin/admin_cmt/delete_cmt.php';
            $getcommnent = getAllcomment();
            include_once 'view/layoutAdmin/header.php';
            include_once 'view/layoutAdmin/admin_navbar.php';
            include_once 'view/layoutAdmin/admin_cmt/admin_comment.php';
            include_once 'view/layoutAdmin/footer.php';
            break;
    }
} else {
    $title = 'Trang chủ';
    $css_file = 'admin_thongke.css';

    include_once 'view/layoutAdmin/header.php';
    include_once 'view/layoutAdmin/admin_navbar.php';
    include_once 'view/layoutAdmin/admin_thongke.php';
    include_once 'view/layoutAdmin/footer.php';
}
