<?php
if (isset($_GET['view'])) {
    switch ($_GET['view']) {
        case 'home':
            $title = 'Trang chủ';
            $css_file = 'admin_thongke.css';
            include_once 'view/layoutAdmin/header.php';
            include_once 'view/layoutAdmin/admin_navbar.php';
            include_once 'view/layoutAdmin/admin_thongke.php';
            include_once 'view/layoutAdmin/footer.php';
            break;
        case 'data':
            include_once 'model/admin/m_cate.php';
            $film_statistics =  filmStatistics();
            $data = [
                'film_statistics' => $film_statistics,
            ];
            echo json_encode($data);
            include_once 'view/layoutAdmin/data.php';
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
