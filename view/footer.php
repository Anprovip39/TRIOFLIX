    <footer>
        <div class="container footer">
            <div class="footer_elements">
                <div class="footer_elements-logo">
                    <img src="public/img/Trioflix-logo.png" alt="" />
                </div>
                <div class="footer_elements-intro">
                    Xem phim trực tuyến, tận hưởng trọn vẹn những bộ phim yêu thích.
                </div>
                <div class="footer_elements-socials">
                    <a href="" class="social-link">
                        <i class="bx bxl-facebook-circle"></i>
                    </a>
                    <a href="" class="social-link">
                        <i class="bx bxl-twitter"></i>
                    </a>
                    <a href="" class="social-link">
                        <i class="bx bxl-tiktok"></i>
                    </a>
                    <a href="" class="social-link">
                        <i class="bx bxl-instagram"></i>
                    </a>
                    <a href="" class="social-link">
                        <i class="bx bxl-youtube"></i>
                    </a>
                </div>
            </div>
            <div class="footer_elements">
                <div class="elements_title">TRIOFLIX</div>
                <div class="elements_contents">
                    <a href="?ctrl=page&view=about">Về chúng tôi</a><a href="#">Các gói</a><a href="?ctrl=page&view=contact">Liên hệ & Góp ý</a>
                </div>
            </div>
            <div class="footer_elements">
                <div class="elements_title">Tìm kiếm</div>
                <div class="elements_contents">
                    <a href="#">Phim lẻ</a><a href="#">Phim bộ</a>
                </div>
            </div>
            <div class="footer_elements">
                <div class="elements_title">Điều khoản dịch vụ</div>
                <div class="elements_contents">
                    <a href="#">Điều khoản quyền riêng tư</a><a href="#">Điều khoản sử dụng</a>
                </div>
            </div>
        </div>
    </footer>

    <?php if (isset($js_file)) { ?>
        <script src="public/js/<?php echo $js_file; ?>"></script>
    <?php } ?>
    <script src="public/js/index.js"></script>
    </body>

    </html>
    <?php ob_end_flush(); ?>