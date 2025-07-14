-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 09, 2024 lúc 06:40 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tuyetvoi_da2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `actor`
--

CREATE TABLE `actor` (
  `actor_id` int(11) NOT NULL,
  `actor_name` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `actor`
--

INSERT INTO `actor` (`actor_id`, `actor_name`) VALUES
(1, 'Leonardo DiCaprio'),
(2, 'Scarlett Johansson'),
(3, 'Robert Downey Jr.'),
(4, 'Angelina Jolie'),
(5, 'Brad Pitt'),
(6, 'Tom Cruise'),
(7, 'Natalie Portman'),
(8, 'Chris Hemsworth'),
(9, 'Emma Watson'),
(10, 'Jennifer Lawrence'),
(13, 'abc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `catagory_name` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`category_id`, `catagory_name`, `img`) VALUES
(1, 'Hành động', 'hanhdong.jpg'),
(2, 'Hài hước', 'haihuoc.jpg'),
(3, 'Kinh dị', 'kinhdi.jpg'),
(4, 'Lãng mạn', 'langman.jpg'),
(5, 'Viễn tưởng', 'vientuong.jpg'),
(6, 'Hoạt hình', 'hoathinh.jpg'),
(7, 'Chiến tranh', 'chientranh.jpg'),
(8, 'Phiêu lưu', 'phieuluu.jpg'),
(9, 'Cổ trang', 'cotrang.jpg'),
(10, 'Điện ảnh', 'dienanh.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`comment_id`, `film_id`, `user_id`, `comment`, `time`) VALUES
(115, 2, 6, '123', '2024-12-10'),
(116, 2, 6, '12345', '2024-12-10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `director`
--

CREATE TABLE `director` (
  `director_id` int(11) NOT NULL,
  `director_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `director`
--

INSERT INTO `director` (`director_id`, `director_name`) VALUES
(1, 'Christopher Nolan'),
(2, 'Steven Spielberg'),
(3, 'Quentin Tarantino'),
(4, 'Martin Scorsese'),
(5, 'James Cameron'),
(6, 'Ridley Scott'),
(7, 'Peter Jackson'),
(8, 'Guillermo del Toro'),
(9, 'Denis Villeneuve'),
(10, 'Tim Burton'),
(15, 'Brad Pitt'),
(16, 'abc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `film`
--

CREATE TABLE `film` (
  `film_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `actor_id` int(11) NOT NULL,
  `director_id` int(11) NOT NULL,
  `film_name` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `urlvideo` varchar(225) NOT NULL,
  `duration` int(11) NOT NULL,
  `descripe` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` int(11) NOT NULL,
  `relase_year` year(4) DEFAULT NULL,
  `posted_date` date DEFAULT NULL,
  `bgimg` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `film`
--

INSERT INTO `film` (`film_id`, `category_id`, `actor_id`, `director_id`, `film_name`, `img`, `urlvideo`, `duration`, `descripe`, `views`, `relase_year`, `posted_date`, `bgimg`) VALUES
(1, 3, 7, 5, 'Vampire\'s Bloody Kiss Full Movie', '1.jpg', 'https://geo.dailymotion.com/player.html? video=x99l8r4', 142, 'Một câu chuyện lãng mạn và đẫm máu về tình yêu giữa ma cà rồng và con người.', 10156, '2022', '2024-11-01', '1bgimg.jpg'),
(2, 1, 4, 8, 'Kiss Me, My Fated Alpha', '2.jpg', 'https://geo.dailymotion.com/player.html?video=x99kj0k', 124, 'Một câu chuyện tình yêu định mệnh giữa một con người bình thường và một alpha huyền thoại.', 5641, '2019', '2024-11-02', '2bgimg.jpg'),
(3, 4, 3, 9, 'The Long Lost Mafia\'s Heir', '3.jpg', 'https://geo.dailymotion.com/player.html?video=x99kj0a', 109, 'Người thừa kế của một gia đình mafia hùng mạnh phát hiện ra danh tính của họ và chiến đấu giành quyền lực.', 1234, '2016', '2024-11-03', '3bgimg.jpg'),
(4, 5, 10, 2, 'Kiss Me, My Step Brother Is My Ex Lover', '4.jpg', 'https://geo.dailymotion.com/player.html?video=x99kj0i', 123, 'Một câu chuyện đầy kịch tính về tình yêu và những mối quan hệ phức tạp.', 9999, '2021', '2024-11-04', '4bgimg.jpg'),
(5, 2, 6, 4, 'You’ve Got the Wrong Girl, Thompson!', '5.jpg', 'https://geo.dailymotion.com/player.html?video=x99kf6u', 87, 'Một câu chuyện vui nhộn về việc nhầm lẫn danh tính và những tình tiết bất ngờ.', 6677, '2023', '2024-11-05', '5bgimg.jpg'),
(6, 3, 2, 6, 'The Street Fighter', '6.jpg', 'https://geo.dailymotion.com/player.html?video=x99ie8k', 90, 'Một võ sĩ đường phố vượt qua mọi khó khăn để giành lại danh dự.', 6789, '2010', '2024-11-06', '6bgimg.jpg'),
(7, 1, 1, 7, 'Titanic', '7.jpg', 'https://geo.dailymotion.com/player.html?video=x99ie8o', 65, 'Một câu chuyện tình yêu huyền thoại trên con tàu Titanic định mệnh.', 3925, '1997', '2024-11-08', '7bgimg.jpg'),
(8, 4, 8, 3, 'Cyborg Girl 2008', '8.jpg', 'https://geo.dailymotion.com/player.html?video=x99idvy', 132, 'Một câu chuyện cảm động về tình yêu giữa một chàng trai trẻ và một cô gái người máy đến từ tương lai.', 123, '2008', '2024-11-19', '8bgimg.jpg'),
(9, 4, 9, 6, 'The Shooting', '9.jpg', 'https://geo.dailymotion.com/player.html?video=x99518k', 99, 'Một câu chuyện hấp dẫn về sự phản bội, trả thù và cứu chuộc trong một cuộc đối đầu chết chóc.', 3456, '2018', '2024-11-09', '9bgimg.jpg'),
(10, 2, 5, 8, 'Kiss Me, My Fated Alpha', '10.jpg', 'https://geo.dailymotion.com/player.html?video=x99kj0k', 80, 'Một câu chuyện tình yêu định mệnh giữa một con người bình thường và một alpha huyền thoại.', 1122, '2022', '2024-11-11', '10bgimg.jpg'),
(11, 3, 7, 10, 'Vampire\'s Bloody Kiss Full Movie', '11.jpg', 'https://geo.dailymotion.com/player.html?video=x99l8r4', 68, 'Một câu chuyện lãng mạn và đẫm máu về tình yêu giữa ma cà rồng và con người.', 100, '2020', '2024-11-19', '11bgimg.jpg'),
(12, 5, 3, 7, 'The Red Queen', '12.jpg', 'https://geo.dailymotion.com/player.html?video=x99518e', 82, 'Một trận chiến hoành tráng để giành ngai vàng khi một nữ hoàng xảo quyệt bảo vệ vương quốc của mình khỏi sự phản bội.', 3215, '2017', '2024-11-19', '12bgimg.jpg'),
(13, 1, 2, 4, 'The Shape Of Things To Come', '13.jpg', 'https://geo.dailymotion.com/player.html?video=x99518g', 75, 'Một cuộc phiêu lưu tương lai khám phá sự sống còn và tiến hóa của loài người.', 654, '2024', '2024-10-21', '13bgimg.jpg'),
(14, 4, 6, 3, 'Killer Bait', '14.jpg', 'https://geo.dailymotion.com/player.html?video=x990508', 156, 'Một bộ phim kinh dị hồi hộp về một cái bẫy nguy hiểm dành cho một kẻ giết người tàn nhẫn.', 982, '2012', '2024-11-13', '14bgimg.jpg'),
(15, 2, 10, 5, 'Yeh Saali Aashiqui', '15.jpg', 'https://geo.dailymotion.com/player.html?video=x994wto', 180, 'Một câu chuyện xoắn xuýt về tình yêu, sự phản bội và sự trả thù khiến bạn luôn căng thẳng.', 563, '2019', '2024-09-11', '15bgimg.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `library`
--

CREATE TABLE `library` (
  `lib_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pack`
--

CREATE TABLE `pack` (
  `pack_id` int(11) NOT NULL,
  `pack_name` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `descripe` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pack_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `pack`
--

INSERT INTO `pack` (`pack_id`, `pack_name`, `price`, `descripe`, `pack_time`) VALUES
(1, 'Basic', 50000, 'Chất lượng video 720p (HD), Xem đồng thời trên 1 thiết bị', 1),
(2, 'Premium <i class=\"fa-solid fa-star\"></i>', 100000, 'Chất lượng video 1080p (Full HD), Xem đồng thời trên 2 thiết bị, Không quảng cáo, Tải phim ngoại tuyến trên 1 thiết bị', 1),
(3, 'VIP <i class=\"fa-solid fa-crown\"></i>', 150000, 'Chất lượng video 4K (Ultra HD), Xem đồng thời trên 4 thiết bị, Không quảng cáo, Tải phim ngoại tuyến trên 4 thiết bị, Có thể bỏ qua opening của phim', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `purchase`
--

CREATE TABLE `purchase` (
  `purchase_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pack_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `payment_method` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` date NOT NULL,
  `expired_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rating`
--

CREATE TABLE `rating` (
  `film_id` int(11) NOT NULL,
  `rate_score` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(4) NOT NULL,
  `reset_token` varchar(255) NOT NULL,
  `token_expiry` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `username`, `pass`, `email`, `role`, `reset_token`, `token_expiry`) VALUES
(1, 'lam', '$2y$10$OKRS1sTc2vRtqUa0M0zeJOaC4WKzI.WlSnrW81L4tif2Wvqmdq3Om', 'phuclam251005@gmail.com', 1, '099efe130a48572dc50753626f7f0e764f3f751b9af297338f919ea5976947246f2a7bcd780ce764ea6c1a3a22803eba48da', '2024-12-05 07:11:07'),
(5, 'lâm', '$2y$10$dY9Vmq6xjda/BHZEg6GaQOx/iHlUvQz6U8ACpo.uJCxwqUJ1qAfKm', 'phanlam6373@gmail.com', 0, '', NULL),
(6, 'lam2k5', '$2y$10$8JGWXdl9HjvH0LBmDGQwU.8crm/2L8ZxsrwMZ3OeBQeizYZZPIXry', 'lam2k5phan@gmail.com', 0, '', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`actor_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `catagory_film` (`film_id`),
  ADD KEY `comment_user` (`user_id`);

--
-- Chỉ mục cho bảng `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`director_id`);

--
-- Chỉ mục cho bảng `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`film_id`),
  ADD KEY `film_catagory` (`category_id`),
  ADD KEY `Film_actor` (`actor_id`),
  ADD KEY `film_director` (`director_id`);

--
-- Chỉ mục cho bảng `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`lib_id`),
  ADD KEY `film_id` (`film_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `pack`
--
ALTER TABLE `pack`
  ADD PRIMARY KEY (`pack_id`);

--
-- Chỉ mục cho bảng `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `purchase_pack` (`pack_id`),
  ADD KEY `purchase_user` (`user_id`);

--
-- Chỉ mục cho bảng `rating`
--
ALTER TABLE `rating`
  ADD KEY `ratting_film` (`film_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `actor`
--
ALTER TABLE `actor`
  MODIFY `actor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT cho bảng `director`
--
ALTER TABLE `director`
  MODIFY `director_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `film`
--
ALTER TABLE `film`
  MODIFY `film_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `library`
--
ALTER TABLE `library`
  MODIFY `lib_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `pack`
--
ALTER TABLE `pack`
  MODIFY `pack_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `catagory_film` FOREIGN KEY (`film_id`) REFERENCES `film` (`film_id`),
  ADD CONSTRAINT `comment_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Các ràng buộc cho bảng `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `Film_actor` FOREIGN KEY (`actor_id`) REFERENCES `actor` (`actor_id`),
  ADD CONSTRAINT `film_catagory` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `film_director` FOREIGN KEY (`director_id`) REFERENCES `director` (`director_id`);

--
-- Các ràng buộc cho bảng `library`
--
ALTER TABLE `library`
  ADD CONSTRAINT `library_ibfk_1` FOREIGN KEY (`film_id`) REFERENCES `film` (`film_id`),
  ADD CONSTRAINT `library_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Các ràng buộc cho bảng `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_pack` FOREIGN KEY (`pack_id`) REFERENCES `pack` (`pack_id`),
  ADD CONSTRAINT `purchase_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Các ràng buộc cho bảng `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `ratting_film` FOREIGN KEY (`film_id`) REFERENCES `film` (`film_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
