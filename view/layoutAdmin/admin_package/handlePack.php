<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addpack'])) {
        $namePack = $_POST['namePack'];
        $descripe = $_POST['descripe'];
        $price = $_POST['price'];
        $time = $_POST['time'];

        $packExists = false;
        foreach ($getpack as $pack) {
            if ($pack['pack_name'] == $namePack) {
                $packExists = true;
                break;
            }
        }
        if ($packExists) {
            echo "Đã trùng vói tên gói khác.";
        } else {
            updatepack($id, $namePack, $descripe, $price, $time);
            header("Location: admin.php?ctrl=films&view=pack");
            exit;
        }
    }
}
