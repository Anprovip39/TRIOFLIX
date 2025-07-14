<div id="contents">
    <div class="mainContents container">
        <div class="title">LIÊN HỆ VÀ GÓP Ý</div>
        <div class="line-gradient">
        </div>
        <?php
        if ($errors) echo "<div style='color:red;' >" . $errors . "</div>";
        else echo "<div style='color:blue;'>" . $send_message . "</div>";
        ?>
        <form class="gopy" method="post">
            <h3>Họ và tên</h3>
            <input
                type="text"
                id="name"
                name="name"
                placeholder="Ví dụ: Phan Phúc Lâm"
                required />

            <h3>Số điện thoại</h3>
            <input
                type="text"
                id="phone"
                name="phone"
                placeholder="Ví dụ: 0123456789"
                required />

            <h3>Email</h3>
            <input
                type="email"
                id="email"
                name="email"
                placeholder="Ví dụ: abcde@gmail.com"
                required />

            <h3>Nội dung</h3>
            <textarea
                id="content"
                name="content"
                placeholder="Nhập nội dung bạn cần liên hệ tại đây"
                required></textarea>

            <button type="submit" name='submit' class="btn submit-btn">Gửi</button>
        </form>
    </div>
</div>