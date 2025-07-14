<?php
ob_start();
$is_logged_in = isset($_SESSION['user_id']) && isset($_SESSION['user_name']);
echo '<script>';
echo 'const isLoggedIn = ' . json_encode($is_logged_in) . ';';
echo 'const userInfo = ' . json_encode($is_logged_in ? [
    'user_id' => $_SESSION['user_id'],
    'user_name' => $_SESSION['user_name'],
] : null) . ';';
echo '</script>';
$user_name = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : null;
include_once 'model/m_film.php';
$getGenre = getGenre(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $title ?? 'Default Title'; ?></title>
    <link rel="icon" href="public/img/logo.png" type="image/png">
    <link rel="stylesheet" href="public/css/general.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet" />
    <link
        href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
        rel="stylesheet" />
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        rel="stylesheet" />
    <?php if (isset($css_file)) { ?>
        <link rel="stylesheet" href="public/css/<?php echo $css_file; ?>">
    <?php } ?>
</head>

<body>
    <header>
        <div class="container header">
            <a href="?ctrl=page&view=home" class="logo"><img src="public/img/Trioflix-logo.png" alt="" /></a>
            <ul class="navbar">
                <li class="mainmenu"><a href="?ctrl=page&view=home" class="link">Trang chủ</a></li>
                <li class="mainmenu">
                    <a href="?ctrl=films&view=genre" class="link">Thể loại<i class="bx bx-chevron-down"></i>
                    </a>
                    <ul class="submenu">
                        <?php foreach ($getGenre as $key) { ?>
                            <li><a href="?ctrl=films&view=genre&genreid=<?= $key['category_id'] ?>"><?= $key['catagory_name'] ?></a></li>
                            <!-- <li><a href="">Hài hước</a></li>
                            <li><a href="">Tâm lí</a></li>
                            <li><a href="">Kinh dị</a></li>
                            <li><a href="">Hoạt hình</a></li>
                            <li><a href="">Khoa học - VIễn tưởng</a></li>
                            <li><a href="">Tình cảm</a></li>
                            <li><a href="">Phiêu lưu</a></li>
                            <li><a href="">Cổ trang</a></li>
                            <li><a href="">Võ thuật</a></li> -->
                        <?php } ?>
                    </ul>
                </li>
                <li class="mainmenu">
                    <a href="#" class="link">Khác<i class="bx bx-chevron-down"></i></a>
                    <ul class="submenu other">
                        <li><a href="">Phim lẻ</a></li>
                        <li><a href="?ctrl=films&view=history">Lịch sử xem</a></li>
                        <li><a href="">Phim bộ</a></li>
                    </ul>
                </li>
                <li class="mainmenu"><a href="?ctrl=films&view=library" class="link">Thư viện</a></li>
                <li class="mainmenu">
                    <a href="#" class="link"><i class="bx bxs-bell"></i></a>
                </li>
            </ul>
            <div class="nav-others">
                <form class="searchbar" method="get">
                    <i class="bx bx-search"></i> <span></span>
                    <input type="hidden" name="ctrl" value="page">
                    <input type="hidden" name="view" value="search">
                    <input
                        type="search"
                        placeholder="Tìm kiếm"
                        id="search"
                        name="keyword"
                        autocomplete="off" />
                </form>
                <button class="btn buyBtn" onclick="window.location.href = '?ctrl=page&view=package';">Mua gói</button>
                <?php if ($user_name) { ?>
                    <div href="#" class="user">
                        <a href="?ctrl=user&view=user" class="account" title="<?= $user_name ?>">
                            <i class="bx bx-user"></i>
                            <div class="nameUser"><?= htmlspecialchars($user_name) ?></div>
                        </a>
                        <div class="acc">
                            <!-- <a href="?page=user&id=" class="action">Thông tin tài khoản</a> -->
                            <a href="view/layoutUser/login/logout.php" class="action">Đăng xuất</a>
                        </div>
                    </div>
                <?php } else { ?>
                    <a href="?ctrl=user&view=login" class="account">
                        <i class="bx bx-user"></i>
                        <div>Đăng nhập</div>
                    </a>
                <?php } ?>
            </div>
        </div>
    </header>