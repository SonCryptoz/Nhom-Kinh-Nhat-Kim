<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Slider with Dynamic Transitions</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .slider-container {
            position: relative;
            width: 450px;
            max-width: 1344px;
            height: 600px;
            margin: auto;
            overflow: hidden;
        }

        /* ✅ Mobile (dưới 768px) */
        @media screen and  (max-width: 768px) {
            .slider-container {
                left: -5em;
            }

            .slider-controls {
                position: absolute;
                left: 8%;
                top: 60%;
                width: 80%;
                transform: translateY(-50%);
                display: flex;
                justify-content: space-between;
                z-index: 10;
            }

            .slider-button {
                background-color: rgba(0, 0, 0, 0.5);
                color: white;
                border: none;
                padding: 10px;
                cursor: pointer;
                border-radius: 50%;
            }

            .slider-button:hover {
                background-color: rgba(0, 0, 0, 0.8);
            }


        }

        /* ✅ iPad (Tablet: 768px - 1024px) */
        @media screen and (min-width: 768px) and (max-width: 1024px) {
            .slider-controls {
                position: absolute;
                top: 50%;
                width: 100%;
                transform: translateY(-50%);
                display: flex;
                justify-content: space-between;
                z-index: 10;
            }

            .slider-button {
                background-color: rgba(0, 0, 0, 0.5);
                color: white;
                border: none;
                padding: 10px;
                cursor: pointer;
                border-radius: 50%;
            }

            .slider-button:hover {
                background-color: rgba(0, 0, 0, 0.8);
            }
        }

        /* ✅ Laptop (1024px - 1366px) */
        @media screen and (min-width: 1024px) and (max-width: 1366px) {
            .slider-controls {
                position: absolute;
                top: 50%;
                width: 100%;
                transform: translateY(-50%);
                display: flex;
                justify-content: space-between;
                z-index: 10;
            }

            .slider-button {
                background-color: rgba(0, 0, 0, 0.5);
                color: white;
                border: none;
                padding: 10px;
                cursor: pointer;
                border-radius: 50%;
            }

            .slider-button:hover {
                background-color: rgba(0, 0, 0, 0.8);
            }
        }

        /* ✅ Màn hình lớn hơn (PC) */
        @media (min-width: 1366px) {
            .slider-controls {
                position: absolute;
                top: 50%;
                width: 100%;
                transform: translateY(-50%);
                display: flex;
                justify-content: space-between;
                z-index: 10;
            }

            .slider-button {
                background-color: rgba(0, 0, 0, 0.5);
                color: white;
                border: none;
                padding: 10px;
                cursor: pointer;
                border-radius: 50%;
            }

            .slider-button:hover {
                background-color: rgba(0, 0, 0, 0.8);
            }
        }


        .slider-wrapper {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .slider-item {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            opacity: 0;
            z-index: 1;
            transition: opacity 1s ease;
        }

        .slider-item.active {
            opacity: 1;
            z-index: 2;
        }

        .slice-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
        }

        .slice {
            flex: 1;
            height: 100%;
            background-size: cover;
            background-position: center;
            transition: transform 1.5s ease;
        }

        .fade .slice {
            transform: translateY(-5%);
        }

        .fade .slice.active {
            transform: translateY(20%);
        }

        .slide-left .slice {
            transform: translateX(10%);
        }

        .slide-left .slice.active {
            transform: translateX(-70%);
        }

        .slide-right .slice {
            transform: translateX(0%);
        }

        .slide-right .slice.active {
            transform: translateX(100%);
        }

        .slide-up .slice {
            transform: translateY(5%);
        }

        .slide-up .slice.active {
            transform: translateY(-10%);
        }
    </style>
</head>

<body>
    <div class="slider-container">
        <div id="slider" class="slider-wrapper">
            <div class="slider-item slide-left"
                data-image="https://phuongtrangwindow.com/wp-content/uploads/2024/05/CU%CC%9B%CC%89A-SO%CC%82%CC%89-NHO%CC%82M-XINGFA-3-CA%CC%81NH-MO%CC%9B%CC%89-LU%CC%80A-.jpg">
            </div>
            <div class="slider-item fade"
                data-image="https://phuongtrangwindow.com/wp-content/uploads/2024/05/CU%CC%9B%CC%89A-SO%CC%82%CC%89-MO%CC%9B%CC%89-QUAY-768x1024.jpg">
            </div>
            <div class="slider-item slide-right"
                data-image="https://phuongtrangwindow.com/wp-content/uploads/2024/05/Cu%CC%9B%CC%89a-di-nho%CC%82m-xingfa-1-ca%CC%81nh-mo%CC%9B%CC%89-quay-768x1024.jpg">
            </div>

            <div class="slider-item slide-up"
                data-image="https://phuongtrangwindow.com/wp-content/uploads/2020/03/MAU-NAU-CLASS-A.jpg">
            </div>



            <div class="slider-controls">
                <button class="slider-button" id="prevButton">&#10094;</button>
                <button class="slider-button" id="nextButton">&#10095;</button>
            </div>
        </div>
    </div>

    <script>
        const slider = document.getElementById('slider');
        const slides = Array.from(slider.querySelectorAll('.slider-item'));
        const totalSlides = slides.length;
        let currentIndex = 0;
        let prevIndex = totalSlides - 1;

        slides.forEach(slide => {
            const imageUrl = slide.dataset.image;
            const sliceContainer = document.createElement('div');
            sliceContainer.classList.add('slice-container');

            for (let i = 0; i < 5; i++) {
                const slice = document.createElement('div');
                slice.classList.add('slice');
                slice.style.backgroundImage = `url('${imageUrl}')`;
                slice.style.backgroundPosition = `${(i * 100) / 4}% 0`;
                sliceContainer.appendChild(slice);
            }
            slide.appendChild(sliceContainer);
        });

        function showSlide(index) {
            const currentSlide = slides[index];
            const slices = currentSlide.querySelectorAll('.slice');

            slides[prevIndex].classList.remove('active');
            currentSlide.classList.add('active');

            slices.forEach((slice, i) => {
                setTimeout(() => {
                    slice.classList.add('active');
                }, i * 200);
            });

            setTimeout(() => {
                slices.forEach(slice => slice.classList.remove('active'));
            }, 2500);

            prevIndex = index;
        }

        function nextSlide() {
            slides[currentIndex].classList.remove('active');
            currentIndex = (currentIndex + 1) % totalSlides;
            showSlide(currentIndex);
        }

        function prevSlide() {
            slides[currentIndex].classList.remove('active');
            currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
            showSlide(currentIndex);
        }

        document.getElementById('nextButton').addEventListener('click', nextSlide);
        document.getElementById('prevButton').addEventListener('click', prevSlide);

        setInterval(nextSlide, 10000);
        slides[currentIndex].classList.add('active');
        showSlide(currentIndex);
    </script>
</body>

</html>