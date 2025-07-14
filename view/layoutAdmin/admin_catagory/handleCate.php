<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['uploadCate'])) {
    $name = $_POST['name'];
    $img = $_FILES['images']['name'];
    $productExists = false;
    foreach ($getCate as $cate) {
        if ($cate['catagory_name'] == $name) {
            $productExists = true;
            break;
        }
    }
    if ($productExists) {
        echo "Đã trùng vói tên danh mục khác.";
    } else {
        $target_file = 'public/img/' . basename($img);

        if (!file_exists($target_file)) {
            move_uploaded_file($_FILES['images']['tmp_name'], $target_file);
        }
        addCate($name, $img);
        header("Location: " . $_SERVER['REQUEST_URI']);

        exit;
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delCate'])) {
    $id = $_POST['cate_id'];
    if ($id) {
        $message = deleteCate($id);
        echo "<script>
        alert('$message');
        window.location.href='admin.php?ctrl=films&view=genre';
    </script>";
    } else {
        echo "<script>alert('ID danh mục không hợp lệ!');</script>";
    }
    // header("Location: admin.php?ctrl=films&view=genre");
    // exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_POST['updateCate'])) {
        $name = $_POST['namecate'];
        $img = $_FILES['images']['name'];
        $productExists = false;
        foreach ($getAllCate as $cate) {
            if ($cate['catagory_name'] == $name) {
                $productExists = true;
                break;
            }
        }
        if ($productExists) {
            echo "Đã trùng vói tên danh mục khác.";
        } else {
            $target_file = 'public/img/' . basename($img);

            if (!file_exists($target_file)) {
                move_uploaded_file($_FILES['images']['tmp_name'], $target_file);
            }
            updateCate($id, $name, $img);
            header("Location: admin.php?ctrl=films&view=genre");

            exit;
        }
    }
}
