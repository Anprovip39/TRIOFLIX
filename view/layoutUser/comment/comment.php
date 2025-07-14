<div class="cmts">
    <h3>BÌnh luận (<?= $countCmt[0]['sobl'] ?> bình luận)</h3>
    <form method="post">
        <input type="text" name="cmt" id="cmt" placeholder="Nhập bình luận..." />
        <button class="btn sendCmt" type="submit" name="gui">Gửi</button>
    </form>
    <div class="cmts_box">
        <?php if ($cmts != []) {
            foreach ($cmts as $key) {

        ?>
                <div class="userCmt">
                    <div class="avt">
                        <i class="bx bx-user"></i>

                    </div>
                    <div class="infoUser">
                        <div class="userName"><?= $key['username'] ?></div>
                        <div class="cmtTime"><?= $key['time'] ?></div>
                        <div class="cmtContent"><?= $key['comment'] ?></div>
                    </div>
                </div>
        <?php }
        } else {
            echo '<h1> Không có bình luận! </h1>';
        } ?>
    </div>
</div>