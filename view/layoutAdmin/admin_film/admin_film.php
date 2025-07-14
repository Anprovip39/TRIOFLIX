<?php include_once 'handleFilm.php' ?>
<div class="admin-container">
    <main class="content">
        <header>
            <h1>Quản Lý Phim</h1>
        </header>

        <section class="product-management">
            <!-- Product Table on the Left -->
            <form action="" method="post" enctype="multipart/form-data" class="formFilm">

                <label>
                    Tên phim
                    <input type="text" name="film_name" placeholder="Nhập tên phim" required>
                </label>

                <label>
                    Thể loại
                    <select name="category_id" id="categorySelect" required>
                        <option value="" disabled selected>Chọn thể loại</option>
                        <?php
                        if (!empty($categories)) {
                            // Hiển thị các thể loại
                            foreach ($categories as $category) {
                                echo "<option value='" . $category["category_id"] . "'>" . $category["catagory_name"] . "</option>";
                            }
                        } else {
                            echo "<option value='' disabled>Không có thể loại</option>";
                        }
                        ?>
                    </select>
                </label>

                <label>
                    Diễn viên
                    <input type="text" name="actor" placeholder="Nhập tên diễn viên" required>
                </label>

                <label>
                    Đạo diễn
                    <input type="text" name="director" placeholder="Nhập tên đạo diễn" required>
                </label>
                <label>
                    URL
                    <input type="text" name="url" placeholder="Nhập URL">
                </label>

                <label>
                    Thời lượng
                    <input type="text" name="duration" placeholder="Nhập thời lượng phim">
                </label>

                <label>
                    Mô tả
                    <input type="text" name="description" placeholder="Nhập mô tả phim">
                </label>

                <label>
                    Năm phát hành
                    <input type="number" id="yearInput" name="year" min="1900" max="2100" step="1" placeholder="YYYY" required style="width:100%;">
                </label>
                <label>
                    Ảnh chính
                    <input type="file" name="main_image" required accept="image/*">
                </label>

                <label>
                    Ảnh nền
                    <input type="file" name="background_image" required accept="image/*">
                </label>

                <div class=" form-buttons">
                    <button type="submit" name="addFilm">Add New</button>
                </div>
            </form>
            <div class="product-table">
                <h2 style="color:white">Thông tin chi tiết</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ảnh</th>
                            <th>Tên phim</th>
                            <th>Thể loại</th>
                            <th>Diễn viên</th>
                            <th>Đạo diễn</th>
                            <th>URL</th>
                            <th>Thời lượng</th>
                            <th style="width:200px;">Mô tả</th>
                            <th>Lượt xem</th>
                            <th>Năm phát hành</th>
                            <th>Ngày đăng</th>
                            <th>Ảnh nền</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($getfilm as $key) { ?>
                            <!-- Sample Rows -->
                            <tr>
                                <td><?= $key['film_id'] ?></td>
                                <td><?= $key['img'] ?></td>
                                <td><?= $key['film_name'] ?></td>
                                <td><?= $key['catagory_name'] ?></td>
                                <td><?= $key['actor_name'] ?></td>
                                <td><?= $key['director_name'] ?></td>
                                <td><a href="<?= $key['urlvideo'] ?>"><?= $key['urlvideo'] ?></a></td>
                                <td><?= $key['duration'] ?>min</td>
                                <td><?= $key['descripe'] ?></td>
                                <td><?= $key['views'] ?></td>
                                <td><?= $key['relase_year'] ?></td>
                                <td><?= $key['posted_date'] ?></td>
                                <td><?= $key['bgimg'] ?></td>
                                <td class="sua_xoa">

                                    <a href="?ctrl=films&view=updateFilm&id=<?= $key['film_id'] ?>"
                                        style='color:white;padding:5px'>Sửa</a>

                                    <form action="" method="post">
                                        <input type="hidden" name="film_id" value="<?= $key['film_id'] ?>">
                                        <button name="delFilm" onclick="return confirm('Bạn có chắc chắn muốn xóa phim này?')">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                        <!-- Repeat rows as needed -->
                    </tbody>
                </table>
            </div>

            <!-- Form to Add New Product on the Right -->
            <div class="add-product">
                <!-- <form>
                    <label>Tên phim<input type="text" name=""></label>
                    <label>Thể loại
                        <select name="" id="">
                            <option value="value">123</option>
                        </select>
                    </label>
                    <label>Diễn viên <input type="text" name=""></label>
                    <label>Đạo diễn <input type="text" name=""></label>
                    <label>Colors<input type="text" name=""></label>
                    <label>URL<input type="text" name=""></label>
                    <label>Thời lượng<input type="text" name=""></label>
                    <label>Mô tả<input type="text" name=""></label>
                    <label>Năm phát hành<input type="number" id="yearInput" name="year" min="1900" max="2100" step="1" placeholder="YYYY"></label>
                    <label>Ngày Đăng<input type="date" name=""></label>
                    <label>Ảnh chính <input type="file" name=""></label>
                    <label>Ảnh nền <input type="file" name=""></label>
                    <div class="form-buttons">
                        <button type="submit">Add New</button>
                        <button type="button">Cancel</button>
                    </div>
                </form> -->


            </div>
        </section>
    </main>
</div>