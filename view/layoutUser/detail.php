<?php include_once 'library/handleLib.php'; ?>
<div class="contents">
    <div class="slideshow">
        <?php foreach ($detail as $key) { ?>
            <div class="bg"><img src="public/img/<?= $key['bgimg'] ?>" alt="" /></div>
            <div class="slideshow_contents container">
                <div class="contentFilm">
                    <div class="nameFilm"><?= $key['film_name'] ?></div>
                    <div class="detailFilm">
                        <div class="detail"><?= $key['relase_year'] ?></div>
                        <div class="detail line"></div>
                        <div class="detail"><span>16+</span></div>
                        <div class="detail line"></div>
                        <div class="detail"><?= $key['duration'] ?>min</div>
                        <div class="detail line"></div>
                        <div class="detail"><i class="bx bxs-star"></i> 8.5</div>
                    </div>
                    <div class="categories">
                        <a href="?ctrl=films&view=genre&genreid=<?= $key['category_id'] ?>" class="category"><?= $key['catagory_name'] ?></a>
                    </div>
                    <div class="description">
                        <?= $key['descripe'] ?>
                    </div>
                    <div class="description">Diễn viên: <a href=""><?= $key['director_name'] ?></a></div>
                    <div class="description">Đạo diễn:<a href=""><?= $key['actor_name'] ?></a></div>
                    <div class="btns">
                        <a href="?ctrl=films&view=film&id=<?= $key['film_id'] ?>" class="btnBanner playbtn">
                            <i class="bx bx-play"></i> Xem ngay
                        </a>
                        <form method='post'>
                            <input type="hidden" name="film_id" value="<?= $key['film_id'] ?>">
                            <button class="btnBanner addLibBtn" type='submit' name='addLib'>
                                <i class="fa-regular fa-bookmark"></i>Thư viện
                            </button>
                        </form>
                        <a href="" class="btnBanner addLibBtn">
                            <i class="bx bx-share-alt"></i> Chia sẻ
                        </a>
                    </div>

                </div>
            </div>
    </div>

    <div class="choice container">
        <ul class="options">
            <li class="active"><a href="">Chọn tập</a></li>
            <li><a href="">Bình luận</a></li>
            <li><a href="">Gợi ý</a></li>
        </ul>
        <div class="contentOption">
            <div class="episode-list">
                <a href="?ctrl=films&view=film&id=<?= $key['film_id'] ?>" class="episode">
                    <img src="public/img/<?= $key['bgimg'] ?>" alt="Tập 1" />
                    <div class="play-icon"><i class="bx bx-play-circle"></i></div>
                    <p>Tập 1</p>
                </a>
            </div>
        <?php } ?>

        <?php include_once 'comment/comment.php' ?>

        <div class="suggestion">
            <div class="listFilm">
                <div class="film">
                    <div class="imgFilm">
                        <img src="" alt="" />
                        <div class="imgHover">
                            <i class="bx bx-play-circle"></i>
                        </div>
                    </div>
                    <div class="nameFilm">Tên phim</div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>