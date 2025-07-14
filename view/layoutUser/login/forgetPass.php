<?php include_once "handleForgetPass.php" ?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Quên Mật Khẩu</title>
</head>

<body>
    <h2>Quên Mật Khẩu</h2>
    <form action="?ctrl=user&view=reset-pass" method="post">
        <label for="email">Nhập email của bạn:</label>
        <input type="email" name="email" required>
        <button type="submit">Gửi yêu cầu đặt lại mật khẩu</button>
    </form>
    <a href="?ctrl=user&view=login">Đăng nhập</a>
</body>

</html>