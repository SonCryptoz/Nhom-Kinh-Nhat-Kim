<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <title>Document</title>
    <style>
        /* Layout desktop (3 cột) */
        .footer-container {
            width: 100%;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            padding: 20px 0 80px 0;
            gap: 40px;
        }

        .footer-divider {
            border: none;
            height: 1px;
            background-color: var(--primary-color);
            margin: 0;
            margin-bottom: 10px;
        }

        .footer-column {
            flex: 1;
            min-width: 300px;
            text-align: justify;
        }

        .footer-logo {
            max-width: 150px;
            margin-bottom: 10px;
        }

        .footer-text {
            color: #333;
            font-size: 14px;
            line-height: 1.6;
        }

        .footer-icons {
            margin-top: 10px;
            display: flex;
        }

        .footer-icons a {
            width: 35px;
            height: 35px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            margin-right: 10px;
            background-color: var(--primary-color);
            transition: linear 0.2s;
        }

        .footer-icons a:hover {
            scale: 1.1;
        }

        .footer-icons a:active {
            scale: 1;
        }

        .footer-icons a i {
            color: var(--white-color);
            font-size: 1.2rem;
        }

        .footer-icons img {
            width: 25px;
        }

        .footer-title {
            color: #d83131;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .footer-list {
            list-style: none;
            padding: 0;
            color: #333;
            font-size: 14px;
            line-height: 1.8;
        }

        .footer-list a {
            color: #d83131;
            text-decoration: none;
        }

        .footer-list.line-height {
            line-height: 3;
        }

        .footer-iframe {
            border: none;
            overflow: hidden;
            width: 100%;
            max-width: 340px;
            height: 200px;
        }

        /* Layout mobile (2 cột, 1 hàng) */
        @media screen and (max-width: 768px) {
            .line-height li{
             font-size: 12px !important;
            }
            .footer-container {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 20px;
            }

            .footer-column {
                display: flex;
                flex-direction: column;
                width: 100%;
                text-align: justify;
                align-items: center;
                
            }
             

            .footer-icons {
                justify-content: center;
            }
        }
    </style>
</head>

<body>
    <footer>
        <hr class="footer-divider">
        <div class="wrapper">
            <div class="footer-container">

                <!-- Cột 1: Logo và mô tả -->
                <div class="footer-column">
                    <img src="../public/assets/images/nhat-kim-logo.png" alt="Nhat Kim Logo" class="footer-logo">
                    <p class="footer-text">
                        Nhất Kim Window là đơn vị hàng đầu trong lĩnh vực sản xuất, thi công và lắp đặt cửa nhôm kính
                        cao cấp. Với hệ thống nhà máy quy mô lớn, dây chuyền sản xuất hiện đại cùng đội ngũ kỹ thuật
                        viên giàu kinh nghiệm, chúng tôi cam kết mang đến cho khách hàng những sản phẩm chất lượng cao,
                        thiết kế tinh tế và độ bền vượt trội.

                        Nhất Kim Window tự hào đạt các tiêu chuẩn chất lượng khắt khe, cung cấp đa dạng các giải pháp
                        cửa nhôm kính từ dân dụng đến công trình cao cấp. Chúng tôi luôn sẵn sàng đáp ứng mọi nhu cầu
                        thiết kế, thi công với chi phí tối ưu và dịch vụ chuyên nghiệp nhất.
                    </p>
                    <div class="footer-icons">
                        <a href="#"><i class="fa-regular fa-envelope"></i></a>
                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                </div>

                <!-- Cột 2: Thông tin liên hệ -->
                <div class="footer-column">
                    <h3 class="footer-title laptop-margin">Thông tin liên hệ</h3>
                    <ul class="footer-list line-height">
                        <li>VP đại diện: 408 Nguyễn Lương Bằng, TP Hải Dương</li>
                        <li>Nhà Máy: 408 Nguyễn Lương Bằng, TP Hải Dương</li>
                        <li>Hotline: <a href="tel:1900299288">0909 179 579</a></li>
                        <li>Email: <a href="mailto:nhatkimwindow@gmail.com">nhatkimwindow@gmail.com</a></li>
                    </ul>
                </div>

                <!-- Cột 3: Kết nối với chúng tôi -->
                <div class="footer-column">
                    <h3 class="footer-title">Kết nối với chúng tôi</h3>
                    <iframe class="footer-iframe"
                        src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fanhduong1109&tabs=&width=340&height=200&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=996793137417177"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>