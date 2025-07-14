<?php include_once 'handleCate.php' ?>
<div class="admin-container">

    <main class="content">
        <header>
            <h1>Quản Lý Danh Mục</h1>
        </header>

        <section class="product-management">
            <!-- Product Table on the Left -->
            <div class="add-product">
                <form method="post" action="#" enctype="multipart/form-data">
                    Thể loại<input type="text" name="name">
                    <input type="file" name="images" required accept="image/*">

                    <div class="form-buttons">
                        <button name="uploadCate" type="submit">Thêm</button>
                    </div>
                </form>
            </div>
            <div class="product-table">
                <h2>Thông tin chi tiết</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Thể loại</th>
                            <th>Hình</th>
                            <th class="sua_xoa"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($getCate as $key) { ?>
                            <tr>
                                <td><?= $key['category_id'] ?></td>
                                <td><?= $key['catagory_name'] ?></td>
                                <td><?= $key['img'] ?></td>
                                <td class="sua_xoa">

                                    <a href="?ctrl=films&view=updateCate&id=<?= $key['category_id'] ?>"
                                        style='color:white;padding:5px'>Sửa</a>

                                    <form action="" method="post">
                                        <input type="hidden" name="cate_id" value="<?= $key['category_id'] ?>">
                                        <button name="delCate">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </section>
    </main>
</div>