<?php

if (isset($_SESSION['message'])) {
  echo "<script>alert('" . $_SESSION['message'] . "');</script>";
  unset($_SESSION['message']);
}

?>
<div id="contents">
  <div class="players container">
    <?php foreach ($detail as $key) { ?>
      <div class="players_video">
        <div class="video">
          <div style="position:relative;padding-bottom:57.4%;height:0;overflow:hidden;">
            <iframe src="<?= $key['urlvideo'] ?>"
              style="width:100%; height:100%; position:absolute; left:0px; top:0px; overflow:hidden; border:none;"
              allowfullscreen
              title="Dailymotion Video Player"
              allow="web-share">
            </iframe>
          </div>
        </div>
        <div class="actions">
          <div class="addAndShare">
            <div class="action add"><i class="bx bx-plus"></i> Thư viện</div>
            <div class="action share">
              <i class="bx bxs-share-alt"></i> Chia sẻ
            </div>
          </div>
          <div class="tvAndDownload">
            <div class="action tv">
              <i class="bx bx-tv"></i> Xem trên Tivi
            </div>
            <div class="action download">
              <i class="bx bx-download"></i>Tải xuống
            </div>
          </div>
        </div>
      </div>
      <div class="players_chooseEps">
        <h3><?= $key['film_name'] ?></h3>
        <section>Chọn tập</section>
        <div class="listEps">
          <div class="ep">1</div>
        </div>
      </div>
    <?php } ?>

  </div>
  <div class="content_page container">
    <div class="infoFilmAndCmts">
      <div class="infoFilm">
        <h2><?= $key['film_name'] ?></h2>
        <div class="info">
          <div class="detail"><?= $key['relase_year'] ?></div>
          <div class="detail line"></div>
          <div class="detail"><span>16+</span></div>
          <div class="detail line"></div>
          <div class="detail"><?= $key['duration'] ?>min</div>
        </div>
        <div class="rating">
          <div class="detail"><i class="bx bxs-star"></i>8.5</div>
          <div class="quntityRating">(100 người đã đánh giá)</div>
          <a href="">Tôi muốn đánh giá</a>
        </div>
        <div class="genre">
          <a href="?ctrl=films&view=genre&genreid=<?= $key['category_id'] ?>"><?= $key['catagory_name'] ?></a>
        </div>
        <div class="description">
          <p><span>Mô tả: </span><?= $key['descripe'] ?></p>
        </div>
      </div>
      <!-- <div class="cmts">
        <h3>BÌnh luận (6 bình luận)</h3>
        <form action="">
          <input
            type="text"
            name="cmt"
            id="cmt"
            placeholder="Nhập bình luận..." />
          <button class="btn sendCmt">Gửi</button>
        </form>
        <div class="cmts_box">
          <div class="userCmt">
            <div class="avt"><img src="" alt="" /></div>
            <div class="infoUser">
              <div class="userName">Nguyễn Anh Kiệt</div>
              <div class="cmtTime">20/10/2024</div>
              <div class="cmtContent">alo</div>
            </div>
          </div>
        </div>
      </div> -->
      <?php include_once 'comment/comment.php' ?>
    </div>
    <div class="suggestion">
      <h2>Gợi ý cho bạn</h2>
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