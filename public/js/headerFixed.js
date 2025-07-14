let header = document.querySelector("header");
header.classList.add("scroll");
window.addEventListener("scroll", () => {
  if (window.scrollY > 100) {
    header.classList.remove("scroll");
  } else {
    header.classList.add("scroll");
  }
});
let options = document.querySelectorAll(".options li");
let contentOption = document.querySelector(".contentOption");
options.forEach((li, index) => {
  li.onclick = (e) => {
    e.preventDefault();
    document.querySelector("li.active").classList.remove("active");
    li.classList.add("active");
    if (index == 1) {
      document.querySelector(".cmts").style.display = "flex";
      // document.querySelector(".episode-list").style.display = "none";
      // document.querySelector(".suggestion").style.display = "none";
      contentOption.style.transform = `translateX(${-1200 * index}px)`;
    }
    if (index == 2) {
      document.querySelector(".suggestion").style.display = "flex";
      // document.querySelector(".episode-list").style.display = "none";
      // document.querySelector(".cmts").style.display = "none";
      contentOption.style.transform = `translateX(${-1200 * index}px)`;
    }
    if (index == 0) {
      // document.querySelector(".episode-list").style.display = "flex";
      contentOption.style.transform = `translateX(${-1200 * index}px)`;
      document.querySelector(".suggestion").style.display = "none";
      document.querySelector(".cmts").style.display = "none";
    }
  };
});
