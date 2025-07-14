<div id="contents">
    <div class="mainContents container">
        <?php if (isset($_GET['keyword'])) { ?>
            <div class="title">Kết quả tìm kiếm: </div>
            <div class="line-gradient"></div>
            <div class="mainContents_listFilms">
                <div class="listFilms_films">
                    <div class="filmOfLib">
                        <?php foreach ($results as $film) { ?>
                            <a href="?ctrl=films&view=detail&id=<?= $film['film_id'] ?>" class="film">
                                <div class="imgFilm">
                                    <img src="public/img/<?= $film['img'] ?>" alt="" />
                                    <div class="imgHover">
                                        <div class="detailImg">
                                            <div class="detailImg_detail rateScore">
                                                <i class="bx bxs-star"></i>8.5
                                            </div>
                                        </div>
                                        <i class="bx bx-play-circle"></i>
                                    </div>
                                </div>
                                <div href="" class="nameFilm"><?= $film['film_name'] ?></div>
                                <div href="" class="detailFilm">
                                    <div class="detail"><?= $film['duration'] ?>min</div>
                                    <div class="detail line"></div>
                                    <div class="detail"><?= $film['catagory_name'] ?></div>
                                </div>
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } else {
            echo '<div class="title">Không tìm thấy phim </div><div class="line-gradient"></div>';
        }
        ?>
    </div>
</div>