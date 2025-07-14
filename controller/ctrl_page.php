<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './vendor/autoload.php';
if (isset($_GET['view'])) {
    switch ($_GET['view']) {
        case 'home':
            $title = 'Trang chủ';
            $css_file = "home.css";
            $js_file = "headerFixed.js";
            include_once 'model/m_film.php';
            $getAllGenre = getAllGenre();
            $getPack = getPackage();
            include_once 'view/header.php';
            include_once 'view/layoutUser/home.php';
            include_once 'view/footer.php';
            break;
        case 'about':
            $title = 'Về chúng tôi';
            $css_file = "lib.css";
            include_once 'view/header.php';
            include_once 'view/layoutUser/about.php';
            include_once 'view/footer.php';
            break;
        case 'contact':
            $title = 'Liên hệ và góp ý';
            $css_file = "lib.css";
            $errors = '';
            $send_message = '';

            include_once 'view/header.php';
            if (isset($_POST['submit'])) {
                $name = htmlspecialchars($_POST['name']);
                $email = htmlspecialchars($_POST['email']);
                $feedback = htmlspecialchars($_POST['content']);
                if ($_POST['name'] == "") $errors .= "Tên không đc phép rỗng <br>";
                if ($_POST['phone'] == "") $errors .= "Số điện thoại không được phép rỗng <br>";
                // tiep tuc cho email, content
                if ($_POST['email'] == "") $errors .= "Email không được phép rỗng <br>";
                if ($_POST['content'] == "") $errors .= "Content không được phép rỗng<br>";

                if (!$errors) {
                    // gui email
                    //Create an instance; passing `true` enables exceptions
                    $mail = new PHPMailer(true);

                    try {
                        //Server settings

                        $mail->isSMTP();
                        $mail->Host       = 'smtp.gmail.com';
                        $mail->SMTPAuth   = true;
                        $mail->Username   = 'phanlam6373@gmail.com';
                        $mail->Password   = 'fqip gzqy omas tsye';
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                        $mail->Port       = 587;
                        $mail->setFrom($email,  $email);
                        $mail->addAddress('phanlam6373@gmail.com', 'admin');

                        $mail->isHTML(true);
                        $mail->Subject = 'Góp ý từ ' . $name;
                        $mail->Body    = "<h1>Góp ý từ $name</h1><p>Email: $email</p><p>Góp ý:</p><p>$feedback</p>";
                        $mail->AltBody = "Góp ý từ $name\nEmail: $email\Góp ý:\n$feedback";
                        $mail->CharSet = 'UTF-8';
                        $mail->Encoding = 'base64';
                        $mail->send();
                        echo '<script>alert("Góp ý của bạn đã được gửi thành công!")</script>';
                    } catch (Exception $e) {
                        echo "<script>alert('Đã xảy ra lỗi khi gửi email: {$mail->ErrorInfo}')</script>";
                    }
                }
            }

            include_once 'view/layoutUser/contact.php';
            include_once 'view/footer.php';
            break;
        case 'search':
            $title = 'Kết quả tìm kiếm';
            $css_file = "search.css";
            include_once 'model/m_film.php';
            include_once 'view/header.php';
            include_once 'view/layoutUser/search/handleSearch.php';
            include_once 'view/layoutUser/search/search.php';
            include_once 'view/footer.php';
            break;
        case 'package':
            $title = 'Mua gói';
            $js_file = "package.js";
            $css_file = "package.css";
            include_once 'model/m_film.php';
            include_once 'view/header.php';
            include_once 'view/layoutUser/payment/pack.php';
            // include_once 'view/layoutUser/search/search.php';
            include_once 'view/footer.php';
            break;
        case 'test':
            include_once 'model/m_film.php';
            $getAll =  getAllFilm();
            $getTopFilm = getTopFilm();
            $getPackage = getPackage();
            $getNewFilm = getNewFilm();

            $slider = slider();
            $data = [
                'getAllFilm' => $getAll,
                'getAllTopFilm' => $getTopFilm,
                'getAllNewFilm' => $getNewFilm,
                'slider' => $slider,
                'getPackage' => $getPackage,
            ];
            echo json_encode($data);
            include_once 'view/layoutUser/test.php';

            break;
    }
} else {
    $title = 'Trang chủ';
    $js_file = "headerFixed.js";
    $css_file = "home.css";
    include_once 'model/m_film.php';
    $getAllGenre = getAllGenre();
    $getPack = getPackage();
    include_once 'view/header.php';
    include_once 'view/layoutUser/home.php';
    include_once 'view/footer.php';
}
