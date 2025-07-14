<?php include_once 'handleLib.php'; ?>
<div id="contents">
    <div class="mainContents container">
        <div class="title">THƯ VIỆN</div>
        <div class="line-gradient"></div>
        <div class="mainContents_listFilms">
            <?php if (isset($_SESSION['user_id'])) { ?>
                <div class="listFilms_films">
                    <?php if (!empty($getlib)) {
                        foreach ($getlib as $key) { ?>
                            <div class="filmOfLib">
                                <a href="?ctrl=films&view=detail&id=<?= $key['film_id'] ?>" class="film">
                                    <div class="imgFilm">
                                        <img src="public/img/<?= $key['img'] ?>" alt="" />
                                        <div class="imgHover">
                                            <div class="detailImg">
                                                <div class="detailImg_detail rateScore">
                                                    <i class="bx bxs-star"></i>8.5
                                                </div>
                                            </div>
                                            <i class="bx bx-play-circle"></i>
                                        </div>
                                    </div>
                                    <div href="" class="nameFilm"><?= $key['film_name'] ?></div>
                                    <div href="" class="detailFilm">
                                        <div class="detail"><?= $key['duration'] ?>min</div>
                                        <div class="detail line"></div>
                                        <div class="detail"><?= $key['catagory_name'] ?></div>
                                    </div>
                                </a>
                                <form action="" method="post">
                                    <input type="hidden" name="film_id" value="<?= $key['film_id'] ?>">
                                    <button style="background: transparent; border:none;outline:none;"
                                        name="delLib" class="remove"><i class="bx bxs-trash-alt"></i>Xóa</button>
                                </form>
                            </div>
                <?php }
                    } else {
                        echo '</div> Không có phim trong thư viện';
                    }
                } else {
                    echo 'Vui lòng đăng nhập để thêm phim vào thư viện';
                } ?>
                </div>
        </div>
    </div>
</div>