<?php include_once 'library/handleLib.php'; ?>
<div id="contents">
    <div class="slideshow">
        <div class="bg"><img src="" alt="" /></div>
        <div class="slideshow_contents container">
            <div class="contentFilm">
            </div>
            <div class="carousel">
                <div class="carousel_imgs">
                    <div class="image img-0 activebg">
                        <img src="" alt="" />
                    </div>
                    <div class="image img-1">
                        <img src="" alt="" />
                    </div>
                    <div class="image img-2">
                        <img
                            src=""
                            alt="" />
                    </div>
                    <div class="image img-3">
                        <img
                            src=""
                            alt="" />
                    </div>
                    <div class="image img-4">
                        <img src="" alt="" />
                    </div>
                </div>
                <div class="arrows_carousel">
                    <div class="arrow_carousel left">
                        <i class="fa-solid fa-chevron-left"></i>
                    </div>
                    <div class="arrow_carousel right">
                        <i class="fa-solid fa-chevron-right"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mainContents container">
        <div class="mainContents_listFilms">
            <div class="listFilms-nav">
                <div class="nav_tags">
                    <div class="tag active">Đề cử</div>
                    <div class="tag ">Thịnh hành</div>
                    <div class="tag">Mới</div>
                </div>
            </div>
            <div class="listFilms_films">
            </div>
            <button class="btn btnSeeMore"><a href="?ctrl=films&view=genre">Xem thêm</a></button>
        </div>
        <div class="mainContents_categories">
            <div class="categories_title title">THỂ LOẠI</div>
            <div class="categories_ctgr">
                <div class="ctgrs">
                    <?php foreach ($getAllGenre as $key) { ?>
                        <a href="?ctrl=films&view=genre&genreid=<?= $key['category_id'] ?>" class="ctgr">
                            <img src="public/img/<?= $key['category_img'] ?>" alt="" class="ctgrImg" />
                            <div class="nameCtgr">
                                <div class="name"><?= $key['catagory_name'] ?></div>
                                <div class="quantity"><?= $key['count'] ?></div>
                            </div>
                        </a>
                    <?php } ?>
                </div>
            </div>
            <div class="arrows">
                <div class="arrow left">
                    <i class="fa-solid fa-chevron-left"></i>
                </div>
                <div class="arrow right">
                    <i class="fa-solid fa-chevron-right"></i>
                </div>
            </div>
        </div>
        <div class="mainContents_packages">
            <div class="packages_title title">MUA GÓI</div>
            <div class="packages_pack">
                <?php foreach ($getPack as $key) { ?>
                    <div class="pack">
                        <div class="namePack">
                            <div class="name"><?= $key['pack_name'] ?></div>
                            <div class="price"><?= number_format($key['price'], 0, ',', '.') ?> VND</div>
                        </div>
                        <div class="detailPack">
                            <?php $descripe = explode(', ', $key['descripe']);
                            foreach ($descripe as $key) { ?>
                                <p><?= $key ?></p>
                            <?php } ?>
                        </div>
                        <button class="btn buyBtn" onclick="window.location.href = '?ctrl=page&view=package';">Đăng ký ngay</button>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>