<?php
include_once "model/m_user.php";
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $user = getUserByEmail($email);

    if (is_array($user)) {
        $token = bin2hex(random_bytes(50));
        $expiry = date('Y-m-d H:i:s', strtotime('+1 hour'));
        saveResetToken($user['user_id'], $token, $expiry);
        $resetLink = "http://localhost/duAn1NhomSupercalifragilisticexpialidocious/?ctrl=user&view=newpass&token=" . $token;
        $subject = "Đặt lại mật khẩu của bạn";
        $message = "Nhấp vào liên kết sau để đặt lại mật khẩu của bạn: " . $resetLink;

        $mail = new PHPMailer(true);
        try {

            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'phanlam6373@gmail.com';
            $mail->Password   = 'fqip gzqy omas tsye';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;
            $mail->setFrom('phanlam6373@gmail.com', 'TrioFlix');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $message;
            $mail->CharSet = 'UTF-8';
            $mail->Encoding = 'base64';
            $mail->send();
            echo "Một email đã được gửi đến địa chỉ của bạn để đặt lại mật khẩu.";
        } catch (Exception $e) {
            echo "Đã xảy ra lỗi khi gửi email: {$mail->ErrorInfo}";
        }
    } else {
        echo "Email này không tồn tại trong hệ thống của chúng tôi.";
    }
}
