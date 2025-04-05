
<?php
// Kết nối CSDL
 
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
$category_name= $product_row['image_url'];
if ($category_name == 1){
    $category_name_tittle = "Phụ kiện";
}elseif($category_name == 1){
    $category_name_tittle = "Cửa nhôm";
}else {
    $category_name_tittle = "Khoá cửa";
}

 

// Nếu cả hai bảng đều không có dữ liệu, hiển thị thông báo
if (!$product_row && !$content_row) {
    echo "Không có dữ liệu cho sản phẩm này.";
}

// Đóng kết nối


?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khung SVG Bao Nội Dung</title>
    <style>
        .wrapper1 {
            width: 100vw;
            background: url(/public/assets/images/backgroundmuc.png);
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            padding: 20px 0;

        }

        .wr-banner {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 90%;
            max-width: 400px;
            padding: 60px 20px;
        }

        .box-icon {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }

        .top-icon {
            top: 0;
        }

        .bottom-icon {
            bottom: 0;
        }

        .box-content {
          
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            position: relative;
            z-index: 2;
        }

        .center-title {
            font-size: 26px;
            font-weight: bold;
            color: white;
        }

        .breadcrumb {
            list-style: none;
            padding: 0;
            margin: 10px 0 0;
            display: flex;
            justify-content: center;
            gap: 10px;
            font-size: 14px;
        }

        .breadcrumb li span a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="wrapper1">
        <div class="wr-banner">
            <!-- SVG trên -->
            <svg xmlns="http://www.w3.org/2000/svg" width="300" height="120" fill="none">
                <path d="M5 120V0 M5 0 H295 M295 0 V120" stroke="#fff" stroke-width="10" />
            </svg>


            <!-- Nội dung bên trong khung -->
            <div class="box-content">
                <h2 class="center-title">CỬA NHÔM</h2>
                <ol class="breadcrumb">
                    <li><span><a href="../public/index.php">Trang chủ | </a></span></li>
                    <li><span><a href="../public/products.php">Sản phẩm | </a></span></li>
                    <li><span><a href="/" style="color: orange;"><?php echo $category_name_tittle; ?></a></span></li>
                </ol>
            </div>

            <!-- SVG dưới -->
            <div class="box-icon bottom-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="300" height="120" fill="none"
                    style="transform: rotate(180deg);">
                    <path d="M5 120V0 M5 0 H295 M295 0 V120" stroke="#fff" stroke-width="10" />
                </svg>
            </div>
        </div>
    </div>
</body>

</html>