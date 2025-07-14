<div class="admin-container">
    <main class="content">
        <header>
            <h1>Quản Lý Bình Luận</h1>
        </header>
        <div class="user-list">
            <h2>Danh sách</h2>
            <br>
            <table>
                <thead>
                    <tr>
                        <th>Mã</th>
                        <th>Phim</th>
                        <th>Người dùng</th>
                        <th>Nội dung</th>
                        <th>Ngày bình luận</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($getcommnent as $key) { ?>
                        <tr>
                            <td><?= $key['comment_id'] ?></td>
                            <td><?= $key['film_name'] ?></td>
                            <td><?= $key['username'] ?></td>
                            <td><?= $key['comment'] ?></td>
                            <td><?= $key['time'] ?></td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="comment_id" value="<?= $key['comment_id'] ?>">
                                    <button class="delete-btn" name="btnDelete"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa bình luận này?')">Xóa</button>
                                </form>
                                <!-- <button class="delete-btn">Xem</button> -->
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>
</div>