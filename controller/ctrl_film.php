<?php
// echo "aaa=" . $user_name = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : null;
include_once 'model/m_film.php';
if (isset($_GET['view'])) {
    switch ($_GET['view']) {
        case 'library':
            $title = 'Thư viện';
            $css_file = "lib.css";
            include_once 'view/header.php';
            include_once 'view/layoutUser/library/library.php';
            include_once 'view/footer.php';
            break;
        case 'history':
            $title = 'Lịch sử xem';
            $css_file = "lib.css";
            include_once 'view/header.php';
            include_once 'view/layoutUser/history.php';
            include_once 'view/footer.php';
            break;
        case 'detail':
            include_once 'model/m_comment.php';
            $css_file = "detail.css";
            $js_file = "headerFixed.js";
            include_once 'model/m_film.php';
            if (isset($_GET['id'])) {
                $detail = getFilm($_GET['id']);
                foreach ($detail as $key) {
                    $title = 'Xem phim ' . $key['film_name'];
                };
            }
            include_once 'view/layoutUser/comment/handle_comment.php';
            include_once 'view/layoutUser/comment/show_comment.php';
            include_once 'view/header.php';
            include_once 'view/layoutUser/detail.php';
            include_once 'view/footer.php';
            break;
        case 'genre':
            $title = 'Thể loại';
            $css_file = "genre.css";
            $js_file = "headerFixed.js";
            include_once 'model/m_film.php';
            include_once 'view/header.php';
            $getAll =  getAllFilm();
            $genre = isset($_GET['genreid']) ? $_GET['genreid'] : '';
            $release_year = isset($_GET['year']) ? $_GET['year'] : '';
            $getAllFilmByIdGenre =  getAllFilmByIdGenre($genre, $release_year);
            if ($genre && $release_year) {
                $getAllFilmByIdGenre =  getAllFilmByIdGenre($genre, $release_year);
            }

            include_once 'view/layoutUser/genre.php';
            include_once 'view/footer.php';
            break;
        case 'film':
            include_once 'model/m_comment.php';
            $title = 'Tên phim';
            $css_file = "xemphim.css";
            include_once 'model/m_film.php';
            if (isset($_GET['id'])) {
                $detail = getFilm($_GET['id']);
                foreach ($detail as $key) {
                    $title = 'Xem phim ' . $key['film_name'];
                };
            }
            include_once 'view/layoutUser/comment/handle_comment.php';
            include_once 'view/layoutUser/comment/show_comment.php';
            include_once 'view/header.php';
            include_once 'view/layoutUser/film.php';
            include_once 'view/footer.php';
            break;
    }
} else {
    $title = 'Trang chủ';
    $js_file = "headerFixed.js";
    $css_file = "home.css";
    include_once 'view/header.php';
    include_once 'view/layoutUser/home.php';
    include_once 'view/footer.php';
}
