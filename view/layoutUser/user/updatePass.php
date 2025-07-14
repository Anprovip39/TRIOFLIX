<form class="edit_info" method="post">
    <h2>Đổi mật khẩu</h2>
    <div class="infouser">
        <input type="hidden" name="user_id" value="<?= $key['user_id'] ?>" />
        <div class="title">Mật khẩu cũ</div>
        <input
            type="password"
            name="oldpass"
            id=""
            class="input"
            required />
    </div>
    <hr />
    <div class="infouser">
        <div class="title">Mật khẩu mới</div>
        <input
            type="password"
            name="newpass"
            id=""
            class="input"
            required />
    </div>
    <hr />
    <div class="infouser">
        <div class="title">Xác nhận mật khẩu mới</div>
        <input
            type="password"
            name="renewpass"
            id=""
            class="input"
            required />
    </div>
    <hr />
    <?php if (isset($error)) { ?>
        <p style="padding:20px 0 0;font-size: 1.125rem;color:red"><?= $error ?></p>
    <?php } elseif (isset($success)) { ?>
        <p style="padding:20px 0 0;font-size: 1.125rem;color:green"><?= $success ?></p>
    <?php } ?>
    <div class="infouser" style="justify-content: flex-start">
        <input
            class="userbtn"
            type="submit"
            value="Đổi mật khẩu"
            name="updatepass" />
    </div>
</form>