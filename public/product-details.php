<?php
// Kết nối CSDL
session_start();
include '../includes/database.php';

// Lấy ID sản phẩm từ request
$id = intval($_GET['id']); // Tránh SQL Injection

// 1️⃣ Lấy dữ liệu sản phẩm từ bảng `product`
$sql_product = "SELECT * FROM products WHERE product_id = ?";
$stmt = $conn->prepare($sql_product);
$stmt->bind_param("i", $id);
$stmt->execute();
$product_result = $stmt->get_result();
$product_row = $product_result->fetch_assoc();
$category_name = $product_row['image_url'];
if ($category_name == 1) {
    $category_name_tittle = "Phụ kiện";
} elseif ($category_name == 1) {
    $category_name_tittle = "Cửa nhôm";
} else {
    $category_name_tittle = "Khoá cửa vân tay thông minh";
}

// 2️⃣ Lấy dữ liệu từ bảng `content_blocks`
$sql_content = "SELECT * FROM product_description WHERE product_id = ?";
$stmt = $conn->prepare($sql_content);
$stmt->bind_param("i", $id);
$stmt->execute();
$content_result = $stmt->get_result();
$content_row = $content_result->fetch_assoc();

// 3️⃣ Hiển thị dữ liệu nếu có
if ($product_row) {

}

if ($content_row) {

}

// Nếu cả hai bảng đều không có dữ liệu, hiển thị thông báo
if (!$product_row && !$content_row) {
    echo "Không có dữ liệu cho sản phẩm này.";
}

// Đóng kết nối


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/images/nhat-kim-logo-no-slogan12.png" sizes="32x32" type="image/png">
    <title>Sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <style>
        @media screen and (max-width: 1020px) {
            .card-product-details {
                display: none;
            }
        }

        .card-product-details {
            width: 100%;
            height: 235px;
            position: relative;
            padding: 25px;
            background: radial-gradient(178.94% 106.41% at 26.42% 106.41%, #FFF7B1 0%, rgba(255, 255, 255, 0) 71.88%), #FFFFFF;
            box-shadow: 0px 155px 62px rgba(0, 0, 0, 0.01), 0px 87px 52px rgba(0, 0, 0, 0.05), 0px 39px 39px rgba(0, 0, 0, 0.09), 0px 10px 21px rgba(0, 0, 0, 0.1), 0px 0px 0px rgba(0, 0, 0, 0.1);
            border-radius: 23px;
            transition: all 0.8s cubic-bezier(0.15, 0.83, 0.66, 1);
            cursor: pointer;
        }

        .card-product-details:hover {
            transform: scale(1.05);
        }

        .container {
            width: 250px;
            height: 250px;
            position: absolute;
            right: -35px;
            top: -50px;
            display: flex;
            align-items: center;
            justify-content: center;
            transform: scale(0.7);
        }

        .cloud {
            width: 250px;
        }

        .front {
            padding-top: 45px;
            margin-left: 25px;
            display: inline;
            position: absolute;
            z-index: 11;
            animation: clouds 8s infinite;
            animation-timing-function: ease-in-out;
        }

        .back {
            margin-top: -30px;
            margin-left: 150px;
            z-index: 12;
            animation: clouds 12s infinite;
            animation-timing-function: ease-in-out;
        }

        .right-front,
        .left-front,
        .right-back,
        .left-back {
            background-color: #4c9beb;
            display: inline-block;
            z-index: 5;
        }

        .right-front {
            width: 45px;
            height: 45px;
            border-radius: 50% 50% 50% 0%;
            margin-left: -25px;
        }

        .left-front {
            width: 65px;
            height: 65px;
            border-radius: 50% 50% 0% 50%;
        }

        .right-back {
            width: 50px;
            height: 50px;
            border-radius: 50% 50% 50% 0%;
            margin-left: -20px;
        }

        .left-back {
            width: 30px;
            height: 30px;
            border-radius: 50% 50% 0% 50%;
        }

        .sun {
            width: 120px;
            height: 120px;
            background: linear-gradient(to right, #fcbb04, #fffc00);
            border-radius: 60px;
            display: inline;
            position: absolute;
        }

        .sunshine {
            animation: sunshines 2s infinite;
        }

        @keyframes sunshines {
            0% {
                transform: scale(1);
                opacity: 0.6;
            }

            100% {
                transform: scale(1.4);
                opacity: 0;
            }
        }

        @keyframes clouds {
            0% {
                transform: translateX(15px);
            }

            50% {
                transform: translateX(0px);
            }

            100% {
                transform: translateX(15px);
            }
        }

        .card-header {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .card-header span:first-child {
            font-weight: 800;
            font-size: 15px;
            color: rgba(87, 77, 51, 0.66);
        }

        .card-header span:last-child {
            padding-top: 5em;
            width: 100%;
            padding-left: 7em;
            font-weight: 700;
            font-size: 15px;
            color: rgba(87, 77, 51, 0.33);
        }

        .temp {
            position: absolute;
            left: 25px;
            bottom: 12px;
            font-weight: 700;
            font-size: 64px;
            color: rgba(87, 77, 51, 1);
        }

        .img {
            width: 100%;
            height: 100%;
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
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.75);

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
    </style>
</head>

<body class="bg-white-100 ">
    <?php include '../includes/header.php'; ?>
    <?php include './duongdansp.php'; ?>
    <!-- Hotline Gọi Điện -->
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

    <div class="wrapper">


        <div class="max-w-4xl mx-auto mt-6 border-4 border-dotted border-green-500 p-6">
            <div class="flex flex-col md:flex-row">
                <div class="video-container w-full md:w-1/2 flex justify-center">
                    <img src="<?php echo $product_row['image_url']; ?>" alt="Hình ảnh sản phẩm"
                        class="w-full max-w-[90%] md:max-w-[500px] object-cover">

                </div>
                <div class="p-6 md:w-1/2">
                    <h1 class="text-2xl font-bold mb-2"><?php echo $product_row['product_name']; ?></h1>
                    <p class="text-gray-700 mb-4">
                        Cty chúng tôi chuyên sản xuất, thi công, lắp đặt cửa nhôm kính, cửa nhôm Việt Pháp, cửa nhôm
                        Xingfa,
                        cửa nhôm cao cấp. Dưới đây chúng tôi xin cung cấp thông tin và báo giá về sản phẩm cửa nhôm kính
                        mà
                        quý khách đang quan tâm.
                    </p>
                    <div class="card-product-details">
                        <div class="container">
                            <div class="cloud front">
                                <span class="left-front"></span>
                                <span class="right-front"></span>
                            </div>
                            <span class="sun sunshine"></span>
                            <span class="sun"></span>
                            <div class="cloud back">
                                <span class="left-back"></span>
                                <span class="right-back"></span>
                            </div>
                        </div>

                        <div class="card-header">
                            <span>Hỗ trợ :<br>Hotline: 0909 179 579</span>
                            <span>Mong rằng vào một ngày nắng đẹp, bạn sẽ gọi cho chúng tôi !!!</span>
                        </div>

                        <span class="temp">23°</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-4xl mx-auto mt-6 rounded-lg p-6" style="margin-bottom: 10px;">
            <fieldset class="border-4 p-5">
                <?php
                // Sắp xếp theo cột position tăng dần, nếu các giá trị position trùng nhau thì sắp xếp theo id tăng dần
                $sql = "SELECT * FROM product_description WHERE product_id = $id ORDER BY position ASC, id_product_description  ASC";
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) {
                    if ($row['type'] == 'text') {
                        echo "<p class='text-gray-700'>" . htmlspecialchars($row['content']) . "</p>";
                    } elseif ($row['type'] == 'title') {
                        echo "<p class='text-2xl font-bold text-blue-500 mt-6'>" . htmlspecialchars($row['content']) . "</p>";
                    } elseif ($row['type'] == 'image') {
                        echo "<img src='" . $row['content'] . "' alt='Hình ảnh' class='mt-3 mx-auto block rounded-lg shadow'>";
                    }
                }
                ?>
            </fieldset>
        </div>

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
        <div class="home-product">
            <h1>SẢN PHẨM NỔI BẬT</h1>
            <h2>Với nhiều năm hoạt động, chúng tôi luôn đem đến cho khách hàng những sản phẩm chất lượng cao, hiệu quả
                với chi phí được tối ưu nhất.</h2>
            <div class="product-container">
                <?php
                $sql = "SELECT * FROM products ";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <a href="product-details.php?id=<?php echo $row['product_id']; ?>" class="product-link">
                            <div class="product-box ">
                                <img src="<?php echo $row['image_url']; ?>" alt="Tên sản phẩm" class="product-image">
                                <div class=" w-full">

                                    <h2 class="text-2xl font-bold text-gray-800   break-words whitespace-normal max-w-sm">
                                        <?php echo $row['product_name']; ?>
                                    </h2>
                                    <p class="text-gray-600 overflow-hidden text-ellipsis mb-3 h-32 line-clamp-3">
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

            <div class="home-product-button">
                <a class="btn" href="#">Xem thêm</a>
            </div>
        </div>
    </div>
    <?php include '../includes/footer.php'; ?>
    </div>

</body>

</html>