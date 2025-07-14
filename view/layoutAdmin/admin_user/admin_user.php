<div class="admin-container">
    <main class="content">
        <header>
            <h1>Quản Lý Người Dùng</h1>
        </header>
        <div class="user-list">
            <h2>Danh sách</h2>
            <br>
            <table>
                <thead>
                    <tr>
                        <th>Mã</th>
                        <th>Người dùng</th>
                        <th>Email</th>
                        <th>Vai trò</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($getuser as $key) { ?>
                        <tr>
                            <td><?= $key['user_id'] ?></td>
                            <td><?= $key['username'] ?></td>
                            <td><?= $key['email'] ?></td>
                            <td> <?php if ($key['role'] == 0) {
                                        echo 'Nguời dùng';
                                    } else {
                                        echo 'Quản trị';
                                    } ?></td>
                            <td>
                                <form action="" method="post">
                                    <!-- Nút Xóa thông tin người dùng -->
                                    <input type="hidden" name="user_id" value="<?= $key['user_id'] ?>">
                                    <button class="delete-btn" name="btnDelete"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này?')">Xóa thông
                                        tin</button>

                                    <!-- Nút Đổi vai trò người dùng -->
                                    <input type="hidden" name="user_id" value="<?= $key['user_id'] ?>">
                                    <!-- Đảm bảo user_id được truyền đúng -->
                                    <input type="hidden" name="role" value="<?= $key['role'] ?>">
                                    <!-- Truyền thông tin role -->
                                    <button class="delete-btn" name="change_role"
                                        onclick="return confirm('Bạn có muốn thay đổi vai trò của người dùng <?= $key['username'] ?>?')">Đổi
                                        vai trò</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>
</div>