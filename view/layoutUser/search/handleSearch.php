<?php
if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];

    // Gọi hàm tìm kiếm
    $results = searchFilms($keyword);
}
