
<?php
session_start();
include '../includes/database.php';
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/images/nhat-kim-logo-no-slogan12.png" sizes="32x32" type="image/png">
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <title>Liên hệ</title>
    <style>
        @media screen and (max-width: 760px) {
            .company-slogan {
                font-size: 14px !important;
            }
            .lienhenform {
                display: flex;
                flex-direction: column;
            }

            .map-container {
                width: 100%;
                display: flex;
                justify-content: center;
                padding: 20px 0;
            }

            .col-container {

                color: black;
                padding: 30px;
                border-radius: 10px;
                width: 100%;
                margin: auto;
                text-align: center;

            }

        }

        @media all and (min-width: 760px) {
            .col-container {

                color: black;
                padding: 30px;
                border-radius: 10px;
                width: 60%;
                margin: auto;
                text-align: center;

            }

            .lienhenform {
                display: flex;
                gap: 20px;
                /* Khoảng cách giữa các phần tử */

            }

            .map-container {
                width: 100%;
                display: flex;
                justify-content: center;
                padding: 20px 0;
            }


        }

        .containerr {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;

        }


        .banner1 {
            width: 100%;
            overflow: hidden;
            /* Đảm bảo full màn hình */

        }

        .full-width-image {
            width: 100%;
            height: 100px;
            display: block;
        }

        .map-iframe {
            width: 100%;
            height: 450px;
            border: 0;
        }



        /* Tiêu đề công ty */
        .section-title {
            font-size: 24px;
            font-weight: bold;
            text-transform: uppercase;
            color: #f1c40f;
            margin-bottom: 15px;
        }

        /* Slogan */
        .company-slogan {
            font-size: 18px;
            font-style: italic;
            margin-bottom: 20px;
            color: #f1c40f;
        }

        /* Danh sách thông tin công ty */
        .company-info {
            list-style: none;
            padding: 0;
            text-align: left;
            max-width: 500px;
            margin: 0 auto 20px auto;
        }

        .company-info li {
            font-size: 16px;
            margin-bottom: 10px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            padding-bottom: 8px;
        }
    </style>
</head>

<body>
    <?php include '../includes/header.php'; ?>
    <div class="hotline-phone-ring-wrap">

        <div class="hotline-phone-ring">
            <div class="hotline-phone-ring-circle"></div>
            <div class="hotline-phone-ring-circle-fill"></div>
            <div class="hotline-phone-ring-img-circle">
                <a class="pps-btn-img" href="tel:0909179579">
                    <i class="fa-solid fa-phone"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Nút Zalo -->
    <div class="zalo-button">
        <a href="https://zalo.me/0909179579" target="_blank">
            <img src="./assets/images/zalo-icon.png" alt="Chat Zalo">
        </a>
    </div>
    <div class="containerr">
        <div class="banner1">

            <img src="./assets/images/quangcao111.png" alt="Cosmetic Example"
                style="width: 100%; height: 520px; object-fit: cover;">
        </div>
        <div class="wrapper">
            <div class="lienhenform">
                <div id="col-1962431466" class="col-container">
                    <div class="col-inner">
                        <div class="section-title-container">
                            <h2 class="section-title">
                                CÔNG TY CỔ PHẦN NHẤT KIM WINDOW
                            </h2>
                        </div>
                        <p class="company-slogan">
                            “Chất lượng đi đầu - Giá trị bền lâu”
                        </p>
                        <ul class="company-info">
                            <li><strong>VP đại diện:</strong> 408 Nguyễn Lương Bằng, TP Hải Dương</li>
                            <li><strong>Nhà Máy:</strong> 408 Nguyễn Lương Bằng, TP Hải Dương</li>
                            <li><strong>Hotline:</strong> 0909 179 579</li>
                            <li><strong>Email:</strong> nhatkimwindow@gmail.com</li>
                        </ul>
                        <div class="map-container">

                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3726.38624745383!2d106.29759197502884!3d20.9369984806895!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31359b0a6dbd91e3%3A0xf6d3632be9107c60!2zNDA4IE5ndXnhu4VuIEzGsMahbmcgQuG6sW5nLCBQLiBUaGFuaCBUcnVuZywgSOG6o2kgRMawxqFuZywgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1739172858174!5m2!1svi!2s"
                                class="map-iframe" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>

                <div class="home-contact-left">
                    <div class="flip-card__inner">
                        <div class="flip-card__front">
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
            <div class="home-section">
                <h1>LÝ DO NHẤT KIM WINDOW LUÔN UY TÍN</h1>
                <div class="home-section-item">
                    <div class="reason">
                        <i class="fas fa-cube"></i>
                        <div class="reason-title">
                            <h3>Vật liệu cao cấp</h3>
                            <p>Sử dụng vật liệu nhôm kính cao cấp, đảm bảo độ bền và tính thẩm mỹ.</p>
                        </div>
                    </div>
                    <div class="reason">
                        <i class="fa-solid fa-gears"></i>
                        <div class="reason-title">
                            <h3>Công nghệ tiên tiến</h3>
                            <p>Áp dụng công nghệ hiện đại vào sản xuất, giúp sản phẩm đạt tiêu chuẩn chất lượng cao.</p>
                        </div>
                    </div>
                    <div class="reason">
                        <i class="fa-solid fa-people-group"></i>
                        <div class="reason-title">
                            <h3>Thi công chuyên nghiệp</h3>
                            <p>Đội ngũ kỹ thuật viên giàu kinh nghiệm, lắp đặt nhanh chóng và chính xác.</p>
                        </div>
                    </div>
                    <div class="reason">
                        <i class="fas fa-handshake"></i>
                        <div class="reason-title">
                            <h3>Bảo hành dài hạn</h3>
                            <p>Chính sách bảo hành tốt, mang lại sự yên tâm tuyệt đối cho khách hàng.</p>
                        </div>
                    </div>
                    <div class="reason">
                        <i class="fas fa-tags"></i>
                        <div class="reason-title">
                            <h3>Giá cả hợp lý</h3>
                            <p>Cung cấp sản phẩm chất lượng với mức giá cạnh tranh nhất trên thị trường.</p>
                        </div>
                    </div>
                    <div class="reason">
                        <i class="fa-solid fa-headset"></i>
                        <div class="reason-title">
                            <h3>Dịch vụ hậu mãi tốt</h3>
                            <p>Hỗ trợ khách hàng tận tình trước và sau khi mua hàng.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="home-intro-news-2">
            <h1>TIN TỨC HOẠT ĐỘNG</h1>
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php
                    // Kết nối đến CSDL (giả sử $conn đã có sẵn)
                    $sql = "SELECT * FROM news WHERE status = 'da-dang' ORDER BY created_at DESC";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                             <a href="./news-details.php?id=<?php echo $row['post_id']; ?>"> 
                            <div class="swiper-slide">
                                <img src=" <?php echo htmlspecialchars($row['new_images']); ?>" alt="Image">
                                <div class="home-intro-news-content">
                                    <h3 class="home-intro-news-content-title">
                                        <?php echo htmlspecialchars($row['title']); ?>
                                    </h3>
                                    <p class="home-intro-news-content-desc">
                                        <?php echo htmlspecialchars($row['slug']); ?>
                                    </p>
                                    
                                </div>  
                                <a href="" class="home-intro-news-content-link">Xem thêm</a>
                            </div>
                            </a>
                            <?php
                        }
                    } else {
                        echo "<p>Không có bài viết nào.</p>";
                    }
                    ?>



                </div>
                <!-- Nút điều hướng -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
            <div class="home-product-button">
                <a class="btn" href="./news.php">Xem thêm bài viết khác</a>
            </div>
        </div>
        </div>

    </div>

    <?php include '../includes/footer.php'; ?>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        new Swiper(".swiper", {
            slidesPerView: 3,  // Hiển thị 3 bài viết
            spaceBetween: 30,  // Khoảng cách giữa các bài viết
            loop: true,        // Cho phép lặp vô hạn
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            grabCursor: true,
            centeredSlides: true, // focus vào giữa
            breakpoints: {
                1024: {
                    slidesPerView: 3, // Desktop hiển thị 3 slide
                },
                768: {
                    slidesPerView: 1, // Tablet hiển thị 2 slide
                },
                0: {
                    slidesPerView: 1, // Mobile hiển thị 1 slide
                }
            }
        });
    });
</script>

</html>