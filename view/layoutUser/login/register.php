<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Đăng Ký - Đăng Nhập</title>
  <link rel="stylesheet" href="public/css/login.css">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
    rel="stylesheet" />
  <link
    href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
    rel="stylesheet" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
</head>

<body>
  <div class="container <?= $form_status == 'signUp' ? 'change' : '' ?>" id="main">
    <?php include_once 'signup.php'; ?>
    <?php include_once 'signin.php'; ?>
    <div class="che-container">
      <div class="che">
        <div class="che-left">
          <h1><a href="?page=home" class="logo">Trioflix</a> Xin Chào!</h1>
          <p>Để đăng ký, vui lòng đăng nhập thông tin cá nhân của bạn!</p>
          <button id="signIn">Đăng nhập</button>
        </div>
        <div class="che-right">
          <h1><a href="?page=home" class="logo">Trioflix</a> Xin Chào!</h1>
          <p>Nếu bạn chưa có tài khoản, hãy đăng ký!</p>
          <button id="signUp">Đăng ký</button>
        </div>
      </div>
    </div>
  </div>
  <script>
    const signUp = document.getElementById("signUp");
    const signIn = document.getElementById("signIn");

    const main = document.getElementById("main");
    signUp.addEventListener("click", () => {
      main.classList.add("change");
    });
    signIn.addEventListener("click", () => {
      main.classList.remove("change");
    });
  </script>
</body>

</html>