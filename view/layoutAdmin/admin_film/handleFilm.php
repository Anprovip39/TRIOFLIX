<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addFilm'])) {
    // Lấy dữ liệu từ form
    $filmName = $_POST['film_name'];
    $categoryId = $_POST['category_id'];
    $actor = $_POST['actor'];
    $director = $_POST['director'];
    $url = $_POST['url'];
    $duration = $_POST['duration'];
    $description = $_POST['description'];
    $releaseYear = $_POST['year'];

    // Xử lý ảnh chính
    $mainImage = $_FILES['main_image']['name'];
    $targetMainImage = 'public/img/' . basename($mainImage);
    if (!file_exists($targetMainImage)) {
        move_uploaded_file($_FILES['main_image']['tmp_name'], $targetMainImage);
    }

    // Xử lý ảnh nền
    $backgroundImage = $_FILES['background_image']['name'];
    $targetBackgroundImage = 'public/img/' . basename($backgroundImage);
    if (!file_exists($targetBackgroundImage)) {
        move_uploaded_file($_FILES['background_image']['tmp_name'], $targetBackgroundImage);
    }

    // Gọi hàm addFilm từ file functions.php để thêm phim
    $result = addFilm($filmName, $categoryId, $actor, $director, $url, $duration, $description, $releaseYear, $mainImage, $backgroundImage);

    if ($result) {
        echo "<script>
        alert('$result');
        window.location.href='admin.php?ctrl=films&view=film';
    </script>";
    } else {
        echo "<script>alert('Lỗi khi thêm phim.')</script>";
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delFilm'])) {
    $id = $_POST['film_id'];
    deleteFilm($id);
    header("Location: admin.php?ctrl=films&view=film");
    exit;
}

if (isset($_GET['id'])) {
    $filmId = $_GET['id'];
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateFilm'])) {
        // Lấy dữ liệu từ form
        $filmName = $_POST['film_name'];
        $categoryId = $_POST['category_id'];
        $actor = $_POST['actor'];
        $director = $_POST['director'];
        $url = $_POST['url'];
        $duration = $_POST['duration'];
        $description = $_POST['description'];
        $releaseYear = $_POST['year'];

        // Xử lý ảnh chính
        $mainImage = $_FILES['main_image']['name'];
        $targetMainImage = 'public/img/' . basename($mainImage);
        if (!file_exists($targetMainImage)) {
            move_uploaded_file($_FILES['main_image']['tmp_name'], $targetMainImage);
        }

        // Xử lý ảnh nền
        $backgroundImage = $_FILES['background_image']['name'];
        $targetBackgroundImage = 'public/img/' . basename($backgroundImage);
        if (!file_exists($targetBackgroundImage)) {
            move_uploaded_file($_FILES['background_image']['tmp_name'], $targetBackgroundImage);
        }

        // Gọi hàm addFilm từ file functions.php để thêm phim
        $result = updateFilm($filmId, $filmName, $categoryId, $actor, $director, $url, $duration, $description, $releaseYear, $mainImage, $backgroundImage);

        if ($result) {
            echo "<script>
            alert('$result');
            window.location.href='admin.php?ctrl=films&view=film';
        </script>";
        } else {
            echo "<script>alert('Lỗi khi cập nhật.')</script>";
        }
    }
}
