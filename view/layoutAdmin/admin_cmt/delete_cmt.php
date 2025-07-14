<?php

if (isset($_POST['btnDelete'])) {
    // Lấy user_id từ form và thực hiện xóa người dùng
    $id = $_POST['comment_id'];
    deleteCmt($id);
}
