<div class="sign_up">
    <form action="#" method="post">
        <h1>Tạo tài khoản</h1>
        <div class="social_icon">
            <a href="#" class="social"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="social"><i class="bx bxl-google-plus"></i></a>
        </div>
        <p>Hoặc dùng Email của bạn để đăng ký</p>
        <input type="text" name="txt" placeholder="Họ và tên" required="" />
        <input type="email" name="email" placeholder="Email" required="" />
        <input type="password" name="pass" placeholder="Mật khẩu" required="" />
        <input type="password" name="repass" placeholder="Nhập lại mật khẩu" required="" />
        <?php if (isset($eSign)) { ?>
            <p style="margin:0;color: red;"><?= $eSign ?></p>
        <?php } elseif (isset($cSign)) { ?>
            <p style="margin:0;color: green;"><?= $cSign ?></p>
        <?php } ?>
        <button type="submit" name="sign">Đăng ký</button>
    </form>
</div>