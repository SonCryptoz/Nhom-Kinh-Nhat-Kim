<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>


    <title>Moving Two Images</title>
    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            width: 100vw;
            overflow-x: hidden;
            /* Để tránh cuộn ngang nếu cần */
        }

        @media screen and (max-width: 760px) {
            .laptop {
                display: none;

            }

            .mobiet {

                background: white;
                display: flex;
                flex-wrap: wrap;
                /* Cho phép các phần tử tiếp nối xuống hàng mới khi cần */
                justify-content: space-around;
                /* Căn giữa các phần tử theo chiều ngang */
                align-items: center;
                /* Căn giữa các phần tử theo chiều dọc */
                width: 100%;
                /* Chiều rộng của container */
            }

            .moving-image {
                margin-top: 2em;
                position: absolute;
                width: 60em;
                height: 60em;
                background-size: cover;
                background-position: center;
                flex: 0 0 auto;
                /* Giữ kích thước cố định */
            }

            #image9 {
                top: 8em;
                left: 5em;
                width: 15em;
                /* Chiều rộng của ảnh */
                height: 15em;
                /* Chiều cao của ảnh */
                background-image: url('./assets/images/anhnapcuakinh.jpg');
                background-size: cover;
                /* Đảm bảo ảnh lấp đầy phần tử */
                background-position: center;
                /* Căn giữa ảnh trong phần tử */
                opacity: 0;
                /* Ban đầu ảnh mờ hoàn toàn */
                animation: fadeIn 1s linear forwards;
                /* Thêm animation mờ dần */
                animation-delay: 0.3s;
                /* Thời gian trì hoãn trước khi hoạt ảnh bắt đầu */
                z-index: 3;
            }

            @keyframes fadeIn {
                0% {
                    opacity: 0;
                    /* Mờ hoàn toàn */
                }

                100% {
                    opacity: 1;
                    /* Hiện lên hoàn toàn */
                }
            }

            #image5 {
                top: -3em;
                left: -2em;
                width: 25em;
                /* Chiều rộng của ảnh */
                height: 15em;
                /* Chiều cao của ảnh */
                background-image: url('./assets/images/daynha.jpg');
                background-size: cover;
                /* Đảm bảo ảnh lấp đầy phần tử */
                background-position: center;
                /* Căn giữa ảnh trong phần tử */
                opacity: 0;
                /* Ban đầu ảnh mờ hoàn toàn */
                animation: fadeIn 1s linear forwards;
                /* Thêm animation mờ dần */
                animation-delay: 0.3s;
                /* Thời gian trì hoãn trước khi hoạt ảnh bắt đầu */
                z-index: 0;
            }

            @keyframes fadeIn {
                0% {
                    opacity: 0;
                    /* Mờ hoàn toàn */
                }

                100% {
                    opacity: 1;
                    /* Hiện lên hoàn toàn */
                }
            }


            #image2 {
                position: absolute;
                /* Đảm bảo ảnh có thể di chuyển được */
                width: 7em;
                /* Chiều rộng của ảnh */
                height: 7em;
                /* Chiều cao của ảnh */
                transform: translateX(-50%);
                background-image: url('./assets/images/hopdungdungcu.jpg');
                animation: moveImage2 1.5s linear forwards;
                animation-delay: 2.3s;
                /* Thời gian xuất hiện */
                opacity: 0;
                /* Ảnh bắt đầu ở trạng thái mờ */
                animation: moveImage2 1.5s linear forwards, fadeIn 1.5s linear forwards;
                animation-delay: 0.5s;
                /* Thời gian trì hoãn */
                z-index: 1;
            }

            @keyframes moveImage2 {
                0% {
                    top: 30em;
                    left: 2em;
                }

                100% {
                    top: 22em;
                    left: 2em;
                }
            }

            #image4 {
                position: absolute;
                /* Đảm bảo ảnh có thể di chuyển được */
                width: 8em;
                /* Chiều rộng của ảnh */
                height: 7em;
                /* Chiều cao của ảnh */
                transform: translateX(-50%);
                background-image: url('./assets/images/xetaichokinh.jpg');
                animation: moveImage2 1.5s linear forwards;
                animation-delay: 2.3s;
                /* Thời gian xuất hiện */
                opacity: 0;
                /* Ảnh bắt đầu ở trạng thái mờ */
                animation: moveImage4 1.5s linear forwards, fadeIn 1.5s linear forwards;
                animation-delay: 0.5s;
                /* Thời gian trì hoãn */
                z-index: 1;
            }

            @keyframes moveImage4 {
                0% {
                    top: 6em;
                    left: 0em;
                }

                100% {
                    top: 6em;
                    left: 4em;
                }
            }

            #image1 {
                width: 4em;
                /* Chiều rộng của ảnh */
                height: 5em;
                /* Chiều cao của ảnh */
                transform: translateY(-50%);
                background-image: url('./assets/images/2.png');
                animation: moveImage1 0.8s linear forwards, fadeIn 0.8s linear forwards;
                animation-delay: 1.0s;
                /* Thời gian xuất hiện */
                opacity: 0;
                /* Ban đầu ảnh mờ hoàn toàn */
            }

            @keyframes fadeIn {
                0% {
                    opacity: 0;
                    /* Mờ hoàn toàn */
                }

                100% {
                    opacity: 1;
                    /* Hiện lên hoàn toàn */
                }
            }

            @keyframes moveImage1 {
                0% {
                    top: 20em;
                    left: 18.5em;
                }

                100% {
                    top: 28em;
                    left: 18.5em;
                }
            }

            #image3 {
                width: 4em;
                /* Chiều rộng của ảnh */
                height: 5em;
                /* Chiều cao của ảnh */
                transform: translateY(-50%);
                background-image: url('./assets/images/2.png');
                animation: moveImage3 0.8s linear forwards, fadeIn 0.8s linear forwards;
                animation-delay: 1.8s;
                /* Thời gian xuất hiện */
                opacity: 0;
                /* Ban đầu ảnh mờ hoàn toàn */
            }

            @keyframes fadeIn {
                0% {
                    opacity: 0;
                    /* Mờ hoàn toàn */
                }

                100% {
                    opacity: 1;
                    /* Hiện lên hoàn toàn */
                }
            }

            @keyframes moveImage3 {
                0% {
                    top: 20em;
                    left: 18.5em;
                }

                100% {
                    top: 27.5em;
                    left: 18.5em;
                }
            }

            #image6 {
                width: 4em;
                /* Chiều rộng của ảnh */
                height: 5em;
                /* Chiều cao của ảnh */
                transform: translateY(-50%);
                background-image: url('./assets/images/2.png');
                animation: moveImage6 0.8s linear forwards, fadeIn 0.8s linear forwards;
                animation-delay: 2.2s;
                /* Thời gian xuất hiện */
                opacity: 0;
                /* Ban đầu ảnh mờ hoàn toàn */
            }

            @keyframes fadeIn {
                0% {
                    opacity: 0;
                    /* Mờ hoàn toàn */
                }

                100% {
                    opacity: 1;
                    /* Hiện lên hoàn toàn */
                }
            }

            @keyframes moveImage6 {
                0% {
                    top: 20em;
                    left: 18.5em;
                }

                100% {
                    top: 27em;
                    left: 18.5em;
                }
            }

        }



        @media all and (min-width: 760px) {
            .mobiet {
                display: none;

            }

            .laptop {
                width: 60%;
                height: 45em;

            }

            .moving-image {
                position: absolute;
                width: 60em;
                height: 60em;
                background-size: cover;
                background-position: center;
                flex: 0 0 auto;
                
                /* Giữ kích thước cố định */
            }

            #image9 {
                top: 20em;
                left: 8em;
                width: 17em;
                /* Chiều rộng của ảnh */
                height: 17em;
                /* Chiều cao của ảnh */
                background-image: url('./assets/images/anhnapcuakinh.jpg');
                background-size: cover;
                /* Đảm bảo ảnh lấp đầy phần tử */
                background-position: center;
                /* Căn giữa ảnh trong phần tử */
                opacity: 0;
                /* Ban đầu ảnh mờ hoàn toàn */
                animation: fadeIn 1s linear forwards;
                /* Thêm animation mờ dần */
                animation-delay: 0.3s;
                /* Thời gian trì hoãn trước khi hoạt ảnh bắt đầu */
                z-index: 3;
            }

            @keyframes fadeIn {
                0% {
                    opacity: 0;
                    /* Mờ hoàn toàn */
                }

                100% {
                    opacity: 1;
                    /* Hiện lên hoàn toàn */
                }
            }

            #image5 {
                top: -3em;
                left: -2em;
                width: 35em;
                /* Chiều rộng của ảnh */
                height: 25em;
                /* Chiều cao của ảnh */
                background-image: url('./assets/images/daynha.jpg');
                background-size: cover;
                /* Đảm bảo ảnh lấp đầy phần tử */
                background-position: center;
                /* Căn giữa ảnh trong phần tử */
                opacity: 0;
                /* Ban đầu ảnh mờ hoàn toàn */
                animation: fadeIn 1s linear forwards;
                /* Thêm animation mờ dần */
                animation-delay: 0.3s;
                /* Thời gian trì hoãn trước khi hoạt ảnh bắt đầu */
                z-index: 0;
            }

            @keyframes fadeIn {
                0% {
                    opacity: 0;
                    /* Mờ hoàn toàn */
                }

                100% {
                    opacity: 1;
                    /* Hiện lên hoàn toàn */
                }
            }


            #image2 {
                position: absolute;
                /* Đảm bảo ảnh có thể di chuyển được */
                width: 6em;
                /* Chiều rộng của ảnh */
                height: 6em;
                /* Chiều cao của ảnh */
                transform: translateX(-50%);
                background-image: url('./assets/images/hopdungdungcu.jpg');
                animation: moveImage2 1.5s linear forwards;
                animation-delay: 2.3s;
                /* Thời gian xuất hiện */
                opacity: 0;
                /* Ảnh bắt đầu ở trạng thái mờ */
                animation: moveImage2 1.5s linear forwards, fadeIn 1.5s linear forwards;
                animation-delay: 0.5s;
                /* Thời gian trì hoãn */
                z-index: 1;
            }

            @keyframes moveImage2 {
                0% {
                    top: 40em;
                    left: 2em;
                }

                100% {
                    top: 35em;
                    left: 2em;
                }
            }

            #image4 {
                position: absolute;
                /* Đảm bảo ảnh có thể di chuyển được */
                width: 12em;
                /* Chiều rộng của ảnh */
                height: 10em;
                /* Chiều cao của ảnh */
                transform: translateX(-50%);
                background-image: url('./assets/images/xetaichokinh.jpg');
                animation: moveImage2 1.5s linear forwards;
                animation-delay: 2.3s;
                /* Thời gian xuất hiện */
                opacity: 0;
                /* Ảnh bắt đầu ở trạng thái mờ */
                animation: moveImage4 1.5s linear forwards, fadeIn 1.5s linear forwards;
                animation-delay: 0.5s;
                /* Thời gian trì hoãn */
                z-index: 1;
            }

            @keyframes moveImage4 {
                0% {
                    top: 12em;
                    left: 0em;
                }

                100% {
                    top: 12em;
                    left: 4em;
                }
            }

            #image1 {
                width: 5em;
                /* Chiều rộng của ảnh */
                height: 7em;
                /* Chiều cao của ảnh */
                transform: translateY(-50%);
                background-image: url('./assets/images/2.png');
                animation: moveImage1 0.8s linear forwards, fadeIn 0.8s linear forwards;
                animation-delay: 1.0s;
                /* Thời gian xuất hiện */
                opacity: 0;
                /* Ban đầu ảnh mờ hoàn toàn */
            }

            @keyframes fadeIn {
                0% {
                    opacity: 0;
                    /* Mờ hoàn toàn */
                }

                100% {
                    opacity: 1;
                    /* Hiện lên hoàn toàn */
                }
            }

            @keyframes moveImage1 {
                0% {
                    top: 37em;
                    left: 25.5em;
                }

                100% {
                    top: 43em;
                    left: 25.5em;
                }
            }

            #image3 {
                width: 5em;
                /* Chiều rộng của ảnh */
                height: 7em;
                /* Chiều cao của ảnh */
                transform: translateY(-50%);
                background-image: url('./assets/images/2.png');
                animation: moveImage3 0.8s linear forwards, fadeIn 0.8s linear forwards;
                animation-delay: 1.8s;
                /* Thời gian xuất hiện */
                opacity: 0;
                /* Ban đầu ảnh mờ hoàn toàn */
            }

            @keyframes fadeIn {
                0% {
                    opacity: 0;
                    /* Mờ hoàn toàn */
                }

                100% {
                    opacity: 1;
                    /* Hiện lên hoàn toàn */
                }
            }

            @keyframes moveImage3 {
                0% {
                    top: 37em;
                    left: 25.5em;
                }

                100% {
                    top: 42.5em;
                    left: 25.5em;
                }
            }

            #image6 {
                width: 5em;
                /* Chiều rộng của ảnh */
                height: 7em;
                /* Chiều cao của ảnh */
                transform: translateY(-50%);
                background-image: url('./assets/images/2.png');
                animation: moveImage6 0.8s linear forwards, fadeIn 0.8s linear forwards;
                animation-delay: 2.2s;
                /* Thời gian xuất hiện */
                opacity: 0;
                /* Ban đầu ảnh mờ hoàn toàn */
            }

            @keyframes fadeIn {
                0% {
                    opacity: 0;
                    /* Mờ hoàn toàn */
                }

                100% {
                    opacity: 1;
                    /* Hiện lên hoàn toàn */
                }
            }

            @keyframes moveImage6 {
                0% {
                    top: 37em;
                    left: 25.5em;
                }

                100% {
                    top: 42em;
                    left: 25.5em;
                }
            }
            #image16 {
                top: 0%;
                left: 60%;
                width: 1500px; /* Chiều rộng của ảnh */
                height:1200px; /* Chiều cao của ảnh */
                background-image: url('./assets/images/9.png');
                background-size: cover; /* Đảm bảo ảnh lấp đầy phần tử */
                background-position: center; /* Căn giữa ảnh trong phần tử */
                 animation: fadeIn2 2s linear forwards; /* Thêm animation mờ dần */
                animation-delay: 0.3s; /* Thời gian trì hoãn trước khi hoạt ảnh bắt đầu */
                z-index: -2;
            }


            @keyframes fadeIn2 {
                0% {
                    opacity: 0; /* Mờ hoàn toàn */
                }
                100% {
                    opacity: 0.6; /* Hiện lên hoàn toàn */
                }
            }

        }
    </style>
</head>
<script>
    window.addEventListener('resize', () => {
        const container = document.querySelector('.mobiet');
        const images = document.querySelectorAll('.moving-image');
        const containerWidth = container.clientWidth;

        images.forEach(image => {
            // Điều chỉnh lại kích thước và vị trí của các phần tử nếu cần
            image.style.transform = `translateX(${containerWidth / 2}px)`;
        });
    });



</script>

<body>
    <div class="mobiet">

        <div style="height: 30em; background: white;">
            <div class="moving-images">
                <div id="image5" class="moving-image"></div>
                <div id="image9" class="moving-image"></div>
                <div id="image2" class="moving-image"></div>
                <div id="image1" class="moving-image"></div>
                <div id="image3" class="moving-image"></div>
                <div id="image4" class="moving-image"></div>
                <div id="image6" class="moving-image"></div>
            </div>
        </div>


    </div>
    <div class="laptop">
        <div class="moving-images">
        <div id="image16" class="moving-image"></div>
            <div id="image5" class="moving-image"></div>
            <div id="image9" class="moving-image"></div>
            <div id="image2" class="moving-image"></div>
            <div id="image1" class="moving-image"></div>
            <div id="image3" class="moving-image"></div>
            <div id="image4" class="moving-image"></div>
            <div id="image6" class="moving-image"></div>
        </div>
    </div>

</body>

</html>