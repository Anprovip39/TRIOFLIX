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
        <button type="submit" name="updateFilm">Update</button>
    </div>
</form>