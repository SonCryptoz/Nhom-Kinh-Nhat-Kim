<?php
session_start();
include '../includes/database.php';

// Kiểm tra session có tồn tại không
if (!isset($_SESSION['name'], $_SESSION['id'], $_SESSION['role'])) {
    header('Location: login.php');
    exit();
}

// Cập nhật session ID để tránh tấn công session fixation
session_regenerate_id(true);

$user_id = $_SESSION['id'];
$role = $_SESSION['role'];

// Xử lý tên người dùng
$nameParts = explode(" ", trim($_SESSION['name']));
$countName = count($nameParts);

if ($countName >= 2) {
    $name = $nameParts[$countName - 2] . " " . $nameParts[$countName - 1];
} else {
    $name = $nameParts[0]; // Nếu chỉ có 1 từ, lấy nguyên tên
}

// Kiểm tra quyền hạn
if ($role == 'staff') {
    header('Location: videos.php');
    exit();
}

// Hàm lấy tên quyền
function getRole($role)
{
    switch ($role) {
        case 'staff':
            return "Nhân viên";
        case 'admin':
        default:
            return "Chủ";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./assets/css/add-product-admin.css">
    <link rel="stylesheet" href="./assets/css/admin-base.css">
    <link rel="stylesheet" href="./assets/css/admin-responsive.css">
    <title>Admin Panel</title>
    <style>
        #imagePreview img,
        #videoPreview video {
            max-width: 150px;
            max-height: 150px;
            margin-right: 10px;
            border-radius: 8px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div class="wrap">
        <?php include '../includes/sidebar.php'; ?>
        <div class="wrapper">
            <div class="container mt-4 mb-4">
                <h2 class="mb-4">Thêm sản phẩm mới</h2>

                <div class="card p-4 custom-card">
                    <form id="addProductsForm" action="../database/addProducts.php" method="POST"
                        enctype="multipart/form-data">
                        <!-- Danh mục sản phẩm -->
                        <div class="mb-3">
                            <label for="category" class="form-label">Danh mục</label>
                            <select class="form-select" id="category" name="category_id" required>
                                <option value="">Chọn danh mục</option>
                                <option value="1">Phụ kiện</option>
                                <option value="2">Cửa nhôm</option>
                                <option value="3">Khoá cửa vân tay thông minh</option>
                            </select>
                        </div>

                        <!-- Tên sản phẩm -->
                        <div class="mb-3">
                            <label for="productName" class="form-label">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="productName" name="name"
                                placeholder="Nhập tên sản phẩm" required>
                        </div>

                        <!-- Mô tả sản phẩm -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Mô tả sản phẩm</label>
                            <textarea class="form-control" id="description" name="description" rows="3"
                                placeholder="Nhập mô tả"></textarea>
                        </div>

                        <!-- Trạng thái -->
                        <div class="mb-3">
                            <label class="form-label">Trạng thái</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="show" value="1" checked>
                                <label class="form-check-label" for="show">Hiển thị</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="hide" value="0">
                                <label class="form-check-label" for="hide">Ẩn</label>
                            </div>
                        </div>
                        <!-- Upload ảnh -->
                        <div class="mb-3">
                            <label class="form-label">Ảnh sản phẩm</label>
                            <input type="file" class="form-control" name="image" id="productImages" accept="image/*">
                            <div id="imagePreview" class="d-flex flex-wrap mt-2"></div>
                        </div>




                        <!-- Nút hành động -->
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary me-2"
                                onclick="window.location.href='products-admin.php';">Hủy</button>
                            <button type="submit" class="btn btn-primary add-product-btn">Thêm</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="container mt-4 mb-4">
                <h2 class="mb-4">Thêm danh mục mới</h2>

                <div class="card p-4 custom-card">
                    <form id="addCategoryForm">
                        <!-- Loại sản phẩm -->
                        <div class="mb-3">
                            <label for="categoryName" class="form-label">Loại sản phẩm</label>
                            <input type="text" class="form-control" id="categoryName" placeholder="Nhập loại sản phẩm">
                        </div>

                        <!-- Mô tả sản phẩm -->
                        <div class="mb-3">
                            <label for="categoryDescription" class="form-label">Mô tả loại sản phẩm</label>
                            <textarea class="form-control" id="categoryDescription" rows="3"
                                placeholder="Nhập mô tả"></textarea>
                        </div>

                        <!-- Nút hành động -->
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary me-2"
                                onclick="window.location.href='products-admin.php';">Hủy</button>
                            <button type="submit" class="btn btn-primary add-product-btn">Thêm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    document.getElementById("productImages").addEventListener("change", function (event) {
        let preview = document.getElementById("imagePreview");
        preview.innerHTML = "";
        Array.from(event.target.files).forEach(file => {
            let img = document.createElement("img");
            img.src = URL.createObjectURL(file);
            img.classList.add("img-thumbnail");
            preview.appendChild(img);
        });
    });



</script>

</html>