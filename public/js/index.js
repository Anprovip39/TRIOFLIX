const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);
const navTag = $$(".tag");
const carouselItems = $$(".carousel-item");
const API =
  "http://localhost/duAn1NhomSupercalifragilisticexpialidocious/?ctrl=page&view=test";
navTag.forEach((tag) => {
  tag.onclick = () => {
    $(".tag.active").classList.remove("active");
    tag.classList.add("active");
    if ($(".tag.active").innerText == "Đề cử") {
      fetch(API)
        .then((rsp) => rsp.json())
        .then((data) => {
          showFilm(data.getAllFilm);
        });
    } else if ($(".tag.active").innerText == "Thịnh hành") {
      fetch(API)
        .then((rsp) => rsp.json())
        .then((data) => {
          showFilm(data.getAllTopFilm);
        });
    } else if ($(".tag.active").innerText == "Mới") {
      fetch(API)
        .then((rsp) => rsp.json())
        .then((data) => {
          showFilm(data.getAllNewFilm);
        });
    }
  };
});
$(".arrow.right").onclick = () => {
  $(".ctgrs").style.marginLeft = `${-$(".ctgr").offsetWidth - 20}px`;
  $(".arrow.left").style.display = "flex";
  $(".arrow.right").style.display = "none";
};
$(".arrow.left").onclick = () => {
  $(".ctgrs").style.marginLeft = `0px`;
  $(".arrow.left").style.display = "none";
  $(".arrow.right").style.display = "flex";
};
const carouselImages = $$(".carousel_imgs .image img");

const bg = $(".bg img");
fetch(API)
  .then((rsp) => rsp.json())
  .then((data) => {
    data.slider.forEach((image, index) => {
      if (carouselImages[index]) {
        carouselImages[index].src = `public/img/${image.bgimg}`;
      }
      if ($(".nameFilm")) {
        $(".nameFilm").innerHTML = image.film_name;
      }
    });
    let index = 0;
    updateSlide();
    function nextCarousel() {
      if (index < $$(".image").length - 1) {
        index++;
        updateSlide();
      } else {
        index = 0;
        updateSlide();
      }
      $(".carousel_imgs").style.transform = `translateX(${-711 * index}px)`;
    }
    function prevCarousel() {
      if (index === 0) {
        index = $$(".image").length - 1;
        updateSlide();
      } else {
        index--;
        updateSlide();
      }
      $(".carousel_imgs").style.transform = `translateX(${-711 * index}px)`;
    }
    function updateSlide() {
      $(".activebg").classList.remove("activebg");
      $(".img-" + index).classList.add("activebg");
      bg.src = $(".image.activebg img").src;
      let html = `
      <div class="nameFilm">${data.slider[index].film_name}</div>
      <div class="detailFilm">
          <div class="detail year">${data.slider[index].relase_year}</div>
          <div class="detail line"></div>
          <div class="detail"><span>16+</span></div>
          <div class="detail line"></div>
          <div class="detail duration">${data.slider[index].duration}min</div>
          <div class="detail line"></div>
          <div class="detail"><i class="bx bxs-star"></i>8.5</div>
      </div>
      <div class="description">
      ${data.slider[index].descripe}
      </div>
      <div class="btns">
          <button class="btnBanner watchNow">
              <a href="?ctrl=films&view=detail&id=${data.slider[index].film_id}"><i class="bx bx-play"></i>Xem ngay</a>
          </button>
          <form method='post'>
           <input type="hidden" name="film_id" value="${data.slider[index].film_id}">
          <button class="btnBanner addLibBtn" type='submit' name='addLib'>
              <i class="fa-regular fa-bookmark"></i>Thư viện
          </button>
          </form>

      </div>
      `;
      $(".contentFilm").innerHTML = html;
    }

    let slideshow = setInterval(nextCarousel, 4000);
    $(".arrow_carousel.left").addEventListener("click", () => {
      clearInterval(slideshow);
      prevCarousel();
      slideshow = setInterval(nextCarousel, 5000);
    });
    $(".arrow_carousel.right").addEventListener("click", () => {
      clearInterval(slideshow);
      nextCarousel();
      slideshow = setInterval(nextCarousel, 5000);
    });
  });

let showFilm = (data) => {
  let dataJson = data
    .map((item) => {
      return `
            <a href="?ctrl=films&view=detail&id=${item.film_id}" class="film">
          <div class="imgFilm">
              <img src="public/img/${item.img}" alt="" />
              <div class="imgHover">
                  <div class="detailImg">
                      <div class="detailImg_detail addLib">
                          <i class="fa-regular fa-bookmark "></i>
                      </div>
                      <div class="detailImg_detail rateScore">
                          <i class="bx bxs-star"></i>8.5
                      </div>
                  </div>
                  <i class="bx bx-play-circle"></i>
              </div>
          </div>
          <div href="" class="nameFilm">${item.film_name}</div>
          <div href="" class="detailFilm">
              <div class="detail">${item.duration}min</div>
              <div class="detail line"></div>
              <div class="detail">${item.catagory_name}</div>
          </div>
      </a>
      `;
    })
    .join("");
  $(".listFilms_films").innerHTML = dataJson;
};

fetch(API)
  .then((rsp) => rsp.json())
  .then((data) => {
    showFilm(data.getAllFilm);
    $$(".detailImg_detail.addLib").forEach((item, index) => {
      item.addEventListener("click", (e) => {
        e.preventDefault();
        item.firstElementChild.classList.toggle("fa-solid");
      });
    });
  });
