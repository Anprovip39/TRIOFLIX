<?php include_once 'handlePack.php' ?>

<div class="admin-container">
    <main class="content">
        <header>
            <h1>Quản Lý Gói</h1>
        </header>

        <section class="product-management">
            <!-- Product Table on the Left -->
            <div class="product-table">
                <h2>Thông tin chi tiết</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Mô tả</th>
                            <th>Giá</th>
                            <th>Thời Gian</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($getpack as $key) { ?>
                            <tr>
                                <td><?= $key['pack_id'] ?></td>
                                <td><?= $key['pack_name'] ?></td>
                                <td><?= $key['descripe'] ?></td>
                                <td><?= number_format($key['price'], 0, ',', '.') ?> VND</td>
                                <td><?= $key['pack_time'] ?> Tháng</td>
                                <td class="sua_xoa">
                                    <a href="?ctrl=films&view=updatePack&id=<?= $key['pack_id'] ?>"
                                        style='color:white;padding:5px'>Sửa</a>
                                </td>
                            </tr>
                    </tbody>
                <?php } ?>
                </table>
            </div>

            <!-- Form to Add New Product on the Right -->

        </section>
    </main>
</div>