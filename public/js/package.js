const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const API =
  "http://localhost/duAn1NhomSupercalifragilisticexpialidocious/?ctrl=page&view=test";

let packages = [];
let selectedPackage = null;

async function getData() {
  try {
    const rsp = await fetch(API);
    const data = await rsp.json();
    packages = data.getPackage;
    renderPackages(packages);
  } catch (error) {
    console.error("Có lỗi khi lấy dữ liệu", error);
  }
}

const renderPackages = (data) => {
  const html = data.map((pack) => {
    const descripes = pack.descripe
      .split(", ")
      .map((item) => `<p>${item}</p>`)
      .join("");

    return `
      <div class="pack">
          <div class="namePack">
              <div class="name">${pack.pack_name}</div>
              <div class="price">${pack.price.toLocaleString("vi-VN")} VND</div>
          </div>
          <div class="detailPack">
              ${descripes}
          </div>
          <button class="btn buyBtn" onclick="selectPackage(${
            pack.pack_id
          })">Đăng ký ngay</button>
      </div>
    `;
  });

  $(".packages_pack").innerHTML = html.join("");
};

const selectPackage = (packId) => {
  if (!isLoggedIn) {
    alert("Bạn chưa đăng nhập! Vui lòng đăng nhập để mua gói.");
    return;
  }

  selectedPackage = packages.find((pack) => pack.pack_id === packId);
  if (selectedPackage) {
    updateBill(1);
  }
};

const updateBill = (months) => {
  if (!selectedPackage) return;
  const totalPrice = selectedPackage.price * months;
  const billHtml = `
    <div><span>Mã mua gói: </span>${Math.random().toString(36).slice(-6)}</div>
    <div><span>Tên gói: </span>${selectedPackage.pack_name}</div>
    <div><span>Mã người dùng: </span>${userInfo.user_id}</div>
    <div><span>Tên người dùng: </span>${userInfo.user_name}</div>
    <div><span>Số tháng đăng ký: </span>${months}</div>
    <div><span>Đơn giá: </span>${selectedPackage.price.toLocaleString(
      "vi-VN"
    )} VND</div>
  `;

  document.querySelector(".detail-bill").innerHTML = billHtml;
  $(".total").innerHTML = `Thành tiền: </span>${totalPrice.toLocaleString(
    "vi-VN"
  )} VND`;
};
$("#select").addEventListener("change", (e) => {
  const months = parseInt(e.target.value, 10) || 1;
  updateBill(months);
});

document.addEventListener("DOMContentLoaded", getData);

const cardMethod = $(".method.card");
const momoMethod = $(".method.momo");
const formMethod = $(".form-method");
const payButton = $(".btn-pay");

let paymentMethod = null;
const updatePaymentButton = () => {
  if (!paymentMethod) {
    payButton.disabled = true;
  } else if (paymentMethod === "card") {
    payButton.disabled = false;
  } else if (paymentMethod === "momo") {
    payButton.disabled = false;
  }
};

cardMethod.addEventListener("click", () => {
  paymentMethod = "card";
  formMethod.style.display = "block";
  cardMethod.style.borderColor = "#f90909";
  momoMethod.style.borderColor = "#fff";
  updatePaymentButton();
});

momoMethod.addEventListener("click", () => {
  paymentMethod = "momo";
  formMethod.style.display = "none";
  momoMethod.style.borderColor = "#f90909";
  cardMethod.style.borderColor = "#fff";
  updatePaymentButton();
});
payButton.addEventListener("click", () => {
  if (paymentMethod === "momo") {
    window.location.href = "https://momo.vn";
  }
});
