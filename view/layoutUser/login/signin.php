<div class=" sign_in">
    <form action="#" method="post">
        <h1>Đăng nhập</h1>
        <div class="social_icon">
            <a href="#" class="social"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="social"><i class="bx bxl-google-plus"></i></a>
        </div>
        <p>Hoặc dùng tài khoản của bạn</p>
        <input type="email" name="email" placeholder="Email" required="" />
        <input type="password" name="pass" placeholder="Mật khẩu" required="" />

        <a href="?ctrl=user&view=reset-pass" class="forget">Bạn quên mật khẩu?</a>
        <p style="margin:0;color: red;"><?= $checkLog ?></p>

        <button type="submit" name="log">Đăng nhập</button>
    </form>
</div>