<?php
session_start();
include './includes/database.php';
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./public/assets/images/nhat-kim-logo-no-slogan12.png" sizes="32x32" type="image/png">
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="./public/assets/css/style.css">
    <link rel="stylesheet" href="./public/assets/css/base.css">
    <link rel="stylesheet" href="./public/assets/css/responsive.css">
    <title>Trang chủ</title>
    <style>
        #support,
        #services {
            padding-top: 80px;
            margin-top: -80px;
        }
    </style>
</head>

<body>
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
            <img src="./public/assets/images/zalo-icon.png" alt="Chat Zalo">
        </a>
    </div>
    <?php include './includes/header.php'; ?>
    <div class="wrapper">
        <!-- Hero Section -->
        <section class="about-section">
            <div class="about-container">
                <div class="about-content">
                    <h1>Giới thiệu về Nhất Kim Window</h1>
                    <p>
                        Chúng tôi cam kết mang đến các giải pháp xây dựng và thiết kế chất lượng cao, đáp ứng mọi nhu
                        cầu của khách hàng.
                        Với đội ngũ chuyên gia giàu kinh nghiệm, Nhất Kim Window không ngừng đổi mới và nâng cao chất
                        lượng dịch vụ.
                    </p>
                    <a class="about-button" href="#services">Khám phá dịch vụ của chúng tôi</a>
                    <div class="us-image-box" style="margin-top: 5%; display: flex; justify-content: center;">
                        <iframe id="videoFrame"
                            src="https://www.youtube.com/embed/o0Q_Xd0jihk?start=29&autoplay=1&mute=1"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen style="width: 100%; height: 400px;">
                        </iframe>
                    </div>


                </div>
                <div class="about-info-box">
                    <h2>Dịch vụ của chúng tôi</h2>
                    <ul>
                        <li>
                            <i class="fas fa-building about-icon"></i>
                            <span>Lắp đặt cửa nhôm</span>
                            <p>Chúng tôi chuyên thi công và lắp đặt cửa nhôm cao cấp, đảm bảo chất lượng và tính thẩm mỹ
                                cho công trình.</p>
                        </li>
                        <!-- <li>
                            <i class="fas fa-tools about-icon"></i>
                            <span>Gia công kính cường lực</span>
                            <p>Cung cấp dịch vụ cắt, mài, khoan và gia công kính cường lực theo yêu cầu, đáp ứng tiêu
                                chuẩn an toàn và độ bền cao.</p>
                        </li> -->
                        <li>
                            <i class="fas fa-lightbulb about-icon"></i>
                            <span>Tư vấn thiết kế</span>
                            <p>Đội ngũ chuyên gia sẵn sàng tư vấn, đưa ra các giải pháp thiết kế tối ưu, phù hợp với nhu
                                cầu và không gian sử dụng.</p>
                        </li>
                        <li>
                            <i class="fas fa-ruler-combined about-icon"></i>
                            <span>Đo đạc công trình</span>
                            <p>Chúng tôi thực hiện đo đạc chính xác, giúp đảm bảo quá trình thi công diễn ra thuận lợi
                                và đạt chất lượng tốt nhất.</p>
                        </li>
                        <li>
                            <i class="fas fa-file-alt about-icon"></i>
                            <span>Thiết kế bản vẽ</span>
                            <p>Cung cấp bản vẽ chi tiết, minh họa rõ ràng các hạng mục thi công, giúp khách hàng dễ dàng
                                hình dung và thực hiện dự án.</p>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- History Section -->
        <section class="history-section">
            <h2>Lịch Sử Hình Thành & Phát Triển</h2>
            <div class="history-content">
                <div class="history-text">
                    <p>
                        Nhất Kim Window được thành lập với sứ mệnh mang đến những giải pháp cửa nhôm kính chất lượng
                        cao cho công trình xây dựng. Từ những ngày đầu, chúng tôi luôn cam kết về sự bền vững, thẩm
                        mỹ và tối ưu trong từng sản phẩm.
                    </p>
                    <p>
                        Với đội ngũ chuyên gia giàu kinh nghiệm, chúng tôi đã phát triển và không ngừng đổi mới để
                        đáp ứng nhu cầu ngày càng cao của khách hàng. Những dự án của chúng tôi trải dài từ nhà ở
                        dân dụng, văn phòng đến các công trình quy mô lớn.
                    </p>
                </div>
                <div class="history-image">
                    <img src="./public/assets/images/xuong-san-xuat.jpg" alt="Nhà xưởng sản xuất">
                </div>
            </div>

            <div class="history-content">
                <div class="history-image">
                    <img src="./public/assets/images/xuong-san-xuat-2.jpg" alt="Nhà xưởng sản xuất">
                </div>
                <div class="history-text">
                    <p>
                        Trải qua nhiều năm phát triển, chúng tôi đã mở rộng quy mô sản xuất và ứng dụng công nghệ
                        tiên tiến vào quy trình gia công cửa nhôm kính. Chất lượng sản phẩm và dịch vụ chuyên nghiệp
                        luôn là ưu tiên hàng đầu của công ty.
                    </p>
                    <p>
                        Với phương châm “Chất lượng đi đầu & Giá trị bền lâu”, Nhất Kim Window sẽ tiếp tục đồng hành
                        cùng
                        khách hàng để kiến tạo nên những công trình hiện đại, bền vững và đẳng cấp.
                    </p>
                </div>
            </div>
        </section>

        <!-- Why Choose Us Section -->
        <section class="why-choose-us">
            <div class="why-choose-us-container">
                <h2 class="us-section-title">Vì Sao Chọn Chúng Tôi</h2>
                <div class="us-content">
                    <div class="us-info-box">
                        <h3 class="us-info-title">Cam Kết Chất Lượng</h3>
                        <ul class="us-info-list">
                            <li>
                                <i class="us-icon fas fa-leaf"></i>
                                <div class="us-info-text">
                                    <span class="us-info-highlight">Xây Dựng Thân Thiện Môi Trường</span>
                                    <p>Ứng dụng công nghệ tiên tiến để giảm thiểu tác động đến môi trường.</p>
                                </div>
                            </li>
                            <li>
                                <i class="us-icon fas fa-tools"></i>
                                <div class="us-info-text">
                                    <span class="us-info-highlight">Công Nghệ Hiện Đại</span>
                                    <p>Sử dụng công nghệ tiên tiến giúp tối ưu hiệu suất và độ bền công trình.</p>
                                </div>
                            </li>
                            <li>
                                <i class="us-icon fas fa-hard-hat"></i>
                                <div class="us-info-text">
                                    <span class="us-info-highlight">Quản Lý Xây Dựng Chất Lượng Cao</span>
                                    <p>Chúng tôi cam kết đảm bảo chất lượng và tiến độ dự án.</p>
                                </div>
                            </li>
                        </ul>
                        <a class="us-btn" href="#support">Nhận Báo Giá Ngay</a>
                    </div>
                    <div class="us-image-box">
                        <iframe src="https://www.youtube.com/embed/o0Q_Xd0jihk?start=29" title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>

                <div class="us-stats">
                    <div class="us-stat-box">
                        <h4 class="us-stat-number" data-target="2020">0</h4>
                        <p class="us-stat-text">Năm Thành Lập</p>
                    </div>
                    <div class="us-stat-box">
                        <h4 class="us-stat-number" data-target="250">0</h4>
                        <p class="us-stat-text">Dự Án Hoàn Thành</p>
                    </div>
                    <div class="us-stat-box">
                        <h4 class="us-stat-number" data-target="26">0</h4>
                        <p class="us-stat-text">Nhân Viên Kỹ Thuật</p>
                    </div>
                    <div class="us-stat-box">
                        <h4 class="us-stat-number" data-target="10">0</h4>
                        <p class="us-stat-text">Nhân Viên Văn Phòng</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonial Section -->
        <section class="testimonial-section">
            <h2 class="testimonial-title">Khách hàng nói gì về chúng tôi?</h2>
            <div class="testimonial-slider swiper">
                <div class="swiper-wrapper">
                    <!-- Testimonial 1 -->
                    <div class="swiper-slide testimonial-item" style="height: 500px;">
                        <img src="./public/assets/images/phuonghaiduong.png"
                            alt="Person" class="testimonial-avatar">
                        <blockquote class="testimonial-quote">
                            "Tôi rất hài lòng với dịch vụ của công ty. Đội ngũ nhân viên làm việc chuyên nghiệp, tận
                            tâm và đúng tiến độ."
                        </blockquote>
                        <cite class="testimonial-author">
                            - Phương Hải Dương, Y tá Phòng Khám Đa Khoa Quốc Tế Hà Nội
                        </cite>
                    </div>

                    <!-- Testimonial 2 -->
                    <div class="swiper-slide testimonial-item" style="height: 500px;">
                        <img src="./public/assets/images/binhbeng.png"
                            alt="Person" class="testimonial-avatar">
                        <blockquote class="testimonial-quote">
                            "Sản phẩm chất lượng, thi công nhanh chóng và giá cả hợp lý. Tôi chắc chắn sẽ giới thiệu
                            cho bạn bè!"
                        </blockquote>
                        <cite class="testimonial-author">
                            - Bình Beeng, Kiến trúc sư tại Công ty Nhất Kim
                        </cite>
                    </div>

                    <!-- Testimonial 3 -->
                    <div class="swiper-slide testimonial-item" style="height: 500px;">
                        <img src="./public/assets/images/thongthong.png"
                            alt="Person" class="testimonial-avatar">
                        <blockquote class="testimonial-quote">
                            "Dịch vụ tuyệt vời! Công ty có đội ngũ chuyên gia giàu kinh nghiệm và thái độ làm việc
                            rất chuyên nghiệp."
                        </blockquote>
                        <cite class="testimonial-author">
                            - Thông Thông, Nhà sáng tạo nội dung số
                        </cite>
                    </div>

                    <!-- Testimonial 4 -->
                    <div class="swiper-slide testimonial-item" style="height: 500px;">
                        <img src="./public/assets/images/thanhhue.png"
                            alt="Person" class="testimonial-avatar">
                        <blockquote class="testimonial-quote">
                            "Tôi đã sử dụng dịch vụ này trong nhiều năm và chưa bao giờ thất vọng. Sự chuyên nghiệp và
                            tận tâm của đội ngũ là điều khiến tôi luôn quay lại."
                        </blockquote>
                        <cite class="testimonial-author">
                            - Thanh Huệ, Giám đốc Marketing
                        </cite>
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </section>

        <!-- <div class="home-banner">
            <img src="./public/assets/images/banner-nhat-kim.jpg" alt="Banner">
        </div> -->

        <div class="home-intro">
            <span class="home-intro-title">CÔNG TY CỔ PHẦN NHẤT KIM WINDOW</span>
            <div class="icon-wrapper">
                <img src="./public/assets/images/window-icon.png" alt="Window Icon">
            </div>
            <div class="home-intro-content">
                <div class="home-intro-content-left">
                    <iframe src="https://www.youtube.com/embed/whQyjnTGmsg" title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>
                </div>
                <div class="home-intro-content-right">
                    <p>
                        Nhất Kim Window là đơn vị tiên phong trong lĩnh vực thiết kế, sản xuất và thi công hệ thống cửa
                        nhôm
                        kính cao cấp tại Việt Nam. Với hơn 3 năm kinh nghiệm, chúng tôi cam kết mang đến những giải pháp
                        cửa hiện đại, bền vững và thẩm mỹ cao, đáp ứng mọi nhu cầu từ nhà ở dân dụng đến các công trình
                        kiến
                        trúc quy mô lớn.
                    </p>
                    <p>
                        Sở hữu nhà máy sản xuất tiên tiến cùng đội ngũ kỹ thuật viên giàu kinh nghiệm, Nhất Kim Window
                        không
                        ngừng cải tiến công nghệ, ứng dụng các tiêu chuẩn quốc tế vào từng sản phẩm. Chúng tôi cung cấp
                        đa
                        dạng dòng sản phẩm như cửa nhôm Owin, cửa kính cường lực, cửa nhựa lõi thép, vách kính mặt
                        dựng...
                        đảm bảo chất lượng vượt trội, khả năng cách âm, cách nhiệt tối ưu.
                    </p>
                    <p>
                        Với phương châm "Chất lượng đi đầu - Giá trị bền lâu", Nhất Kim Window luôn
                        đặt chữ Tín và Chất lượng lên hàng đầu, đồng hành cùng hàng ngàn khách hàng trong việc kiến tạo
                        những công trình sang trọng, bền bỉ và an toàn.
                    </p>
                    <p>
                        🔹 Chất lượng chuẩn quốc tế - Sử dụng vật liệu cao cấp, công nghệ tiên tiến.
                    </p>
                    <p>
                        🔹 Thiết kế hiện đại, đa dạng - Phù hợp với mọi phong cách kiến trúc.
                    </p>
                    <p>
                        🔹 Dịch vụ tận tâm - Bảo hành dài hạn, hỗ trợ khách hàng 24/7.
                    </p>
                    <p>
                        Hãy để Nhất Kim Window mang đến cho bạn không gian sống hoàn hảo, nơi mỗi khung cửa không chỉ
                        đơn
                        thuần là lối đi, mà còn là điểm nhấn tinh tế cho ngôi nhà của bạn! 🚪✨
                    </p>
                </div>
            </div>
            <div class="home-intro-news">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <?php
                        // Kết nối đến CSDL (giả sử $conn đã có sẵn)
                        $sql = "SELECT * FROM news WHERE status = 'da-dang' ORDER BY created_at DESC";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <div class="swiper-slide">
                                    <img src=" <?php echo htmlspecialchars($row['new_images']); ?>" alt="Image">
                                    <div class="home-intro-news-content">
                                        <h3 class="home-intro-news-content-title">
                                            <?php echo htmlspecialchars($row['title']); ?>
                                        </h3>
                                        <p class="home-intro-news-content-desc">
                                            <?php echo htmlspecialchars($row['slug']); ?>
                                        </p>
                                        <a href="./public/news-details.php?id=<?php echo $row['post_id']; ?>" class="home-intro-news-content-link">Xem thêm</a>
                                    </div>
                                </div>
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
            </div>
        </div>

        <div class="home-product">
            <h1>SẢN PHẨM NỔI BẬT</h1>
            <h2>Với nhiều năm hoạt động, chúng tôi luôn đem đến cho khách hàng những sản phẩm chất lượng cao, hiệu quả
                với chi phí được tối ưu nhất.</h2>

            <?php include './public/anhdang.php'; ?>

            <div class="home-product-button">
                <a class="btn" href="./public/products.php">Xem thêm</a>
            </div>
        </div>

        <div class="home-news-seft">
            <h1>BÁO CHÍ NÓI GÌ VỀ CHÚNG TÔI</h1>
            <div class="home-news-seft-item">
                <a href="#">
                    <img src="./public/assets/images/vietnamnet.png" alt="Image">
                </a>
                <a href="#">
                    <img src="./public/assets/images/24h.png" alt="Image">
                </a>
                <a href="#">
                    <img src="./public/assets/images/cafebiz.png" alt="Image">
                </a>
            </div>
        </div>

        <div id="services" class="home-services">
            <h1>DỊCH VỤ CỦA CHÚNG TÔI</h1>
            <div class="home-services-item">
                <a href="./lapdat.php">
                    <img src="./public/assets/images/service-1.png" alt="Image">
                    <span>Lắp đặt cửa nhôm</span>
                </a>
                <!-- <a href="#">
                    <img src="./public/assets/images/window-icon.png" alt="Image">
                    <span>Gia công kính cường lực</span>
                </a> -->
                <a href="./tuvan.php">
                    <img src="./public/assets/images/service-2.png" alt="Image">
                    <span>Tư vấn thiết kế</span>
                </a>
                <a href="#">
                    <img src="./public/assets/images/window-icon.png" alt="Image">
                    <span>Dịch vụ khác</span>
                </a>
                <a href="#">
                    <img src="./public/assets/images/window-icon.png" alt="Image">
                    <span>Dịch vụ khác</span>
                </a>
                <!-- <a href="#">
                    <img src="./public/assets/images/window-icon.png" alt="Image">
                    <span>Dịch vụ khác</span>
                </a> -->
            </div>
        </div>

        <div class="home-intro procedure-primary">
            <span class="home-intro-title">Quy trình làm việc của Nhất Kim Window</span>
            <div class="icon-wrapper">
                <img src="./public/assets/images/window-icon.png" alt="Window Icon">
            </div>
            <div class="home-procedure">
                <div class="workflow-custom">
                    <div class="workflow-step step-custom1 top">
                        <span class="workflow-number">01</span>
                        <div class="workflow-icon">
                            <i class="fa-solid fa-user-plus"></i>
                        </div>
                        <p class="workflow-title">LIÊN HỆ KHÁCH HÀNG</p>
                        <p class="workflow-details">Trao đổi về ý tưởng sản phẩm, phân khúc sản phẩm và các dịch vụ đi
                            kèm.</p>
                    </div>

                    <div class="workflow-step step-custom2 bottom">
                        <span class="workflow-number">02</span>
                        <div class="workflow-icon">
                            <i class="fa-brands fa-product-hunt"></i>
                        </div>
                        <p class="workflow-title">XÁC NHẬN MẪU</p>
                        <p class="workflow-details">Gửi mẫu và trao đổi về điều chỉnh mẫu để ưng ý khách hàng nhất và
                            hoàn hảo nhất.</p>
                    </div>

                    <div class="workflow-step step-custom3 top">
                        <span class="workflow-number">03</span>
                        <div class="workflow-icon">
                            <i class="fa-solid fa-dollar-sign"></i>
                        </div>
                        <p class="workflow-title">BÁO GIÁ</p>
                        <p class="workflow-details">Sau khi khách hàng đã chốt được mẫu ưng ý, công ty sẽ tiến hành lên
                            báo giá.</p>
                    </div>

                    <div class="workflow-step step-custom4 bottom">
                        <span class="workflow-number">04</span>
                        <div class="workflow-icon">
                            <i class="fa-solid fa-file-signature"></i>
                        </div>
                        <p class="workflow-title">KÝ HỢP ĐỒNG VÀ CỌC HỢP ĐỒNG</p>
                        <p class="workflow-details">Khách hàng đã chốt được giá cả, công ty sẽ tiến hành ký kết hợp đồng
                            sản xuất và khách hàng tiến hành đặt cọc đơn hàng.</p>
                    </div>

                    <div class="workflow-step step-custom5 top">
                        <span class="workflow-number">05</span>
                        <div class="workflow-icon">
                            <i class="fa-solid fa-truck"></i>
                        </div>
                        <p class="workflow-title">SẢN XUẤT VÀ GIAO HÀNG</p>
                        <p class="workflow-details">Tiến hành sản xuát và giao hàng theo tiến độ và địa chỉ mà 2 bên đã
                            thống nhát trên hợp đồng.</p>
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

        <div class="home-partner">
            <h1>ĐỐI TÁC CỦA CHÚNG TÔI</h1>
            <h2>Với những bước tiến mạnh mẽ từng ngày, chúng tôi đã có rất nhiều đối tác trong và ngoài nước.</h2>
            <div class="home-partner-item">
                <img src="./public/assets/images/Owin.jpg" alt="Image">
                <img src="./public/assets/images/logocmech.jpg" alt="Image">
                <img src="./public/assets/images/logokinhhong.jpg" alt="Image">
                <img src="./public/assets/images/logomaxpro.jpg" alt="Image">
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
                            <a href="./public/news-details.php?id=<?php echo $row['post_id']; ?>">
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
                                    <a href="./public/news-details.php?id=<?php echo $row['post_id']; ?>" class="home-intro-news-content-link">Xem thêm</a>
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
                <a class="btn" href="./public/news.php">Xem thêm bài viết khác</a>
            </div>
        </div>

        <div id="support" class="home-contact">
            <h1>Đừng ngần ngại! Hãy gọi ngay đến chúng tôi để được tư vấn trực tiếp</h1>
            <a href="tel:0909179579">
                <i class="fas fa-phone"></i>
                <span>Hotline: 0909 179 579</span>
            </a>
            <div class="home-contact-item">
                <div class="home-contact-left">
                    <div class="flip-card__inner">
                        <div class="flip-card__front">
                            <div class="title">ĐĂNG KÝ TƯ VẤN</div>
                            <form class="flip-card__form" action="./database/addInquiry.php" method="POST">
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
                <div class="home-contact-right">
                    <iframe src="https://www.youtube.com/embed/whQyjnTGmsg" title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>

        <!-- Contact Section -->
        <section class="contact-section" style="background-color: var(--white-color);">
            <!-- <div class="contact-container">
                <div class="contact-form">
                    <h3 class="contact-title">Liên hệ với chúng tôi</h3>
                    <form class="flip-card__form" action="">
                        <input class="flip-card__input" name="name" placeholder="Họ và tên" type="text" required>
                        <input class="flip-card__input" name="phone" placeholder="Số điện thoại" type="number" required>
                        <input class="flip-card__input" name="email" placeholder="Email" type="email" required>
                        <textarea class="flip-card__input" placeholder="Lời nhắn" style="height: 150px;"
                            required></textarea>
                        <button class="flip-card__btn">Gửi tin nhắn</button>
                    </form>
                    <p id="contactMessage" class="contact-message"></p>
                </div>
                <div class="contact-info">
                    <ul>
                        <li><i class="fas fa-map-marker-alt"></i> 408 Nguyễn Lương Bằng, TP Hải Dương</li>
                        <li><i class="fas fa-phone"></i> 0909 179 579</li>
                        <li><i class="fas fa-envelope"></i> nhatkimwindow@gmail.com</li>
                    </ul>
                    <div class="contact-social">
                        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div> -->
            <!-- Google Maps -->
            <div class="contact-map">
                <iframe
                    src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=408 Nguyễn Lương Bằng, TP Hải Dương&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
                    width="100%" height="550" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </section>
    </div>
    <?php include './includes/footer.php'; ?>
</body>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const counters = document.querySelectorAll(".us-stat-number");

        const startCounter = (counter) => {
            const target = +counter.getAttribute("data-target");
            let count = 0;
            const speed = target / 50;

            const interval = setInterval(() => {
                count += speed;
                counter.textContent = Math.floor(count);

                if (count >= target) {
                    counter.textContent = target;
                    clearInterval(interval);
                }
            }, 50);
        };

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    startCounter(entry.target);
                    observer.unobserve(entry.target); // Ngừng theo dõi sau khi chạy 1 lần
                }
            });
        }, { threshold: 0.5 }); // Kích hoạt khi ít nhất 50% phần tử xuất hiện trên màn hình

        counters.forEach((counter) => observer.observe(counter));
    });

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
            autoplay: { delay: 5000 },
            centeredSlides: true, // focus vào giữa
            breakpoints: {
                1024: {
                    slidesPerView: 3, // Desktop hiển thị 3 slide
                },
                768: {
                    slidesPerView: 1, // Tablet hiển thị 1 slide
                },
                0: {
                    slidesPerView: 1, // Mobile hiển thị 1 slide
                }
            }
        });
    });
    document.addEventListener("DOMContentLoaded", function () {
        let video = document.getElementById("videoFrame");
        video.src += "&autoplay=1&mute=1"; // Thêm lại autoplay sau khi DOM load
    });
</script>

</html>