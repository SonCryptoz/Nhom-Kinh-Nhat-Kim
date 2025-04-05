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
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<!-- JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<link rel="stylesheet" href="./assets/css/style.css">
<link rel="stylesheet" href="./assets/css/base.css">
<link rel="stylesheet" href="./assets/css/responsive.css">


    <title>Tư vấn</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .custom-form {
            color: #333;
            /* text-neutral-800 */
            padding: 24px;
            /* py-6 */
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            background: linear-gradient(to bottom, #ff99cc, #ffcc99, #99ccff, #cc99ff, #ffffff);
            max-width: 35%;
            /* lg:w-[35%] */

            min-height: 450px;
            border: 1px solid white;
            /* border-neutral-500 */
            border-radius: 8px;
            /* rounded-lg */

            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            /* shadow-lg */

        }

        @media screen and (max-width: 768px) {
            .layout-left {
                margin-top: 10px;
            }

            .social-icons a {
                display: inline-block;
                margin: 0 10px;
                font-size: 50px;
                color: #333;
                transition: 0.3s;
            }

            .custom-form {
                max-width: 100%;
                /* sm:w-[80%] */
            }
            .vsp-text{
                width: 330px;
            }
            .nhatkim-title{
                font-size: 20px !important;
            }
            .vsp-content-box {
                flex: 2;
                width: 100%;
                max-width: 600px;
                padding: 20px;

                /* Làm mờ nền */
                border-radius: 10px;
                transform: translateY(50px);
                /* Bắt đầu ở vị trí thấp hơn */
                opacity: 0;
                /* Ẩn ban đầu */
                animation: slideUp 1s ease-out forwards;
            }

            @keyframes slideUp {
                0% {
                    transform: translateY(500px);
                    opacity: 0;
                }

                100% {
                    transform: translateY(0);
                    opacity: 1;
                }
            }

            .tuvan {
                display: flex;
                flex-direction: column;
            }

            .vsp-image-box img {
                max-width: 100%;
                height: auto;
                border-radius: 10px;
                transform: scale(0);
                /* Bắt đầu với kích thước nhỏ */
                opacity: 0;
                /* Ẩn ban đầu */
                animation: growEffect 1s ease-out forwards;
            }
        }

        @media screen and (min-width: 768px) and (max-width: 1280px) {
            .box-call {
                display: flex;
                justify-content: flex-end;
                /* Đưa nội dung xuống đáy */
                flex-direction: column;
                align-items: flex-end;
                /* Đưa nội dung về bên phải */
                width: 100%;
                padding: 20px;
                height: 40vh;
                /* Đảm bảo chiều cao đủ để căn xuống dưới */


            }

            .social-icons a {
                display: inline-block;
                margin: 0 10px;
                font-size: 50px;
                color: #333;
                transition: 0.3s;
            }

            .custom-form {
                max-width: 50%;
                /* md:w-[50%] */
            }

            .tuvan {
                position: relative;
                display: flex;


                align-items: center;
                justify-content: center;
            }

            .vsp-image-box img {
                max-width: 300px;
                height: 300px;
                border-radius: 10px;
                transform: scale(0);
                /* Bắt đầu với kích thước nhỏ */
                opacity: 0;
                /* Ẩn ban đầu */
                animation: growEffect 1s ease-out forwards;
            }

            .vsp-content-box {
                flex: 2;

                padding: 20px;
                width: 150%;
                /* Làm mờ nền */
                border-radius: 10px;
                transform: translateY(50px);
                /* Bắt đầu ở vị trí thấp hơn */
                opacity: 0;
                /* Ẩn ban đầu */
                animation: slideUp 1s ease-out forwards;
            }

            @keyframes slideUp {
                0% {
                    transform: translateY(500px);
                    opacity: 0;
                }

                100% {
                    transform: translateY(0);
                    opacity: 1;
                }
            }
        }


        @media screen and (min-width: 1280px) {
            .box-call {
                display: flex;
                justify-content: flex-end;
                /* Đưa nội dung xuống đáy */
                flex-direction: column;
                align-items: flex-end;
                /* Đưa nội dung về bên phải */
                width: 100%;
                padding: 20px;
                height: 60vh;
                /* Đảm bảo chiều cao đủ để căn xuống dưới */


            }

            .layout-left {
                display: flex;
                flex-direction: column;
                width: 60%;
            }

            .social-container {
                margin-left: 2em;
                top: 0%;
                font-size: 18px;

            }

            .custom-form {
                width: 60%;
                /* w-full */
            }

            .social-icons {
                margin-top: 10px;
            }

            .social-icons a {
                display: inline-block;
                margin: 0 10px;
                font-size: 50px;
                color: #333;
                transition: 0.3s;
            }

            .social-icons a:hover {
                color: #007bff;
            }

            .vsp-content-box {
                flex: 2;
                max-width: 600px;
                padding: 20px;

                /* Làm mờ nền */
                border-radius: 10px;
                transform: translateY(50px);
                /* Bắt đầu ở vị trí thấp hơn */
                opacity: 0;
                /* Ẩn ban đầu */
                animation: slideUp 1s ease-out forwards;
            }

            @keyframes slideUp {
                0% {
                    transform: translateY(500px);
                    opacity: 0;
                }

                100% {
                    transform: translateY(0);
                    opacity: 1;
                }
            }

            .tuvan {
                position: relative;
                display: flex;


                align-items: center;
                justify-content: center;
            }

            .vsp-image-box img {
                max-width: 100%;
                height: auto;
                border-radius: 10px;
                transform: scale(0);
                /* Bắt đầu với kích thước nhỏ */
                opacity: 0;
                /* Ẩn ban đầu */
                animation: growEffect 1s ease-out forwards;
            }

        }



        .nhatkim-container {
            background: url('https://your-image-url.jpg') no-repeat center center/cover;
            padding: 50px 20px;
            color: white;
            text-align: center;
            max-width: 800px;
            margin: auto;
            border-radius: 10px;
            position: relative;
        }

        .nhatkim-container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;

            z-index: 1;
            border-radius: 10px;
        }

        .nhatkim-content {
            position: relative;
            z-index: 2;
        }

        .nhatkim-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .nhatkim-text {
            font-size: 16px;
            margin-bottom: 20px;
        }

        .nhatkim-list {
            list-style: none;
            padding: 0;
        }

        .nhatkim-list li {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .social-icons a .fa-facebook {
            color: #1877F2;
            /* Màu xanh Facebook */
        }

        .social-icons a .fa-youtube {
            color: #FF0000;
            /* Màu đỏ YouTube */
        }

        .social-icons a .fa-tiktok {
            color: #000000;
            /* Màu đen TikTok */
        }

        .social-icons a:hover {
            transform: scale(1.2);
            /* Hiệu ứng phóng to khi hover */
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        /* Bố cục chính với background image */
        .vsp-container {
            position: relative;
            width: 100vw;

            padding: 60px 13.2%;
            background: url('/public/assets/images/backgroundtuvan.png');
            /* Ảnh nền */
            background-size: cover;
            background-position: center;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;

            margin: auto;
            gap: 20px;
        }

        /* Lớp phủ màu */
        .vsp-container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(4, 91, 106, 0.73);
            /* Màu overlay */
            z-index: 1;
        }

        /* Đảm bảo nội dung nằm trên overlay */
        .vsp-content {
            position: relative;
            z-index: 2;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            max-width: 1200px;
            gap: 20px;
        }

        /* Cột bên trái (Hình ảnh) */
        .vsp-image-box {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }



        @keyframes growEffect {
            0% {
                transform: scale(0);
                opacity: 0;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        /* Cột bên phải (Nội dung) */


        .vsp-title {
            font-size: 14px;
            text-transform: uppercase;
            font-weight: bold;
            color: white;
            display: block;
            margin-bottom: 10px;
        }

        .vsp-heading {
            font-size: 24px;
            font-weight: bold;
            color: white;
            margin-bottom: 15px;
        }

        .vsp-text p {
            font-size: 16px;
            color: white;
            line-height: 1.6;
            margin-bottom: 10px;
        }

        .vsp-text img {
            width: 100%;
            max-width: 400px;
            height: auto;
            display: block;
            margin: auto;
        }

        /* Video Responsive */
        .vsp-text iframe {
            width: 100%;
            max-width: 640px;
            height: 360px;
            display: block;
            margin: auto;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .vsp-content {
                flex-direction: column;
            }

            .vsp-heading {
                font-size: 20px;
            }
        }

        .cardlh {
            position: relative;
            width: 15em;
            height: 15em;
            background: lightgrey;
            border-radius: 30px;
            overflow: hidden;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            transition: all 1s ease-in-out;
        }

        .backgroundlh {
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 100% 107%, #ff89cc 0%, #9cb8ec 30%, #00ffee 60%, #62c2fe 100%);
        }

        .logolh {
            position: absolute;
            right: 50%;
            bottom: 50%;
            transform: translate(50%, 50%);
            transition: all 0.6s ease-in-out;
        }

        .logolh .logolh-svg {
            fill: white;
            width: 30px;
            height: 30px;
        }

        .iconlh {
            display: inline-block;
            width: 20px;
            height: 20px;
        }

        .iconlh .svg {
            fill: rgba(255, 255, 255, 0.797);
            width: 100%;
            transition: all 0.5s ease-in-out;
        }

        .boxlh {
            position: absolute;
            padding: 10px;
            text-align: right;
            background: rgba(255, 255, 255, 0.389);
            border-top: 2px solid rgb(255, 255, 255);
            border-right: 1px solid white;
            border-radius: 10% 13% 42% 0%/10% 12% 75% 0%;
            box-shadow: rgba(100, 100, 111, 0.364) -7px 7px 29px 0px;
            transform-origin: bottom left;
            transition: all 1s ease-in-out;
        }

        .boxlh::before {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: inherit;
            opacity: 0;
            transition: all 0.5s ease-in-out;
        }

        .boxlh:hover .svg {
            fill: white;
        }

        .boxlh1 {
            width: 70%;
            height: 70%;
            bottom: -70%;
            left: -70%;
        }

        .boxlh1::before {
            background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #ff53d4 60%, #62c2fe 90%);
        }

        .boxlh1:hover::before {
            opacity: 1;
        }

        .boxlh1:hover .iconlh .svg {
            filter: drop-shadow(0 0 5px white);
        }

        .boxlh2 {
            width: 50%;
            height: 50%;
            bottom: -50%;
            left: -50%;
            transition-delay: 0.2s;
        }

        .boxlh2::before {
            background: radial-gradient(circle at 30% 107%, #91e9ff 0%, #00ACEE 90%);
        }

        .boxlh2:hover::before {
            opacity: 1;
        }

        .boxlh2:hover .iconlh .svg {
            filter: drop-shadow(0 0 5px white);
        }

        .boxlh3 {
            width: 30%;
            height: 30%;
            bottom: -30%;
            left: -30%;
            transition-delay: 0.4s;
        }

        .boxlh3::before {
            background: radial-gradient(circle at 30% 107%, #969fff 0%, #b349ff 90%);
        }

        .boxlh3:hover::before {
            opacity: 1;
        }

        .boxlh3:hover .iconlh .svg {
            filter: drop-shadow(0 0 5px white);
        }

        .boxlh4 {
            width: 10%;
            height: 10%;
            bottom: -10%;
            left: -10%;
            transition-delay: 0.6s;
        }

        .cardlh:hover {
            transform: scale(1.1);
        }

        .cardlh:hover .boxlh {
            bottom: -1px;
            left: -1px;
        }

        .cardlh:hover .logolh {
            transform: translate(0, 0);
            bottom: 20px;
            right: 20px;
        }
        .cardlh.active {
            transform: scale(1.1);
        }

        .cardlh.active .boxlh {
            bottom: -1px;
            left: -1px;
        }

        .cardlh.active .logolh {
            transform: translate(0, 0);
            bottom: 20px;
            right: 20px;
        }

        .rainbow-text {
            font-size: 24px;
            font-weight: bold;
            background: linear-gradient(to right, red, orange, yellow, green, cyan, blue, violet);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            position: relative;
            margin-bottom: 5%;
        }

        .rainbow-text::before {
            content: attr(data-text);
            position: absolute;
            left: 0;
            top: 0;
            z-index: -1;
            color: rgba(255, 255, 255, 0.3);
        }

        .logolh-svg1 {
            filter: brightness(0) invert(1);
            width: 150px;
            /* Điều chỉnh kích thước nếu cần */
            height: 150px;
        }
    </style>
</head>

<body style="background-color: white;">
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
    <div class="vsp-container">
        <div class="vsp-content">

            <!-- Cột bên trái (Hình ảnh) -->
            <div class="vsp-image-box">
                <img src="https://giaiphapdaotaovnnp.edu.vn/images/6_co_hoi_vang_cho_nhan_vien_le_tan.jpg"
                    alt="VSP Image">
            </div>

            <!-- Cột bên phải (Nội dung) -->
            <div class="vsp-content-box">


                <div class="vsp-text">

                    <div class="nhatkim-container">
                        <div class="nhatkim-content">
                            <h2 class="nhatkim-title">Nhất Kim Window - Chuyên gia cửa nhôm kính</h2>
                            <p class="nhatkim-text">
                                Công ty cổ phần Nhất Kim Window là doanh nghiệp hàng đầu trong lĩnh vực sản xuất, nhập
                                khẩu và phân phối cửa nhôm kính cao cấp.
                                Với hệ thống đại lý trải dài khắp cả nước, chúng tôi mang đến những giải pháp tối ưu,
                                hiện đại và bền bỉ cho mọi công trình.
                            </p>

                        </div>
                    </div>

                    <!-- Video -->
                    <p>
                        <iframe allowfullscreen="" frameborder="0" width="560" height="315"
                            src="https://www.youtube.com/embed/o0Q_Xd0jihk?start=720">
                        </iframe>

                    </p>

                </div>
            </div>
        </div>
    </div>
    <div style=" background: linear-gradient(to bottom, #ff99cc, #ffffff); /* Hồng loang mờ dần xuống trắng */">
        <div class="wrapper">
            <div class="tuvan" style="padding-bottom: 10%; padding-top:5%">
            <form class="custom-form" action="../database/addInquiry.php" method="POST">

                    <div class="absolute w-40 h-40 bg-green-300 rounded-full blur-3xl -top-12 -right-10 -z-10"></div>
                    <div class="absolute w-32 h-32 bg-yellow-300 rounded-full blur-3xl -top-14 -left-6 -z-10"></div>
                    <div class="absolute w-36 h-36 bg-blue-300 rounded-full blur-3xl -bottom-14 -right-8 -z-10"></div>
                    <div class="absolute w-28 h-28 bg-orange-300 rounded-full blur-3xl -bottom-10 -left-12 -z-10"></div>

                    <!-- Nội dung form -->
                    <div>
                        <span class="font-extrabold text-2xl text-green-600">Gửi tin nhắn cho chúng tôi để nhận tư
                            vấn</span>
                        <p class="text-neutral-700">
                            Tin nhắn của bạn sẽ được phản hồi sớm qua Zalo hoặc Nhân viên sẽ liên hệ bạn.
                        </p>
                    </div>

                    <!-- 🟢 Input với màu loang bên trong -->
                    <div class="flex flex-col gap-3 mt-4">
                        <div class="relative">
                            <input type="text"
                                class="bg-gradient-to-r from-green-300 via-yellow-300 to-orange-400 text-neutral-900 placeholder-green-700 text-sm rounded-lg border border-neutral-500 focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                name="name" placeholder="Họ và Tên" />
                        </div>

                        <div class="relative">
                            <input type="text"
                                class="bg-gradient-to-r from-yellow-300 via-orange-400 to-green-300 text-neutral-900 placeholder-green-700 text-sm rounded-lg border border-neutral-500 focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5"
                                name="diachi" placeholder="Địa chỉ" />
                        </div>

                        <div class="relative">
                            <input type="text"
                                class="bg-gradient-to-r from-green-300 via-blue-400 to-yellow-300 text-neutral-900 placeholder-green-700 text-sm rounded-lg border border-neutral-500 focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                name="phone" placeholder="Số điện thoại" />
                        </div>

                        <div class="relative">
                            <textarea
                                class="bg-gradient-to-r from-yellow-300 via-green-400 to-blue-400 text-neutral-900 placeholder-green-700 text-sm rounded-lg border border-neutral-500 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                name="message" placeholder="Nội dung cần tư vấn "></textarea>
                        </div>
                    </div>

                    <!-- Nút bấm -->
                    <div class="flex justify-center mt-10">
                        <button
                            class="bg-green-500 text-neutral-50 px-10 py-2 rounded-lg text-lg hover:bg-yellow-400 w-40">
                            Gửi ❤️
                        </button>
                    </div>



                </form>
                <div class="layout-left">
                    <div class="social-container">
                        <p class="rainbow-text">Quý khách có thể xem thêm về chúng tôi:</p>
                        <div class="social-icons">
                            <a href="https://www.facebook.com/anhduong1109/?ref=embed_page#" target="_blank"><i class="fab fa-facebook"></i></a>
                            <a href="https://www.youtube.com/@CuaDepHaiDuong" target="_blank"><i class="fab fa-youtube"></i></a>
                            <a href="https://www.tiktok.com/@cua_dep_hai_duong" target="_blank"><i class="fab fa-tiktok"></i></a>
                        </div>
                    </div>
                    <div class="box-call">

                        <p class="rainbow-text">Hoặc liên hệ với chúng tôi </p>
                        <div class="cardlh">
                            <div class="backgroundlh">
                            </div>
                            <div class="logolh">
                                <img src="./assets/images/nhat-kim-logo-no-bg.png" class="logolh-svg1"
                                    alt="Logo của tôi">


                            </div>
                            <a href="https://www.facebook.com/anhduong1109/?ref=embed_page#" class="boxlh boxlh1">
                                <span class="iconlh">
                                    <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" class="svg"
                                        fill="#FFFFFF">
                                        <path
                                            d="M256 0C114.625 0 0 106.125 0 237.5C0 312.281 36.312 377.281 92.406 419.188L69.688 502.125C68.219 507.5 73.906 512.125 78.812 509.25L179.75 448.344C204.188 454.031 229.844 475 256 475C397.375 475 512 368.875 512 237.5S397.375 0 256 0Z">
                                        </path>
                                        <path
                                            d="M138.438 270.625L224.625 155.156C233.25 143.562 250.094 141.062 262.5 150.688L312.938 188.25C320.844 194.156 332.406 193.656 339.75 186.438L399.688 126.562C404.281 121.969 411.844 126.656 409.031 132.5L322.281 291.438C313.656 305.219 296.906 308.719 284.562 298.938L235.375 261.344C227.562 255.438 216.062 255.844 208.844 263.062L139.812 332.094C135.188 336.719 127.531 332.031 138.438 270.625Z"
                                            fill="#FFFFFF">
                                        </path>
                                    </svg>
                                </span>
                            </a>


                            <a href="https://zalo.me/0909179579" class="boxlh boxlh2">
                                <span class="iconlh">
                                    <svg viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" class="svg">
                                        <path
                                            d="M2,20.52C2,10.64,10.64,2,20.52,2h6.96c9.88,0,18.52,8.64,18.52,18.52v6.96c0,9.88-8.64,18.52-18.52,18.52h-2.88c-1.64,0-3.2,0.48-4.52,1.36l-6.04,3.92c-1.16,0.76-2.72-0.16-2.72-1.52v-4.2c0-0.68-0.56-1.24-1.24-1.24h-0.08C5.84,39.48,2,30.88,2,20.52z" />
                                        <text x="12" y="30" font-size="10" font-weight="bold" fill="black">Zalo</text>
                                    </svg>
                                </span>
                            </a>

                            <a href="tel:+ 0909 179 579" class="boxlh boxlh3">
                                <span class="iconlh">
                                    <svg viewBox="0 0 384 512" xmlns="http://www.w3.org/2000/svg" class="svg">
                                        <path
                                            d="M320 0H64C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64zM192 472c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zm112-104c0 8.8-7.2 16-16 16H96c-8.8 0-16-7.2-16-16V80c0-8.8 7.2-16 16-16H288c8.8 0 16 7.2 16 16V368z">
                                        </path>
                                    </svg>
                                </span>
                            </a>

                            <div class="boxlh boxlh4"></div>
                        </div>

                    </div>
                </div>
            </div>




        </div>
    </div>
    <div class="wrapper">
    <div class="max-w-8xl overflow-x-hidden p-6 w-full flex flex-col md:flex-row gap-4">
    <!-- Nội dung -->
    <div class="bg-white max-w-3xl sm:max-w-full rounded-lg p-6 mb-8 w-full flex-1">
    <h2 class="text-1xl md:text-2xl font-bold text-green-500 mb-4 md:text-left"  >
                    CỬA NHÔM KÍNH - GIẢI PHÁP HOÀN HẢO CHO KHÔNG GIAN HIỆN ĐẠI
                </h2>

                <p class="text-gray-700 mb-4  md:text-left">
                    Không chỉ dừng lại ở việc lựa chọn mẫu mã, chúng tôi còn giúp bạn tìm ra giải pháp tối ưu về chất
                    liệu, độ dày nhôm,
                    loại kính, phụ kiện đi kèm để đảm bảo sản phẩm bền bỉ, an toàn và tăng tính thẩm mỹ cho không gian.
                </p>

                <p class="text-gray-700 mb-4  md:text-left">
                    Cửa nhôm kính không chỉ mang lại vẻ đẹp hiện đại, sang trọng mà còn có những ưu điểm vượt trội như:
                </p>

                <!-- Danh sách ưu điểm -->
                <ul class="text-gray-700 mb-4 space-y-2">
                    <li class="flex items-start gap-2">
                        <img src="./assets/images/tich.png" alt="Check Icon"
                            class="w-6 h-6 md:w-7 md:h-7 flex-shrink-0 self-start">
                        <span class="flex-1"><strong>Độ bền cao</strong>: Nhôm cao cấp chống oxy hóa, không cong vênh,
                            không mối mọt.</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <img src="./assets/images/tich.png" alt="Check Icon"
                            class="w-6 h-6 md:w-7 md:h-7 flex-shrink-0 self-start">
                        <span class="flex-1"><strong>Cách âm, cách nhiệt tốt</strong>: Kết hợp kính cường lực giúp giảm
                            tiếng ồn, tiết kiệm năng lượng.</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <img src="./assets/images/tich.png" alt="Check Icon"
                            class="w-6 h-6 md:w-7 md:h-7 flex-shrink-0 self-start">
                        <span class="flex-1"><strong>Thiết kế linh hoạt</strong>: Nhiều kiểu dáng như cửa mở quay, mở
                            trượt, xếp gấp phù hợp với mọi không gian.</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <img src="./assets/images/tich.png" alt="Check Icon"
                            class="w-6 h-6 md:w-7 md:h-7 flex-shrink-0 self-start">
                        <span class="flex-1"><strong>Dễ dàng vệ sinh, bảo trì</strong>: Không bị bám bẩn, dễ lau chùi,
                            luôn giữ được vẻ sáng bóng.</span>
                    </li>
                </ul>
    </div>

    <!-- Ảnh Slide (thu nhỏ trên iPad) -->
    <div class="mt-6 md:ml-auto w-full md:max-w-[40%] shrink-0 text-right">
        <?php include '../public/anhslide.php'; ?>
    </div>
</div>




        <!-- Phần thứ hai -->
        <div class="max-w-8xl overflow-x-hidden p-6 w-full flex flex-col md:flex-row md:items-center gap-4">
            <!-- Ảnh full-width trên mobile, 50% trên iPad -->
            <div class="mt-8 w-full md:w-[50%]">
                <img src="./assets/images/cuachantiengon.jpg" alt="Cosmetic Example" class="w-full h-auto">
            </div>

            <!-- Nội dung -->
            <div class="bg-white max-w-3xl sm:max-w-full rounded-lg p-6 mb-8 w-full">
            <h2 class="text-xl md:text-2xl font-bold text-fuchsia-500 mb-4 md:text-left">
                    Cửa nhôm kính cách âm – Khắc tinh của tiếng ồn nơi phố thị.
                </h2>

                <p class="text-gray-700 mb-4  md:text-left">
                    Ô nhiễm tiếng ồn đang trở thành một vấn đề nghiêm trọng tại các đô thị lớn trên thế giới, trong đó
                    có Việt Nam. Sự gia tăng dân số, phương tiện giao thông và hoạt động công nghiệp đã làm cho mức độ
                    tiếng ồn trong thành phố ngày càng vượt ngưỡng cho phép, ảnh hưởng đến sức khỏe và chất lượng sống
                    của con người.
                </p>
                <p class="text-gray-700 mb-4  md:text-left">
                    Cửa nhôm kính chống tiếng ồn có khả năng cách âm vượt trội nhờ sự kết hợp của nhiều yếu tố. Trước
                    hết, kính cường lực hoặc kính hộp với độ dày từ 6mm – 12mm, đặc biệt là kính hộp có lớp khí trơ bên
                    trong, giúp giảm thiểu từ 70 – 90% tiếng ồn từ môi trường bên ngoài, ngăn chặn hiệu quả các tạp âm
                    từ giao thông, công trường xây dựng hay khu vui chơi giải trí. Bên cạnh đó, khung nhôm cao cấp với
                    cấu trúc rỗng giúp hạn chế tối đa sự truyền âm thanh, đồng thời đảm bảo độ kín khít cao, không để
                    tiếng ồn lọt qua các khe cửa. Ngoài ra, cửa còn sử dụng hệ gioăng cao su EPDM giúp bịt kín mọi khe
                    hở, kết hợp với keo chuyên dụng để cố định kính và khung nhôm chắc chắn, tạo nên một hệ thống cách
                    âm hiệu quả, mang lại không gian yên tĩnh và thoải mái cho người sử dụng.
                </p>

                <p class="text-gray-700 mb-4  md:text-left">
                    Trong nhịp sống đô thị ồn ào và náo nhiệt, không gian yên tĩnh trở thành một nhu cầu thiết yếu. Cửa
                    nhôm kính chống tiếng ồn chính là giải pháp tối ưu giúp giảm thiểu âm thanh từ bên ngoài, mang lại
                    sự thoải mái và bình yên cho ngôi nhà, văn phòng hay bất kỳ không gian nào cần sự tĩnh lặng.
                </p>

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

    <?php include '../includes/footer.php'; ?>


</body>
<script>
    document.addEventListener("DOMContentLoaded", function () {
    let cards = document.querySelectorAll(".cardlh");

    let observer = new IntersectionObserver(
        function (entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("active"); // Thêm class khi phần tử xuất hiện
                } 
            });
        },
        { threshold: 0.3 } // Kích hoạt khi ít nhất 30% phần tử xuất hiện
    );

    cards.forEach(card => {
        observer.observe(card);
    });
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