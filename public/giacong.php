<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <style>
        html,
        body {
            background: url(/public/assets/images/backbodylatdat.png);
            background-repeat: repeat;
            background-size: auto;
            background-position: top left;

            overflow-x: hidden;
            width: 100%;
        }

        .backgroundtin {
            width: 100vw;
            background: url(/public/assets/images/phongbackground.png);
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            padding: 20px 0;
        }

        .video-container {
            width: 350px;
            height: 550px;
            margin: auto;
        }

        .video-container video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Đảm bảo video không méo */
        }

        .icon-custom {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 28px;
            height: 28px;
            background-color: #22c55e;
            /* Màu xanh lá */
            border: 2px solid #facc15;
            /* Viền màu vàng */
            border-radius: 50%;
            font-size: 16px;
            color: white;
            font-weight: bold;
        }
    </style>
</head>

<body class="bg-white-50 overflow-x-hidden">
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
    <div class="backgroundtin">
        <div class="max-w-6xl mx-auto p-6 w-full">
            <header2 class="text-center py-8">
                <h1 class="text-3xl font-bold text-green-600">GIA CÔNG CỬA NHÔM KÍNH TRỌN GÓI</h1>
                <p class="text-yellow-400 text-2xl font-semibold">Chất lượng đi đầu - Giá trị bền lâu</p>
            </header2>

            <div class="  rounded-lg p-6 mb-8 w-full">
                <div class="flex flex-col md:flex-row items-center md:items-start text-center md:text-left">
                    <div class="video-container w-full md:w-1/2 flex justify-center">
                        <video controls class="w-full max-w-[90%] md:max-w-[500px]">
                            <source src="./uploads/product-videos/cuakinh1.mp4" type="video/mp4">
                        </video>
                    </div>


                    <div class=" md:w-1/2 md:pl-6 mt-6 md:mt-0 w-full">
                        <p class="bg-white text-gray-700 mb-4 rounded-lg p-4 shadow">
                            Nhất kim Window – công ty cung cấp nhôm kính uy tín tại Việt Nam.Với nhu cầu tăng cao của
                            khách
                            hàng, ngày càng có nhiều các đơn vị thi công, cung cấp kính cách âm trên thị trường. Tuy
                            nhiên,
                            bạn cần là người mua hàng thông thái để nhận diện được thương hiệu cung cấp kính uy tín với
                            mức
                            giá tốt. Chứ không nên vì thấy giá rẻ mà mua phải các sản phẩm kém chất lượng. Vừa ảnh hưởng
                            đến
                            chất lượng công trình, thậm chí gây mất an toàn cho mọi người xung quanh.
                        </p>
                        <p class="bg-white text-gray-700 mb-4 rounded-lg p-4 shadow">
                            Nếu quý khách hàng chưa tìm được đơn vị cung cấp cửa kính cách âm uy tín, giá cả phù hợp.
                            Thì có
                            thể tham khảo tại công ty chúng tôi- Nhất kim Window. Chúng tôi là một trong những đơn vị
                            cung
                            cấp các sản phẩm và giải pháp về nhôm kính được nhiều người tin tưởng lựa chọn.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="max-w-6xl mx-auto p-6 w-full">
        <div class=" rounded-lg p-6 w-full">
            <h2 class="text-2xl font-bold text-green-500 mb-4 text-center md:text-left">
                Gia công cửa kính theo yêu cầu của khách hàng
            </h2>
            <p class="text-gray-700 mb-4 text-center md:text-left">
                Bạn đã có ý tưởng về công trình của mình, nhưng vẫn đang phân vân xem nên thực thi như nào và đơn vị
                nào sẽ biến những lý tưởng của bạn thành sự thật.Đừng lo lắng! Chúng tôi sẽ giúp bạn tư vấn và lựa
                chọn giải pháp tối ưu, đảm bảo công trình của bạn không chỉ đẹp mắt mà còn bền bỉ theo thời gian.
            </p>
            <p class="text-gray-700 mb-4 text-center md:text-left">
                Hoặc bạn đang tìm kiếm giải pháp cửa cho công trình của mình nhưng chưa biết lựa chọn loại nào phù
                hợp?
                Cửa nhôm kính chính là xu hướng được ưa chuộng nhờ thiết kế tinh tế, sang trọng cùng độ bền vượt
                trội.
                Đến với chúng tôi, bạn sẽ được tư vấn chi tiết về các dòng sản phẩm cửa nhôm kính phổ biến, hiện
                đại, phù hợp xu hướng và bán chạy trên thị trường. Chúng tôi cung cấp đa dạng mẫu mã từ cửa đi, cửa
                sổ mở quay, mở trượt, cửa xếp gấp, đáp ứng mọi nhu cầu của khách hàng.
            </p>
            <div class="mt-6 flex justify-center">
                <img src="./assets/images/anhkinhgiacong.png" alt="Cosmetic Example"
                    class="w-full md:w-4/5 mx-auto rounded-lg">
            </div>
            <p class="text-center mt-6">
                Hãy để chúng tôi đồng hành cùng bạn trong việc tạo dựng không gian sống và
                kinh doanh chuyên nghiệp với cửa nhôm kính cao cấp!
            </p>
        </div>



        <div class="max-w-6xl mx-auto p-6 w-full">
            <div class=" rounded-lg p-6 mb-8 w-full">
                <h2 class="text-2xl font-bold text-green-500 mb-4 text-center md:text-left">
                    CỬA NHÔM KÍNH - GIẢI PHÁP HOÀN HẢO CHO KHÔNG GIAN HIỆN ĐẠI
                </h2>

                <p class="text-gray-700 mb-4 text-center md:text-left">
                    Không chỉ dừng lại ở việc lựa chọn mẫu mã, chúng tôi còn giúp bạn tìm ra giải pháp tối ưu về
                    chất
                    liệu, độ dày nhôm,
                    loại kính, phụ kiện đi kèm để đảm bảo sản phẩm bền bỉ, an toàn và tăng tính thẩm mỹ cho không
                    gian.
                </p>

                <p class="text-gray-700 mb-4 text-center md:text-left">
                    Cửa nhôm kính không chỉ mang lại vẻ đẹp hiện đại, sang trọng mà còn có những ưu điểm vượt trội
                    như:
                </p>

                <!-- Danh sách ưu điểm -->
                <ul class="text-gray-700 mb-4 space-y-2">
                    <li class="flex items-start gap-2">
                        <img src="./assets/images/tich.png" alt="Check Icon"
                            class="w-6 h-6 md:w-7 md:h-7 flex-shrink-0 self-start">
                        <span class="flex-1"><strong>Độ bền cao</strong>: Nhôm cao cấp chống oxy hóa, không cong
                            vênh,
                            không mối mọt.</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <img src="./assets/images/tich.png" alt="Check Icon"
                            class="w-6 h-6 md:w-7 md:h-7 flex-shrink-0 self-start">
                        <span class="flex-1"><strong>Cách âm, cách nhiệt tốt</strong>: Kết hợp kính cường lực giúp
                            giảm
                            tiếng ồn, tiết kiệm năng lượng.</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <img src="./assets/images/tich.png" alt="Check Icon"
                            class="w-6 h-6 md:w-7 md:h-7 flex-shrink-0 self-start">
                        <span class="flex-1"><strong>Thiết kế linh hoạt</strong>: Nhiều kiểu dáng như cửa mở quay,
                            mở
                            trượt, xếp gấp phù hợp với mọi không gian.</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <img src="./assets/images/tich.png" alt="Check Icon"
                            class="w-6 h-6 md:w-7 md:h-7 flex-shrink-0 self-start">
                        <span class="flex-1"><strong>Dễ dàng vệ sinh, bảo trì</strong>: Không bị bám bẩn, dễ lau
                            chùi,
                            luôn giữ được vẻ sáng bóng.</span>
                    </li>
                </ul>




                <!-- Ảnh Slide -->
                <div class="mt-6">
                    <?php include '../public/anhslide.php'; ?>
                </div>

                <p class="text-gray-700 mt-6 text-center md:text-left">
                    Quý khách hoàn toàn có thể tùy chỉnh thiết kế cửa kính theo mong muốn, từ kiểu dáng, độ dày kính
                    đến
                    hoa văn trang trí,
                    dựa trên phong cách riêng hoặc tư vấn từ đội ngũ chuyên gia của chúng tôi. Chúng tôi sẽ nghiên
                    cứu
                    và tinh chỉnh sản phẩm
                    cho đến khi quý khách hài lòng.
                </p>

                <p class="text-gray-700 mt-4 text-center md:text-left">
                    Ngoài ra, với công nghệ sản xuất tiên tiến, quý khách còn có thể lựa chọn các loại kính cường
                    lực,
                    kính chống ồn,
                    kính phản quang hoặc thêm các lớp phủ đặc biệt để tăng độ bền, tính an toàn và thẩm mỹ cho sản
                    phẩm.
                    Khi đưa vào sử dụng,
                    cửa kính không chỉ đáp ứng nhu cầu mà còn tạo nên điểm nhấn sang trọng, giúp công trình của quý
                    khách nổi bật hơn.
                </p>
                <p class="text-gray-700 mt-4 text-center md:text-left">
                    Với những ưu điểm trên, việc lựa chọn sản xuất và lắp đặt cửa kính theo yêu cầu là xu hướng tất
                    yếu
                    hiện nay. Đồng thời, nhu cầu về không gian sống hiện đại, sang trọng ngày càng gia tăng, khiến
                    cửa
                    kính trở thành lựa chọn hàng đầu, mở ra nhiều cơ hội phát triển và đột phá mạnh mẽ trong tương
                    lai.
                </p>
                <h3 class="  text-1xl font-bold text-gray-700 mt-4 text-center md:text-left">Chúng tôi luôn sẵn sàng
                    đồng hành để mang đến cho quý
                    khách những sản phẩm chất lượng nhất!</h3>
            </div>
        </div>


        <div class="  rounded-lg p-6 w-full">
            <h2 class="text-2xl font-bold text-green-500 mb-4 text-center md:text-left">
                CÁC DÒNG SẢN PHẨM NHÔM KÍNH CHÚNG TÔI CUNG CẤP
            </h2>

            <p class="text-gray-700 mt-4 text-center md:text-left">
                Với sự đa dạng trong mẫu mã và công nghệ sản xuất tiên tiến, chúng tôi mang đến những sản phẩm nhôm
                kính chất lượng cao, đáp ứng mọi nhu cầu về thiết kế và không gian sống hiện đại.
            </p>

            <ul class="text-gray-700 mb-4 space-y-2">
                <li class="flex items-start gap-2">
                    <span
                        class="w-7 h-7 flex items-center justify-center bg-green-500 border-2 border-yellow-400 text-white font-bold rounded-full mr-2">🔹</span>
                    <span class="flex-1">
                        <strong class="flex-1">Cửa nhôm kính cao cấp</strong>: Cửa đi mở quay, cửa đi mở lùa, cửa
                        xếp
                        trượt, cửa đi tự
                        động, cửa nhôm thủy lực.
                    </span>
                </li>
                <li class="flex items-start gap-2">
                    <span
                        class="w-7 h-7 flex items-center justify-center bg-green-500 border-2 border-yellow-400 text-white font-bold rounded-full mr-2">🔹</span>
                    <span class="flex-1">
                        <strong>Cửa sổ nhôm kính</strong>: Cửa sổ mở quay, cửa sổ mở lùa, cửa sổ bật, cửa sổ xếp
                        trượt.
                    </span>
                </li>
                <li class="flex items-start gap-2">
                    <span
                        class="w-7 h-7 flex items-center justify-center bg-green-500 border-2 border-yellow-400 text-white font-bold rounded-full mr-2">🔹</span>
                    <span class="flex-1">
                        <strong>Mặt dựng nhôm kính</strong>: Mặt dựng Spider, mặt dựng Stick, mặt dựng Unitized, mặt
                        dựng Semi.
                    </span>
                </li>
                <li class="flex items-start gap-2">
                    <span
                        class="w-7 h-7 flex items-center justify-center bg-green-500 border-2 border-yellow-400 text-white font-bold rounded-full mr-2">🔹</span>
                    <span class="flex-1">
                        <strong>Vách kính cường lực</strong>: Vách kính văn phòng, vách kính phòng tắm, vách kính
                        showroom, vách ngăn kính cho không gian mở.
                    </span>
                </li>
                <li class="flex items-start gap-2">
                    <span
                        class="w-7 h-7 flex items-center justify-center bg-green-500 border-2 border-yellow-400 text-white font-bold rounded-full mr-2">🔹</span>
                    <span class="flex-1">
                        <strong>Lan can - cầu thang kính</strong>: Lan can kính cường lực, lan can kính ban công,
                        cầu
                        thang kính tay vịn gỗ/inox.
                    </span>
                </li>
                <li class="flex items-start gap-2">
                    <span
                        class="w-7 h-7 flex items-center justify-center bg-green-500 border-2 border-yellow-400 text-white font-bold rounded-full mr-2">🔹</span>
                    <span class="flex-1">
                        <strong>Mái kính - giếng trời</strong>: Mái kính lấy sáng, giếng trời kính cường lực, mái
                        che
                        kính nghệ thuật.
                    </span>
                </li>
                <li class="flex items-start gap-2">
                    <span
                        class="w-7 h-7 flex items-center justify-center bg-green-500 border-2 border-yellow-400 text-white font-bold rounded-full mr-2">🔹</span>
                    <span class="flex-1">
                        <strong>Phòng tắm kính</strong>: Phòng tắm kính cường lực, phòng tắm kính vuông góc, phòng
                        tắm
                        kính vách ngăn.
                    </span>
                </li>
                <li class="flex items-start gap-2">
                    <span
                        class="w-7 h-7 flex items-center justify-center bg-green-500 border-2 border-yellow-400 text-white font-bold rounded-full mr-2">🔹</span>
                    <span class="flex-1">
                        <strong>Kính trang trí nội thất</strong>: Kính màu ốp bếp, kính sơn, kính hoa văn, kính khắc
                        kim
                        sa, kính in UV.
                    </span>
                </li>

                <li class="flex items-start gap-2">
                    <span
                        class="w-7 h-7 flex items-center justify-center bg-green-500 border-2 border-yellow-400 text-white font-bold rounded-full mr-2">🔹</span>
                    <span class="flex-1">
                        <strong>Kính trang trí nội thất</strong>: Kính màu ốp bếp, kính sơn, kính hoa văn, kính khắc
                        kim sa, kính in UV.
                    </span>
                </li>


            </ul>
        </div>
        <?php include '../public/anhdang.php'; ?>

        <p class="text-gray-700 mt-4 text-center md:text-left">
            Chúng tôi cam kết mang đến các sản phẩm nhôm kính chất lượng cao, độ bền vượt trội, đáp ứng nhu cầu
            thẩm mỹ và công năng sử dụng cho mọi không gian.
        </p>

        <div class="max-w-6xl mx-auto p-6 w-full">

            <h2 class="text-2xl font-bold text-green-500 mb-4 text-center md:text-left"> Xưởng máy Nhất Kim Window
                luôn
                sử dụng thiết bị tiên
                tiến để tạo sản phẩm chất lượng</h2>
            <div class="flex justify-center my-6">
                <iframe width="860" height="515" src="https://www.youtube.com/embed/whQyjnTGmsg"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>

            </div>
        </div>
    </div>

    </div>
    <div class="wrapper">
        <div class="home-intro-news-2">
            <h1>TIN TỨC HOẠT ĐỘNG</h1>
            <div class="swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="./assets/images/nhat-kim-logo.png" alt="Image">
                        <div class="home-intro-news-content">
                            <h3 class="home-intro-news-content-title">
                                Nhất Kim Window ra mắt dòng sản phẩm cửa nhôm Xingfa mới
                            </h3>
                            <p class="home-intro-news-content-desc">
                                Nhất Kim Window vừa cho ra mắt dòng sản phẩm cửa nhôm Xingfa mới với thiết kế
                                hiện đại, chất lượng vượt trội, giá cả cạnh tranh.
                            </p>
                            <a href="#" class="home-intro-news-content-link">Xem thêm</a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <img src="./assets/images/nhat-kim-logo.png" alt="Image">
                        <div class="home-intro-news-content">
                            <h3 class="home-intro-news-content-title">
                                Nhất Kim Window ra mắt dòng sản phẩm cửa nhôm Xingfa mới
                            </h3>
                            <p class="home-intro-news-content-desc">
                                Nhất Kim Window vừa cho ra mắt dòng sản phẩm cửa nhôm Xingfa mới với thiết kế
                                hiện đại, chất lượng vượt trội, giá cả cạnh tranh.
                            </p>
                            <a href="#" class="home-intro-news-content-link">Xem thêm</a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <img src="./assets/images/nhat-kim-logo.png" alt="Image">
                        <div class="home-intro-news-content">
                            <h3 class="home-intro-news-content-title">
                                Nhất Kim Window ra mắt dòng sản phẩm cửa nhôm Xingfa mới
                            </h3>
                            <p class="home-intro-news-content-desc">
                                Nhất Kim Window vừa cho ra mắt dòng sản phẩm cửa nhôm Xingfa mới với thiết kế
                                hiện đại, chất lượng vượt trội, giá cả cạnh tranh.
                            </p>
                            <a href="#" class="home-intro-news-content-link">Xem thêm</a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <img src="./assets/images/banner-nhat-kim.jpg" alt="Image">
                        <div class="home-intro-news-content">
                            <h3 class="home-intro-news-content-title">
                                Nhất Kim Window ra mắt dòng sản phẩm cửa nhôm Xingfa mới
                            </h3>
                            <p class="home-intro-news-content-desc">
                                Nhất Kim Window vừa cho ra mắt dòng sản phẩm cửa nhôm Xingfa mới với thiết kế
                                hiện đại, chất lượng vượt trội, giá cả cạnh tranh.
                            </p>
                            <a href="#" class="home-intro-news-content-link">Xem thêm</a>
                        </div>
                    </div>
                </div>
                <!-- Nút điều hướng -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
            <div class="home-product-button">
                <a class="btn" href="#">Xem thêm bài viết khác</a>
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