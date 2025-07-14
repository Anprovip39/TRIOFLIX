<?php

if (isset($_POST['btnDelete'])) {
    // Lấy user_id từ form và thực hiện xóa người dùng
    $user_id = $_POST['user_id'];
    deleteUser($user_id); // Giả sử bạn có hàm deleteUser
    echo "Người dùng đã bị xóa!";
}

if (isset($_POST['change_role'])) {
    // Lấy user_id và role từ form và thực hiện thay đổi vai trò
    $user_id = $_POST['user_id'];
    $role = $_POST['role'];

    // Thay đổi vai trò (0 -> 1 hoặc 1 -> 0)
    toggleUserRole($user_id, $role); // Giả sử bạn có hàm toggleUserRole
    echo "Vai trò người dùng đã được thay đổi!";
}

