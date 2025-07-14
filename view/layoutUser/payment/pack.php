<div id="contents">
    <div class="mainContents container">
        <div class="mainContents_packages">
            <div class="title">MUA GÓI</div>
            <div class="line-gradient"></div>
            <div class="packages_pack">
                <!-- <div class="pack">
                    <div class="namePack">
                        <div class="name">Basic</div>
                        <div class="price">50.000 VND</div>
                    </div>
                    <div class="detailPack">
                        <p>Chất lượng video 720p (HD)</p>
                        <p>Xem đồng thời trên 1 thiết bị</p>
                    </div>
                    <button class="btn buyBtn">Đăng ký ngay</button>
                </div>
                <div class="pack">
                    <div class="namePack">
                        <div class="name">Premium <i class="fa-solid fa-star"></i></div>
                        <div class="price">100.000 VND</div>
                    </div>
                    <div class="detailPack">
                        <p>Chất lượng video 1080p (Full HD)</p>
                        <p>Xem đồng thời trên 2 thiết bị</p>
                        <p>Không quảng cáo</p>
                        <p>Tải phim ngoại tuyến trên 1 thiết bị</p>
                    </div>
                    <button class="btn buyBtn">Đăng ký ngay</button>
                </div>
                <div class="pack">
                    <div class="namePack">
                        <div class="name">VIP <i class="fa-solid fa-crown"></i></div>
                        <div class="price">150.000 VND</div>
                    </div>
                    <div class="detailPack">
                        <p>Chất lượng video 4K (Ultra HD)</p>
                        <p>Xem đồng thời trên 4 thiết bị</p>
                        <p>Không quảng cáo</p>
                        <p>Tải phim ngoại tuyến trên 4 thiết bị</p>
                        <p>Có thể bỏ qua opening của phim</p>
                    </div>
                    <button class="btn buyBtn">Đăng ký ngay</button>
                </div> -->
            </div>
            <div class="notice">
                <div class="content_notice">
                    <span>Lưu ý:</span> Mỗi gói có thời hạn là 1 tháng, bạn có thê lựa
                    chọn số tháng bên góc phải
                </div>
                <select id="select">
                    <option value="1">1 Tháng</option>
                    <option value="2">2 Tháng</option>
                    <option value="3">3 Tháng</option>
                    <option value="6">6 Tháng</option>
                    <option value="12">12 Tháng</option>
                </select>
            </div>
            <div class="bill">
                <div class="title">Thông tin giao dịch</div>
                <div class="detail-bill">
                    <!-- <div><span>Mã mua gói: </span>12345</div>
                    <div><span>Tên gói: </span>Basic</div>
                    <div><span>Mã người dùng: </span>Nguyễn Thế Quang</div>
                    <div><span>Số tháng đăng kí: </span>1</div>
                    <div><span>Đơn giá: </span>50.000 VND</div> -->
                </div>
                <div class="total"></div>
            </div>
            <div class="paymentMethod">
                <div class="title-payment">Chọn phương thức thanh toán</div>
                <div class="methods">
                    <div class="method card">
                        <div class="icon-method"><img src="public/img/creditCard.png" alt=""></div>
                        <div class="name-method">Thẻ tín dụng</div>
                    </div>
                    <div class="method momo">
                        <div class="icon-method"><img src="public/img/MoMo_Logo.png" alt=""></div>
                        <div class="name-method">Momo</div>
                    </div>
                </div>
                <form class="form-method" action="" style="display:none">
                    <div class="form-group">
                        <label for="card-number">Số thẻ</label>
                        <input
                            type="text"
                            id="card-number"
                            name="card-number"
                            placeholder="Nhập số thẻ"
                            required />
                    </div>
                    <div class="form-group">
                        <label for="card-name">Tên in trên thẻ</label>
                        <input
                            type="text"
                            id="card-name"
                            name="card-name"
                            placeholder="Nhập tên trên thẻ"
                            required />
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="expiry-date">Ngày hết hạn (MM/YY)</label>
                            <input
                                type="text"
                                id="expiry-date"
                                name="expiry-date"
                                placeholder="MM/YY"
                                required />
                        </div>
                        <div class="form-group">
                            <label for="cvv">CVC/CVV</label>
                            <input
                                type="text"
                                id="cvv"
                                name="cvv"
                                placeholder="Nhập CVC/CVV"
                                required />
                        </div>
                    </div>
                </form>
                <button class="btn btn-pay" disabled>Thanh toán</button>
            </div>
        </div>
    </div>
</div>