<?php
if (isset($_GET['view'])) {
    switch ($_GET['view']) {
        case 'film':
            $title = 'Quản lí phim';
            $css_file = 'admin_products.css';
            include_once 'model/admin/m_film.php';
            include_once 'model/admin/m_cate.php';

            include_once 'view/layoutAdmin/header.php';
            include_once 'view/layoutAdmin/admin_navbar.php';
            $getfilm = getAllFilm();
            $categories = getAllcate();
            include_once 'view/layoutAdmin/admin_film/admin_film.php';
            include_once 'view/layoutAdmin/footer.php';
            break;
        case 'updateFilm':
            $title = 'Cập nhật phim';
            $css_file = 'admin_products.css';
            include_once 'model/admin/m_film.php';
            include_once 'model/admin/m_cate.php';
            include_once 'view/layoutAdmin/header.php';
            include_once 'view/layoutAdmin/admin_navbar.php';
            $getfilm = getAllFilm();
            $categories = getAllcate();
            include_once 'view/layoutAdmin/admin_film/handleFilm.php';
            include_once 'view/layoutAdmin/admin_film/updateFilm.php';
            include_once 'view/layoutAdmin/footer.php';
            break;
        case 'genre':
            $title = 'Danh mục';
            $css_file = 'admin_categories.css';
            include_once 'model/admin/m_cate.php';
            $getCate = getAllcate();
            include_once 'view/layoutAdmin/header.php';
            include_once 'view/layoutAdmin/admin_navbar.php';
            include_once 'view/layoutAdmin/admin_catagory/admin_category.php';
            include_once 'view/layoutAdmin/footer.php';
            break;
        case 'updateCate':
            $title = 'Cập nhật thể loại';
            $css_file = 'admin_categories.css';
            include_once 'model/admin/m_cate.php';
            $getCate = getAllcate();
            include_once 'view/layoutAdmin/header.php';
            include_once 'view/layoutAdmin/admin_navbar.php';
            include_once 'view/layoutAdmin/admin_catagory/handleCate.php';
            include_once 'view/layoutAdmin/admin_catagory/upCate.php';
            include_once 'view/layoutAdmin/footer.php';
            break;
        case 'pack':
            $title = 'Gói';
            $css_file = 'admin_categories.css';
            include_once 'model/admin/m_film.php';
            $getpack = getAllpack();
            include_once 'view/layoutAdmin/header.php';
            include_once 'view/layoutAdmin/admin_navbar.php';
            include_once 'view/layoutAdmin/admin_package/admin_pack.php';
            include_once 'view/layoutAdmin/footer.php';
            break;
        case 'updatePack':
            $title = 'Cập nhật gói';
            $css_file = 'admin_categories.css';
            include_once 'model/admin/m_film.php';
            $getpack = getAllpack();
            include_once 'view/layoutAdmin/header.php';
            include_once 'view/layoutAdmin/admin_navbar.php';
            include_once 'view/layoutAdmin/admin_package/handlePack.php';
            include_once 'view/layoutAdmin/admin_package/updatePack.php';
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
