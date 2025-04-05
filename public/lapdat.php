<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="./assets/images/nhat-kim-logo-no-slogan12.png" sizes="32x32" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <title>Lắp đặt</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
         

        @media screen and (max-width: 1280px) {
            .hero {
                display: flex;
                flex-direction: column;
                position: relative;
                z-index: 1;
                min-height: 500px;
                /* Hoặc chiều cao phù hợp để chứa hình ảnh */
            }

            .container1 {
                width: 100%;
                max-width: 1200px;
                margin: 20px auto;
                padding: 20px;
            }

            .table-container {
                overflow-x: auto;
            }

            table {
                display: block;
                width: 100%;
                overflow-x: auto;
                white-space: nowrap;
            }

            th,
            td {
                padding: 8px;
                font-size: 14px;
            }

            .text-orange {
                font-size: 18px;
            }

            .text-blue {
                font-size: 14px;
            }
        }

        @media screen and (min-width: 1280px) {

            .hero {
                display: flex;
                position: relative;
                z-index: 1;
                min-height: 500px;
                /* Hoặc chiều cao phù hợp để chứa hình ảnh */
            }

            .container1 {
                width: 50%;
                max-width: 1200px;
                margin: 20px auto;
                padding: 20px;
            }
        }





        .highlight-box {
            background-color: #FEF3C7;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .highlight-box p {
            color: #D97706;
            font-weight: bold;
        }

        .table-container {
            background: white;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #FAFAFA;
        }

        .text-orange {
            color: #D97706;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .text-blue {
            color: #2563EB;
            margin-top: 10px;
        }

        .repair-info {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            border: 1px solid #ddd;

            margin: 20px auto;
        }

        .title1 {
            color: #D97706;
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .issue {
            margin-bottom: 15px;
            padding: 10px;
            border-left: 4px solid #D97706;
            background: white;
            border-radius: 5px;
        }

        .issue-title {
            font-size: 18px;
            color: #D97706;
            font-weight: bold;
            margin-bottom: 5px;
        }

        p {
            font-size: 16px;
            color: #444;
            line-height: 1.5;
        }
    </style>
</head>

<body >
    <!-- Header -->
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
    <div style="margin-top: 5%;"></div>

    <div class="wrapper">
        <!-- Hero Section -->

        <!-- Hero Section -->
        <div class="hero">


            <body1 class="bg-white-100 text-gray-800 font-sans">
                <?php include 'imageslide.php'; ?>
                <div class="container mx-auto p-4">
                    <div class="w-/5 mx-auto bg-white p-6   rounded-lg">
                        <h1 class="text-orange-500 text-2xl font-bold text-center mb-4">
                            QUY TRÌNH THI CÔNG 10 BƯỚC
                        </h1>


                        <ol class="list-decimal list-inside space-y-4 text-center text-lg font-semibold">
                            <li>1.TIẾP NHẬN NHU CẦU THI CÔNG BÁO GIÁ NHÔM KÍNH</li>
                            <li>2.TƯ VẤN, ĐO ĐẠC VÀ KHẢO SÁT TRỰC TIẾP
                                <p class="font-normal text-gray-600">Tư vấn và báo giá khách hàng trực tiếp tại văn
                                    phòng</p>
                            </li>
                            <li>3.THIẾT KẾ BẢN VẼ KỸ THUẬT VỚI PHƯƠNG ÁN CHI PHÍ TỐT NHẤT</li>
                            <li>4.BÓC TÁCH VẬT LIỆU TỪ BẢN VẼ</li>
                            <li>5.CHỐT PHƯƠNG ÁN THI CÔNG &amp; KÝ HỢP ĐỒNG</li>
                            <li>6.CHUẨN BỊ VẬT TƯ KÍNH CƯỜNG LỰC &amp; PHỤ KIỆN</li>
                            <li>7.VẬN CHUYỂN VẬT TƯ ĐẾN CÔNG TRÌNH</li>
                            <li>8.THI CÔNG LẮP ĐẶT CÔNG TRÌNH
                                <p class="font-normal text-gray-600">Lắp đặt kính cường lực bản lề sàn</p>
                            </li>
                            <li>9.HOÀN THÀNH THI CÔNG VÀ LẬP HỒ SƠ NGHIỆM THU</li>
                            <li>10.BÀN GIAO CÔNG TRÌNH, THỰC HIỆN BẢO HÀNH ĐỊNH KỲ VÀ BẢO TRÌ </li>
                        </ol>
                    </div>
                </div>
            </body1>
            <div class="container1">
                <p>
                    Với Quy trình dịch vụ chuyên nghiệp, bài bản từ quá trình tư vấn đến khi lắp đặt hoàn thiện và bàn
                    giao,
                    Nhất kim Window mong muốn sẽ ngày càng có nhiều khách hàng hài lòng khi lựa chọn dịch vụ chúng
                    tôi.
                </p>
                <div class="highlight-box">
                    <p>Làm cửa nhôm kính tại Hải Dương giá tốt nhất. Nhất Kim Window chuyên Làm cửa nhôm kính 24/24h,
                        sửa chữa cửa cửa nhôm
                        kính dứt điểm. Liên hệ Làm cửa nhôm kính tại Hải Dương 0909 179 579. Khi cửa nhôm gặp sự cố hãy
                        gọi
                        ngay dịch vụ Làm cửa nhôm 24/7 tại Nhất Kim Window. Công ty Nhất Kim Window chuyên cung cấp dịch
                        vụ Làm cửa nhôm
                        kính tại Hải Dương giá rẻ, mọi lúc mọi nơi.
                    </p>
                    <p>Đừng bỏ lỡ bạn nhé!</p>
                </div>
                <div class="table-container">
                    <h2 class="text-orange">Cửa Nhôm Kính Nhất Kim Window</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>LOẠI CỬA NHÔM & VÁCH</th>
                                <th>MÔ TẢ</th>
                                <th>MÔ TẢ CHI TIẾT</th>
                                <th>ĐƠN GIÁ / M2</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Cửa nhôm kính hệ 700</td>
                                <td>Nhôm: sơn tĩnh điện màu trắng sứ, vân gỗ, đen mờ</td>
                                <td>Độ dày khung nhôm 25x50mm</td>
                                <td>Liên hệ</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Cửa nhôm kính hệ 1000</td>
                                <td>Nhôm: sơn tĩnh điện màu trắng sứ, vân gỗ, đen mờ</td>
                                <td>Độ dày khung nhôm 25x76mm</td>
                                <td>Liên hệ</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Vách nhôm kính độ nhỏ</td>
                                <td>Kính thường 5mm, trắng trong hoặc mờ</td>
                                <td>Độ dày khung nhôm 25x50mm</td>
                                <td>Liên hệ</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Vách nhôm kính độ to</td>
                                <td>Kính thường 5mm, trắng trong hoặc mờ</td>
                                <td>Độ dày khung nhôm 25x76mm</td>
                                <td>Liên hệ</td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="text-blue">ĐƠN GIÁ ĐÃ BAO GỒM PHÍ VẬN CHUYỂN VÀ THI CÔNG LẮP ĐẶT HOÀN THIỆN</p>
                </div>
            </div>

        </div>
        <div class="repair-info">
            <h2 class="title1">Nhất Kim Window - Những hư hỏng cần làm cửa nhôm kính</h2>
            <div class="issue">
                <h3 class="issue-title">Làm nhôm kính bị kẹt</h3>
                <p>Đó là sự cố thường xuyên xảy ra trong quá trình sử dụng khiến cho cửa nhôm khó có thể di chuyển, tạo
                    những tiếng kêu khó chịu khi đóng mở cửa. Khi gặp sự cố này thì ngoài việc làm cho cửa khó đóng – mở
                    mà còn phát ra tiếng ồn gây khó chịu cho người sử dụng và những người xung quanh. Khi đó hãy liên hệ
                    với <strong>Nhất Kim Window</strong> để sử dụng dịch vụ làm nhôm kính ngay lập tức.</p>
            </div>

            <div class="issue">
                <h3 class="issue-title">Gioăng cao su bị bung khỏi cửa</h3>
                <p>Sự cố này làm ảnh hưởng đến độ khít của cửa và ảnh hưởng đến việc đóng cửa chặt, an toàn hơn. Do đó
                    chúng ta cần phải được làm nhôm một cách kịp thời.</p>
            </div>

            <div class="issue">
                <h3 class="issue-title">Khóa, chốt cửa bị hỏng</h3>
                <p>Do sự sơ ý của người sử dụng hoặc một yếu tố khách quan nào đó khiến cho khóa cửa kính bị kẹt, chốt
                    cửa bị gẫy. Khóa và chốt cửa bị hỏng gây nguy hại rất lớn đến sự an toàn của người và tài sản trong
                    nhà. Lúc đó bạn có thể gọi ngay cho thợ làm nhôm kính của <strong>Nhất Kim Window</strong> để được
                    khắc phục một cách nhanh nhất.</p>
            </div>

            <div class="issue">
                <h3 class="issue-title">Bản lề cửa bị lệch</h3>
                <p>Sự cố này khiến cho cửa bị xập xệ, bản lề bị gãy hoàn toàn và có thể sập xuống bất cứ lúc nào. Đây
                    chính là mối nguy hại rất lớn đối với người sử dụng và cần đến sự hỗ trợ của đội ngũ sửa chữa cửa
                    nhôm kính ngay lập tức.</p>
            </div>
        </div>
        <?php include '10buoc.php'; ?>
        <div class="home-contact">
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
                <iframe allowfullscreen="" frameborder="0" width="560" height="315"
                            src="https://www.youtube.com/embed/o0Q_Xd0jihk?start=720">
                        </iframe>

                </div>
            </div>
        </div>
    </div>
    <?php include '../includes/footer.php'; ?>

</body>