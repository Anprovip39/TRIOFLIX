<!-- reset_password.php -->
<?php

include_once "model/m_user.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $token = $_POST['token'];
    $newPassword = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($newPassword === $confirmPassword) {
        $user = getUserByToken($token);

        if ($user && new DateTime() < new DateTime($user['token_expiry'])) {

            updatePassword($user['user_id'], $newPassword);

            echo "Mật khẩu của bạn đã được đặt lại thành công.";
        } else {
            echo "Token không hợp lệ hoặc đã hết hạn.";
        }
    } else {
        echo "Mật khẩu không khớp.";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Đặt Lại Mật Khẩu</title>
</head>

<body>
    <h2>Đặt Lại Mật Khẩu</h2>
    <form action="" method="post">
        <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token']); ?>">
        <label for="password">Mật khẩu mới:</label>
        <input type="password" name="password" required>
        <label for="confirm_password">Xác nhận mật khẩu mới:</label>
        <input type="password" name="confirm_password" required>
        <button type="submit">Đặt lại mật khẩu</button>
    </form>
    <a href="?ctrl=user&view=login">Đăng nhập</a>

</body>

</html>