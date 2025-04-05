<?php
// Lấy dữ liệu từ CSDL
session_start();
include '../includes/database.php';
$sql = "SELECT * FROM products ";
$result = $conn->query($sql);

// Hiển thị nội dung

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/images/nhat-kim-logo-no-slogan12.png" sizes="32x32" type="image/png">
    <title>Danh mục sản phẩm</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/framer-motion/10.0.1/framer-motion.umd.min.js"></script>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/news.css">
    <link rel="stylesheet" href="./public/assets/css/responsive.css">
    <style>
        @media screen and (max-width: 768px) {

            .wrapperproducts {
                display: none;
            }
        }

        @media screen and (min-width: 768px) {
            .testimonial-section {
                display: none;
            }

            .wrapperproducts {
                width: 100%;
                height: 750px;
                position: relative;
                text-align: center;
                display: flex;
                align-items: center;
                justify-content: center;
                overflow: hidden;
                background: white;
            }
        }

        html {
            overflow-x: hidden;
            width: 100vw;
        }

        body {

            font-family: 'Inter', sans-serif;
            max-width: 100vw;
            /* Giới hạn chiều rộng tối đa */
            overflow-x: hidden;
            /* Ẩn cuộn ngang */

        }

        .header-divider {
            background-color: var(--primary-color);
            border: none;
            /* Loại bỏ viền mặc định */
            border-top: 2px solid var(--primary-color);
            /* Tạo đường kẻ với độ dày 2px và màu #ccc */
            margin: 20px 0;
            /* Khoảng cách trên dưới */
            width: 100%;
            height: 2px;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }



        .inner {
            --w: 200px;
            --h: 250px;
            --translateZ: calc((var(--w) + var(--h)) + 0px);
            --rotateX: -15deg;
            --perspective: 1000px;
            position: absolute;
            width: var(--w);
            height: var(--h);
            top: 25%;
            left: calc(50% - (var(--w) / 2) - 2.5px);
            z-index: 2;
            transform-style: preserve-3d;
            transform: perspective(var(--perspective));
            animation: rotating 20s linear infinite;
            /* */
        }

        @keyframes rotating {
            from {
                transform: perspective(var(--perspective)) rotateX(var(--rotateX)) rotateY(0);
            }

            to {
                transform: perspective(var(--perspective)) rotateX(var(--rotateX)) rotateY(1turn);
            }
        }

        .card {
            position: absolute;
            border: 3px solid rgb(var(--color-card));
            /* Chỉ áp dụng màu vào viền */
            background-color: transparent !important;
            /* Giữ nền trong suốt */
            border-radius: 12px;
            overflow: hidden;
            inset: 0;
            transform: rotateY(calc((360deg / var(--quantity)) * var(--index))) translateZ(var(--translateZ));
        }


        .img-card {
            width: 100%;
            min-height: 244px;
            object-fit: cover;
            background: #0000 radial-gradient(circle,
                    rgba(var(--color-card), 0.2) 0%,
                    rgba(var(--color-card), 0.6) 80%,
                    rgba(var(--color-card), 0.9) 100%);
        }

        .product-card {
            position: relative;
            border-radius: 20px;
            /* Bo góc viền */
            overflow: hidden;
        }

        /* Viền động */
        .product-card::before {
            content: '';
            position: absolute;
            top: -5px;
            left: -5px;
            right: -5px;
            bottom: -5px;
            background: linear-gradient(180deg, rgb(0, 183, 255), rgb(255, 48, 255));
            z-index: -1;
            animation: rotate-border 3s linear infinite;
            border-radius: 20px;
        }

        /* Tạo lớp nền che bớt phần bên trong để chỉ còn viền */
        .product-card::after {
            content: '';
            position: absolute;
            top: 5px;
            left: 5px;
            right: 5px;
            bottom: 5px;
            background: white;
            /* Giữ nguyên màu nền gốc của card */
            z-index: 0;
            border-radius: 18px;
        }

        /* Hiệu ứng chạy viền */
        @keyframes rotate-border {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .product-box {
            width: 330px;
            height: 470px;
            background: white;
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            overflow: hidden;
            border-radius: 20px;
            text-align: center;
            padding: 10px;
            z-index: 1;
            /* Đảm bảo nội dung nằm trên hiệu ứng */
        }

        /* Ảnh sản phẩm */
        .product-image {
            width: 100%;

            height: 250px;
            object-fit: cover;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            position: relative;
            z-index: 2;
            /* Ảnh luôn nằm trên */
        }

        /* Nội dung sản phẩm */
        .product-content {
            padding: 10px;
            position: relative;
            z-index: 2;
            /* Nội dung nằm trên viền động */
        }

        .product-content h2 {
            color: white;
            font-size: 1.2em;
            margin: 10px 0;
        }

        .product-content p {
            color: #bbb;
            font-size: 0.9em;
        }

        /* Viền động (chìm xuống dưới) */
        .product-box::before {
            content: '';
            position: absolute;
            width: 100px;
            height: 175%;
            background-image: linear-gradient(180deg, rgb(60, 245, 53), rgb(253, 250, 71));
            animation: rotBGimg 3s linear infinite;
            transition: all 0.2s linear;
            z-index: -1;
            top: -30%;
            /* Đẩy lên trên */
            left: 23%;
        }

        @keyframes rotBGimg {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        /* Lớp che bên trong để giữ nền nguyên vẹn */
        .product-box::after {
            content: '';
            position: absolute;
            background: white;
            inset: 5px;
            border-radius: 15px;
            z-index: -1;
            /* Chìm xuống dưới */
        }

        .product-container {
            display: grid;
            place-items: center;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px;
            max-width: 1200px;
            margin: auto;
        }

        .product-box:hover {
            transform: scale(1.05);
        }

        .testimonial-item {
            position: relative;
            padding: 0;
        }

        .testimonial-item img {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .testimonial-item p {
            text-align: center;
            position: absolute;
            width: 100%;
            top: 405px;
            left: 0;
            padding: 10px;
            font-size: 18px;
            font-weight: 400;
            color: var(--white-color);
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(1px);
        }
    </style>
</head>

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
<hr class="header-divider">
<!-- Phần Slider -->
<?php
// Truy vấn cho slider
$sql_slider = "SELECT * FROM products ORDER BY product_id DESC";
$result_slider = $conn->query($sql_slider);
?>
<div class="wrapper">
    <section class="testimonial-section">
        <div class="testimonial-slider swiper">
            <div class="swiper-wrapper">
                <?php
                if ($result_slider && $result_slider->num_rows > 0) {
                    while ($row = $result_slider->fetch_assoc()) {
                        // Sử dụng các trường phù hợp cho slider (ví dụ: 'name' và 'image')
                        $productName = htmlspecialchars($row['product_name']);
                        $productImage = htmlspecialchars($row['image_url']);
                        // Ví dụ: "anhnhatkim4.png"
                        echo '<div class="swiper-slide testimonial-item">';
                        echo '<a href="product-details.php?id=' . $row['product_id'] . '" class="product-link">';
                        echo '    <img src="' . $productImage . '" alt="' . $productName . '" style="height: 450px;">';
                        echo '</a>';
                        echo '    <p>' . $productName . '</p>';
                        echo '</div>';
                         
                    }
                } else {
                    echo 'Không có sản phẩm nào.';
                }
                ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>
</div>
<div class="wrapperproducts">

    <div class="inner" style="--quantity: 10;">
        <div class="card" style="--index: 0; --color-card: 142, 249, 252;">
            <div class="img-card">
                <img src="./assets/images/anhnhatkim4.png" alt="Product" style="height: 244px;" />
            </div>
        </div>

        <div class="card" style="--index: 1; --color-card: 142, 252, 204;">
            <div class="img-card">
                <img src="./assets/images/anhnhatkim5.png" alt="Product" style="height: 244px;" />
            </div>
        </div>

        <div class="card" style="--index: 2; --color-card: 142, 252, 157;">
            <div class="img-card">
                <img src="./assets/images/anhnhatkim6.png" alt="Product" style="height: 244px;" />
            </div>
        </div>

        <div class="card" style="--index: 3; --color-card: 215, 252, 142;">
            <div class="img-card">
                <img src="./assets/images/anhnhatkim7.png" alt="Product" style="height: 244px;" />
            </div>
        </div>

        <div class="card" style="--index: 4; --color-card: 252, 252, 142;">
            <div class="img-card">
                <img src="./assets/images/anhnhatkim8.png" alt="Product" style="height: 244px;" />
            </div>
        </div>

        <div class="card" style="--index: 5; --color-card: 252, 208, 142;">
            <div class="img-card">
                <img src="./assets/images/anhnhatkim9.png" alt="Product" style="height: 244px;" />
            </div>
        </div>

        <div class="card" style="--index: 6; --color-card: 252, 142, 142;">
            <div class="img-card">
                <img src="./assets/images/anhnhatkim10.png" alt="Product" style="height: 244px;" />
            </div>
        </div>

        <div class="card" style="--index: 7; --color-card: 252, 142, 239;">
            <div class="img-card">
                <img src="./assets/images/anhnhatkim11.png" alt="Product" style="height: 244px;" />
            </div>
        </div>

        <div class="card" style="--index: 8; --color-card: 204, 142, 252;">
            <div class="img-card">
                <img src="./assets/images/anhnhatkim12.png" alt="Product" style="height: 244px;" />
            </div>
        </div>

        <div class="card" style="--index: 9; --color-card: 142, 202, 252;">
            <div class="img-card">
                <img src="./assets/images/anhnhatkim13.png" alt="Product" style="height: 244px;" />
            </div>
        </div>

    </div>
</div>
<div style="background-color: rgb(234, 245, 228);">
    <div class="max-w-6xl mx-auto bg-[#e0eafc] min-h-[200px]" style="background-color: rgb(234, 245, 228) !important;">
        <header1 class="text-center mb-12">
            <h1 class="text-4xl font-extrabold text-gray-800" style="color: rgb(46, 122, 5);">Danh mục sản phẩm cửa kính
            </h1>
            <p class="text-lg text-gray-600">Khám phá các sản phẩm cửa kính chất lượng cao của chúng tôi.</p>
        </header1>

        <!-- Phần tìm kiếm và chọn lọc (bạn có thể tùy chỉnh lại) -->
        <div class="flex items-center gap-4 mb-8">
            <input type="text" placeholder="Tìm kiếm sản phẩm..."
                class="flex-grow p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400" />
            <button type="submit"
                class="p-3 bg-green-500 text-white rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                <i class="fas fa-search"></i>
            </button>
        </div>


        <!-- Các nút lọc sản phẩm -->
        <div class="filter-buttons text-center mb-8">
            <button id="btnCuaNhom" class="filter-btn px-4 py-2 bg-green-500 text-white rounded">Cửa nhôm</button>
            <button id="btnCuaKinh" class="filter-btn px-4 py-2 bg-blue-500 text-white rounded">Phụ kiện</button>
            <button id="btnTayCamCua" style="background-color: #f97316;"
                class="filter-btn px-4 py-2 text-white rounded">Khoá cửa vân tay thông minh</button>

            <button id="btnAll" class="filter-btn px-4 py-2 bg-gray-500 text-white rounded">Tất cả</button>
        </div>

        <!-- Danh sách sản phẩm -->
        <div class="product-container grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Giả sử trường 'product_category' chứa giá trị: "cua-nhom", "cua-kinh", "tay-cam-cua"
                    $category = strtolower($row['category_id']);
                    ?>
                    <a href="product-details.php?id=<?php echo $row['product_id']; ?>" class="product-link"
                        data-category="<?php echo $category; ?>">
                        <div class="product-box p-4 bg-white shadow rounded">
                            <img src="<?php echo $row['image_url']; ?>" alt="Tên sản phẩm"
                                class="product-image w-full h-48 object-cover mb-4">
                            <div class="w-full">
                                <h2 class="text-2xl font-bold text-gray-800 break-words whitespace-normal max-w-sm">
                                    <?php echo $row['product_name']; ?>
                                </h2>
                                <p class="text-gray-600 overflow-hidden text-ellipsis mb-3 h-24  line-clamp-3">
                                    <?php echo $row['description']; ?>
                                </p>
                                <div class="mt-auto flex justify-between items-center">
                                    <span class="text-xl font-semibold text-green-600">Liên hệ</span>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php }
            } else {
                echo "<p>Không có sản phẩm nào.</p>";
            }
            // Đóng kết nối
           
            ?>
        </div>

        <!-- Phân trang (nếu cần) -->
        <div class="pagination mt-8 flex justify-center items-center gap-2">
            <button class="prev-btn px-2 py-1 bg-gray-300 rounded">«</button>
            <div class="page-numbers flex gap-2">
                <!-- Các nút trang sẽ được tạo tự động -->
            </div>
            <button class="next-btn px-2 py-1 bg-gray-300 rounded">»</button>
        </div>
    </div>
</div>

<!-- Script lọc sản phẩm theo category -->


<div class="wrapper">
    <div class="home-partner">
        <h1>ĐỐI TÁC CỦA CHÚNG TÔI</h1>
        <h2>Với những bước tiến mạnh mẽ từng ngày, chúng tôi đã có rất nhiều đối tác trong và ngoài nước.</h2>
        <div class="home-partner-item">
            <img src="./assets/images/Owin.jpg" alt="Image">
            <img src="./assets/images/logocmech.jpg" alt="Image">
            <img src="./assets/images/logokinhhong.jpg" alt="Image">
            <img src="./assets/images/logomaxpro.jpg" alt="Image">
        </div>
    </div>
</div>




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
        const filterButtons = document.querySelectorAll(".filter-btn");
        const productLinks = document.querySelectorAll(".product-link");

        filterButtons.forEach(button => {
            button.addEventListener("click", function () {
                const btnId = this.id; // Ví dụ: "btnCuaNhom", "btnCuaKinh", "btnTayCamCua", "btnAll"
                productLinks.forEach(link => {
                    const category = link.getAttribute("data-category");
                    if (btnId === "btnAll") {
                        link.style.display = "block";
                    } else if (btnId === "btnCuaNhom" && category === "2") {
                        link.style.display = "block";
                    } else if (btnId === "btnCuaKinh" && category === "1") {
                        link.style.display = "block";
                    } else if (btnId === "btnTayCamCua" && category === "3") {
                        link.style.display = "block";
                    } else {
                        link.style.display = "none";
                    }
                });
                // Sau khi lọc, nếu bạn có phân trang, hãy cập nhật phân trang ở đây.
            });
        });
    });
    document.addEventListener("DOMContentLoaded", function () {
        const itemsPerPage = 9; // Số sản phẩm mỗi trang
        // Chọn tất cả các phần tử sản phẩm theo class "product-link"
        const items = document.querySelectorAll(".product-link");
        const paginationContainer = document.querySelector(".page-numbers");
        const prevButton = document.querySelector(".prev-btn");
        const nextButton = document.querySelector(".next-btn");

        let currentPage = 1;
        let totalPages = Math.ceil(items.length / itemsPerPage);

        function renderPagination() {
            paginationContainer.innerHTML = "";

            for (let i = 1; i <= totalPages; i++) {
                let pageBtn = document.createElement("button");
                pageBtn.classList.add("page-btn");
                pageBtn.textContent = i;
                if (i === currentPage) pageBtn.classList.add("active");

                pageBtn.addEventListener("click", function () {
                    currentPage = i;
                    updatePage();
                });

                paginationContainer.appendChild(pageBtn);
            }
        }

        function updatePage() {
            items.forEach((item, index) => {
                item.style.display = (index >= (currentPage - 1) * itemsPerPage && index < currentPage * itemsPerPage)
                    ? "block"
                    : "none";
            });

            document.querySelectorAll(".page-btn").forEach((btn, index) => {
                btn.classList.toggle("active", index + 1 === currentPage);
            });

            prevButton.disabled = currentPage === 1;
            nextButton.disabled = currentPage === totalPages;
        }

        prevButton.addEventListener("click", function () {
            if (currentPage > 1) {
                currentPage--;
                updatePage();
            }
        });

        nextButton.addEventListener("click", function () {
            if (currentPage < totalPages) {
                currentPage++;
                updatePage();
            }
        });

        // Khởi tạo phân trang
        renderPagination();
        updatePage();
    });
</script>

<?php include '../includes/footer.php'; ?>

</html>