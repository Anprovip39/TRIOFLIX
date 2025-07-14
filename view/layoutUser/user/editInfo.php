<form class="edit_info" method="post" enctype="multipart/form-data">
    <h2>Thông tin người dùng</h2>
    <div class="infouser">
        <input type="hidden" name="user_id" value="<?= $key['user_id'] ?>" />
        <div class="title">Tên người dùng</div>
        <input
            type="text"
            name="username"
            id=""
            required
            class="input"
            placeholder="<?= $key['username'] ?> (Có thể sửa)" />
    </div>
    <hr />
    <div class="infouser">
        <div class="title">Email</div>
        <div class="email"><?= $key['email'] ?></div>
    </div>
    <hr />
    <div class="infouser">
        <div class="title">Gói đã mua</div>
        <div class="packName">Không có</div>
    </div>
    <hr />
    <?php if (isset($rename)) { ?>
        <p style="padding:20px 0 0;font-size: 1.125rem;color:green"><?= $rename ?></p>
    <?php } ?>
    <div class="infouser" style="justify-content: flex-start">
        <input
            class="userbtn"
            type="submit"
            value="Cập nhật"
            name="capnhat" />
    </div>
</form>