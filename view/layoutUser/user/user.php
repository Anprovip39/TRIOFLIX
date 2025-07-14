<?php
$inFo = inFo($_SESSION['user_id']);
?>
<div id="contents">

    <div class="mainContents container">
        <?php foreach ($inFo as $key) { ?>

            <!-- <form
            action=""
            method="post"
            enctype="multipart/form-data"
            class="user_image">
            <input type="hidden" name="user_id" value="1" />
            <input
                type="file"
                name="user_image"
                id="fileUpload"
                accept="image/*"
                style="display: none" />

            <div class="imageuser">
                <img src="" alt="" />
                <label for="fileUpload"><i class="bx bx-camera"></i></label>
            </div>
            <h4 class="name_user">123></h4>

            <input
                class="userbtn"
                value="Cập nhật ảnh"
                type="submit"
                name="changeImg" />
        </form> -->
            <div class="user_edit">
                <?php include_once 'editInfo.php' ?>
                <?php include_once 'updatePass.php' ?>
            <?php } ?>
            </div>
    </div>
</div>