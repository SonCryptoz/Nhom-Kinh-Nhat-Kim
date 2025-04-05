<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google" content="notranslate">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <title>Document</title>
    <style>
        /* Header */
        header {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: var(--primary-color);
        }

        .header-wrapper {
            display: flex;
            justify-content: space-around;
            align-items: center;
            width: 100%;
        }

        .header-top-wrapper {
            width: 100%;
            padding: 5px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .social-left {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }

        .social-left-1 {
            background-color: var(--white-color);
            color: var(--primary-color) !important;
            padding: 5px 10px;
            border-radius: 20px;
        }

        .social-left-2 {
            background-color: var(--white-color);
            color: var(--primary-color) !important;
            padding: 5px 10px;
            border-radius: 20px;
        }

        .header-top-wrapper span {
            color: var(--white-color);
        }

        .header-top-wrapper .social {
            display: flex;
            gap: 10px;
        }

        .header-top-wrapper .social a {
            color: white;
            transition: linear 0.2s;
            z-index: 10;
        }

        .header-top-wrapper .social a:hover {
            scale: 1.2;
            color: var(--text-color);
        }

        /* Tạo hiệu ứng hover hiển thị text */
        .header-top-wrapper .social a::after {
            content: attr(data-text);
            /* Lấy nội dung từ data-text */
            position: absolute;
            left: 50%;
            bottom: -45px;
            /* Đặt text bên dưới */
            transform: translateX(-50%);
            background: rgba(0, 0, 0, 0.8);
            color: white;
            font-size: 14px;
            padding: 5px;
            border-radius: 5px;
            width: 200px;
            /* Giới hạn chiều rộng */
            text-align: center;
            word-wrap: break-word;
            /* Xuống dòng nếu dài */
            white-space: normal;
            /* Cho phép xuống dòng */
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        .header-top-wrapper .social a:hover::after {
            opacity: 1;
            visibility: visible;
        }

        .logo a {
            color: white;
            font-size: 24px;
            font-weight: bold;
        }

        .header-center {
            position: relative;
            width: 100%;
            background: var(--white-color);
            transition: all 0.3s ease-in-out;
        }

        .header-center.sticky {
            position: fixed;
            padding: 10px 0;
            top: 0;
            left: 0;
            width: 100%;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .header-center.sticky .logo,
        .header-center.sticky .header-center-title {
            display: none;
        }

        .header-center.sticky .header-center-search {
            display: flex;
            align-items: center;
            border: 1px solid #ccc;
            border-radius: 5px;
            overflow: hidden;
            background: #f8f8f8;
        }

        .header-center-title {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .header-center-logos {
            width: 100%;
            max-width: 70%;
            display: flex;
            justify-content: center;
        }

        .header-center-title h1 {
            font-weight: bold;
            font-size: 4rem;
            line-height: 1;
            color: #FFD700;
        }

        .header-center-title h2 {
            font-weight: bold;
            font-size: 1.4rem;
            color: #FFD700;
        }

        .header-center-wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .header-center-wrapper .logo {
            line-height: 0;
        }

        .header-center-wrapper img {
            height: 120px;
        }

        .header-center-search {
            display: none;
        }

        .header-center-search input {
            border: none;
            padding: 8px 12px;
            font-family: var(--font-family);
            font-size: 16px;
            outline: none;
            width: 500px;
        }

        .header-center-search button {
            background: var(--primary-color);
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            color: white;
            transition: linear 0.2s;
        }

        .header-center-search button:active {
            scale: 0.9;
        }

        .button_top {
            line-height: 1rem;
            font-family: var(--font-family);
            display: block;
            box-sizing: border-box;
            border: 2px solid var(--primary-color);
            border-radius: 5px;
            padding: 0.75em 1.5em;
            background: var(--white-color);
            color: var(--primary-color);
            transform: translateY(-0.2em);
            transition: transform 0.1s ease;

        }

        .header-center-wrapper .btn-modal-sp {
            background: var(--primary-color);
            border-radius: 5px;
        }

        .header-center-wrapper .btn-modal-sp:hover .button_top {
            transform: translateY(-0.33em);
        }

        .header-center-wrapper .btn-modal-sp:active .button_top {
            transform: translateY(0);
        }

        .language-selector {
            position: relative;
        }

        .language-btn {
            font-family: var(--font-family);
            color: white;
            border: none;
            padding: 8px 15px;
            background-color: var(--primary-color);
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: linear 0.1s;
        }

        .language-btn:active {
            scale: 0.9;
        }

        .language-menu {
            position: absolute;
            top: 100%;
            left: 0;
            background: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            display: none;
            list-style: none;
            padding: 5px 0;
            width: 120px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 10;
        }

        .language-menu li a {
            display: block;
            padding: 8px 12px;
            color: #333;
            text-decoration: none;
            transition: background 0.3s;
        }

        .language-menu li a:hover {
            background: #f0f0f0;
        }

        /* Hiện menu khi hover */
        .language-selector:hover .language-menu {
            display: block;
        }

        /* Menu */
        .menu {
            display: flex;
        }

        .menu li {
            position: relative;
        }

        .menu li a {
            color: white;
            padding: 12px 20px;
            display: block;
            font-weight: bold;
            transition: linear 0.2s;
        }

        .menu li a:hover {
            color: var(--text-color);
        }

        .menu li a.active {
            color: var(--text-color);
            font-weight: bold;
        }

        /* Dropdown */
        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            background: var(--white-color);
            display: none;
            border-left: 1px solid var(--primary-color);
            border-right: 1px solid var(--primary-color);
            min-width: 250px;
            z-index: 1000;
        }

        .dropdown-menu li a {
            padding: 10px 15px;
            color: var(--text-color);
            border-bottom: 1px solid var(--primary-color);
            display: block;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .dropdown-menu li a:hover {
            background: var(--primary-color);
            color: var(--white-color);
        }


        /* Ẩn thanh công cụ của Google trên cùng */
        body {
            margin-top: 0px !important;
            padding-top: 0px !important;
            top: 0px !important;
            position: relative;
        }

        .goog-te-gadget {
            display: none !important;
        }

        .goog-te-banner-frame {
            display: none !important;
        }

        .goog-te-banner-frame.skiptranslate {
            display: none !important;
        }

        .VIpgJd-ZVi9od-ORHb-OEVmcd,
        .VIpgJd-yAWNEb-L7lbkb {
            display: none !important;
        }

        /* Ẩn Modal mặc định */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            align-items: center;
            justify-content: center;
        }

        /* Nút đóng */
        .modal .close {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 20px;
            cursor: pointer;
        }

        .flip-card__front {
            width: 90%;
            max-width: 550px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            position: relative;
            background: var(--white-color);
            gap: 20px;
            border-radius: 10px;
            border: 2px solid var(--primary-color);
            box-shadow: 4px 4px #323232;
            animation: fadeIn 0.3s ease-in-out;
        }

        .flip-card__form {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }

        .title {
            font-size: 25px;
            font-weight: 900;
            text-align: center;
            color: var(--primary-color);
        }

        .flip-card__input {
            width: 100%;
            height: 40px;
            border-radius: 5px;
            border: 2px solid var(--primary-color);
            background-color: var(--white-color);
            box-shadow: 4px 4px var(--primary-color);
            font-family: var(--font-family);
            font-size: 15px;
            font-weight: 600;
            color: var(--text-color);
            padding: 5px 10px;
            outline: none;
        }

        .flip-card__input::placeholder {
            color: var(--text-color);
            opacity: 0.8;
        }

        .flip-card__input:focus {
            border: 2px solid #47dcf7;
        }

        .flip-card__btn:active,
        .button-confirm:active {
            box-shadow: 0px 0px var(--primary-color);
            transform: translate(3px, 3px);
        }

        .flip-card__btn {
            margin: 20px 0 20px 0;
            width: 120px;
            height: 40px;
            border-radius: 5px;
            border: 2px solid var(--primary-color);
            background-color: var(--white-color);
            box-shadow: 4px 4px var(--primary-color);
            font-size: 17px;
            font-weight: 600;
            color: var(--text-color);
            cursor: pointer;
            transition: linear 0.1s;
        }

        /* Hiệu ứng mở modal */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Ẩn menu mobile và nút toggle trên PC */
        .mobile-menu,
        .mobile-menu-toggle {
            display: none;
        }
    </style>
</head>

<body>
    <header id="header-top" class="header-top">
        <div class="wrapper header-top-wrapper">
            <!-- <span>Nhất Kim Window - Chất lượng đi đầu & Giá trị bền lâu</span> -->
            <div class="social-left">
                <span class="social-left-1"><i class="fa-solid fa-phone"></i> 0909-179-579</span>
                <span class="social-left-2"><i class="fa-solid fa-envelope"></i> nhatkimwindow@gmail.com</span>
            </div>
            <div class="social">
                <a href="https://www.facebook.com/anhduong1109" data-text="Theo dõi chúng tôi trên Facebook"><i
                        class="fab fa-facebook"></i></a>
                <a href="https://www.youtube.com/@CuaDepHaiDuong" data-text="Subcribe kênh của chúng tôi"><i
                        class="fab fa-youtube"></i></a>
                <a href="mailto:nhatkimwindow@gmail.com" data-text="Gửi email cho chúng tôi"><i
                        class="fa-regular fa-envelope"></i></a>
            </div>
        </div>
    </header>

    <header id="header-center" class="header-center">
        <div class="wrapper header-center-wrapper">
            <div class="header-center-button">
                <div class="btn-modal-sp">
                    <!-- Nút mở Modal -->
                    <a href="#" class="btn button_top" id="openModal">Đăng ký nhận hỗ trợ</a>

                    <!-- Overlay + Modal -->
                    <div id="supportModal" class="modal">
                        <div class="flip-card__front">
                            <span class="close"><i class="fa-solid fa-xmark"></i></span>
                            <div class="title">ĐĂNG KÝ TƯ VẤN</div>
                            <form class="flip-card__form" action="../database/addInquiry.php" method="POST">
                                <input class="flip-card__input" name="name" placeholder="Họ và tên" type="text"
                                    required>
                                <input class="flip-card__input" name="phone" placeholder="Số điện thoại" type="number"
                                    required>
                                <input class="flip-card__input" name="diachi" placeholder="Địa chỉ" type="text"
                                    required>
                                <textarea class="flip-card__input" name="message"
                                    placeholder="Nội dung tư vấn, hỗ trợ..." style="height: 100px;"></textarea>
                                <!-- Nếu bạn muốn truyền product_id, có thể thêm input ẩn hoặc một lựa chọn -->
                                <!-- <input type="hidden" name="product_id" value="123"> -->
                                <button class="flip-card__btn" type="submit">GỬI!</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-center-logos">
                <a href="../index.php" class="logo">
                    <img src="../public/assets/images/nhat-kim-logo-no-slogan12.png" alt="Logo" />
                </a>
                <div class="header-center-search">
                    <input type="text" placeholder="Tìm kiếm sản phẩm">
                    <button><i class="fas fa-search"></i></button>
                </div>
                <div class="header-center-title">
                    <h1>Nhất Kim Window</h1>
                    <h2>Chất lượng đi đầu - Giá trị bền lâu</h2>
                </div>
            </div>
            <!-- Widget Google Translate -->
            <div class="language-selector">
                <button class="language-btn">
                    Ngôn ngữ <i class="fas fa-chevron-down"></i>
                </button>
                <ul class="language-menu">
                    <div id="google_translate_element"></div>
                    <li><a href="#" onclick="changeLanguage('vi'); return false;">Tiếng Việt</a></li>
                    <li><a href="#" onclick="changeLanguage('en'); return false;">Tiếng Anh</a></li>
                </ul>
            </div>
        </div>
    </header>

    <header id="header" class="header">
        <div class="wrapper header-wrapper">
            <!-- Nút menu trên mobile -->
            <button id="mobile-menu-toggle" class="mobile-menu-toggle">
                <i class="fa-solid fa-bars"></i>
            </button>

            <!-- Menu trên PC -->
            <nav class="desktop-menu">
                <ul class="menu">
                    <li><a href="../index.php">Trang chủ</a></li>
                    <li><a href="../public/products.php">Sản phẩm</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle">Dịch vụ <i class="fa-solid fa-caret-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="../public/tuvan.php">Tư vấn thiết kế</a></li>
                            <li><a href="../public/lapdat.php">Lắp đặt cửa nhôm</a></li>
                        </ul>
                    </li>
                    <!-- <li><a href="./public/360tour.php">Tham quan 360</a></li> -->
                    <li><a href="../public/news.php">Tin tức</a></li>
                    <li><a href="../public/contact.php">Liên hệ</a></li>
                    <li><a href="../public/videos-libs.php">Thư viện video</a></li>
                </ul>
            </nav>

            <!-- Menu riêng cho Mobile -->
            <nav id="mobile-menu" class="mobile-menu">
                <ul>
                    <li><a href="../index.php"><i class="fa-solid fa-house"></i> Trang chủ</a></li>
                    <li><a href="../public/products.php"><i class="fa-brands fa-windows"></i> Sản phẩm</a></li>
                    <li><a href="../public/tuvan.php"><i class="fa-solid fa-pencil"></i> Tư vấn thiết kế</a></li>
                    <li><a href="../public/lapdat.php"><i class="fa-solid fa-screwdriver-wrench"></i> Lắp đặt cửa nhôm</a></li>
                    <!-- <li><a href="./public/360tour.php">Tham quan 360</a></li> -->
                    <li><a href="../public/contact.php"><i class="fa-solid fa-user-plus"></i> Liên hệ</a></li>
                    <li><a href="../public/videos-libs.php"><i class="fa-solid fa-film"></i> Thư viện video</a></li>
                </ul>
            </nav>
        </div>
    </header>
</body>
<script>
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({ pageLanguage: 'vi' }, 'google_translate_element');
    }

    function changeLanguage(lang) {
        let checkExist = setInterval(() => {
            let select = document.querySelector(".goog-te-combo");
            if (select) {
                select.value = lang;
                select.dispatchEvent(new Event("change"));
                clearInterval(checkExist);
            } else {
                console.warn("Google Translate chưa sẵn sàng, đang chờ...");
            }
        }, 500);
    }

    document.addEventListener("DOMContentLoaded", function () {
        // 📌 Sticky Header với passive event listener
        window.addEventListener("scroll", function () {
            let header = document.getElementById("header-center");
            if (header) {
                header.classList.toggle("sticky", window.scrollY > 50);
            }
        }, { passive: true });

        // 📌 Active Page Highlight
        const menuItems = document.querySelectorAll("#menu li a");
        const currentPath = window.location.pathname.split("/").pop();

        menuItems.forEach(item => {
            const itemPath = item.getAttribute("href").split("/").pop();
            if (itemPath === currentPath && !item.closest(".dropdown-menu")) {
                item.classList.add("active");
            }
        });

    });

    const mobileMenuToggle = document.getElementById("mobile-menu-toggle");
    const mobileMenu = document.getElementById("mobile-menu");

    if (mobileMenuToggle && mobileMenu) {
        mobileMenuToggle.addEventListener("click", function (event) {
            event.stopPropagation(); // Ngăn chặn sự kiện click lan ra ngoài
            mobileMenu.classList.toggle("open"); // Đổi tất cả về "open"
        });

        // 📌 Click bên ngoài menu sẽ ẩn menu
        document.addEventListener("click", function (event) {
            if (
                mobileMenu.classList.contains("open") && // Kiểm tra menu đang mở
                !mobileMenu.contains(event.target) &&
                !mobileMenuToggle.contains(event.target)
            ) {
                mobileMenu.classList.remove("open");
            }
        });
    }

    const modal = document.getElementById("supportModal");
    const openModal = document.getElementById("openModal");
    const closeModal = document.querySelector(".close");

    if (modal && openModal) {
        openModal.addEventListener("click", function (event) {
            event.preventDefault();
            modal.style.display = "flex";
        });
    }

    if (closeModal) {
        closeModal.addEventListener("click", function () {
            modal.style.display = "none";
        });
    }

    // Đóng modal khi click bên ngoài
    window.addEventListener("click", function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });
</script>
<script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</html>