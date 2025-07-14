<div id="contents">
    <div class="mainContents_listFilms container">
        <div class="listFilms-nav">
            <form action="" class="nav_filters" method="get">
                <input type="hidden" name="ctrl" value="films">
                <input type="hidden" name="view" value="genre">
                <select name="genreid" id="nav" class="nav" onchange="this.form.submit()">
                    <option value="">Tất cả thể loại</option>
                    <?php foreach ($getGenre as $key) { ?>
                        <option value="<?= $key['category_id'] ?>"
                            <?= isset($_GET['genreid']) && $_GET['genreid'] == $key['category_id'] ? 'selected' : '' ?>>
                            <?= $key['catagory_name'] ?>
                        </option>
                    <?php } ?>


                </select>
                <select name="year" id="year" class="nav" onchange="this.form.submit()">
                    <option value="">Tất cả các năm</option>
                    <?php foreach ($getAll as $key) { ?>
                        <option value="<?= $key['relase_year'] ?>"
                            <?= isset($_GET['year']) && $_GET['year'] == $key['relase_year'] ? 'selected' : '' ?>>
                            <?= $key['relase_year'] ?>
                        </option>
                    <?php } ?>
                </select>

            </form>
        </div>
        <div class="listFilms_films">
            <?php foreach ($getAllFilmByIdGenre as $key) { ?>
                <a href="?ctrl=films&view=detail&id=<?= $key['film_id'] ?>" class="film">
                    <div class="imgFilm">
                        <img src="public/img/<?= $key['img'] ?>" alt="" />
                        <div class="imgHover">
                            <div class="detailImg">
                                <div class="detailImg_detail addLib">
                                    <i class="fa-regular fa-bookmark"></i>
                                </div>
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
            <?php } ?>
        </div>
    </div>
</div>