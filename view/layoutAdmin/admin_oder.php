<div class="admin-container">
        <main class="content">
            <header>
                <h1>Quản Lý Đơn Hàng</h1>
            </header>
            <div class="user-list">
                <h2>Danh sách</h2>
                <br>
                <table>
                    <thead>
                    <tr>
                        <th>Mã</th>
                        <th>Người dùng</th>
                        <th>Mã gói</th>
                        <th>Giá</th>
                        <th>Cách thức thanh toán</th>
                        <th>Ngày mua</th>
                        <th>Ngày hết hạn</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($getpurchase as $key ) {?>
                        <tr>
                            <td><?=$key['purchase_id']?></td>
                            <td><?=$key['username']?></td>
                            <td><?=$key['pack_name']?></td>
                            <td><?=$key['price']?></td>
                            <td><?=$key['payment_method']?></td>
                            <td><?=$key['order_date']?></td>
                            <td><?=date('Y-m-d', strtotime($key['order_date'] . ' + ' . $key['pack_time'] . ' months'))?></td>
                            <td >
                                <button class="delete-btn">Hủy gói</button>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>