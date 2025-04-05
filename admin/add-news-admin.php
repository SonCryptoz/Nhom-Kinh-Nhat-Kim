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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/add-news-admin.css">
    <link rel="stylesheet" href="./assets/css/admin-base.css">
    <link rel="stylesheet" href="./assets/css/admin-responsive.css">
    <title>Admin Panel</title>
</head>

<body>
    <div class="wrap">
        <?php include '../includes/sidebar.php'; ?>
        <div class="wrapper">
        <div class="container mt-4 mb-4">
            <h2 class="mb-4">Thêm bài viết mới</h2>
            <div class="card p-4 custom-card">
                <!-- Form gửi dữ liệu tới file xử lý addNews.php, dùng POST và enctype cho upload file -->
                <form id="addNewsForm" action="../database/addNews.php" method="POST" enctype="multipart/form-data">
                    <!-- Tiêu đề bài viết -->
                    <div class="mb-3">
                        <label class="form-label">Tiêu đề</label>
                        <input type="text" class="form-control" name="title" placeholder="Nhập tiêu đề bài viết" required>
                    </div>

                    <!-- Slug -->
                    <div class="mb-3">
                        <label class="form-label">Slug</label>
                        <input type="text" class="form-control" name="slug" placeholder="Slug sẽ tự động tạo hoặc chỉnh sửa" required>
                    </div>

                    <!-- Upload ảnh chính -->
                    <div class="mb-3">
                        <label class="form-label">Ảnh chính của bài viết</label>
                        <input type="file" class="form-control" id="newsImage" name="newsImage" accept="image/*" required>
                        <div id="imagePreview" class="d-flex flex-wrap mt-2"></div>
                    </div>

                    <!-- Trạng thái -->
                    <div class="mb-3">
                        <label class="form-label">Trạng thái</label>
                        <select class="form-select" name="status">
                            <option value="da-dang">Đã đăng</option>
                            <option value="ban-nhap" selected>Nháp</option>
                            <option value="khong-hien-thi">Không hiển thị</option>
                        </select>
                    </div>

                    <!-- Nút hành động -->
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary me-2" onclick="window.location.href='news-admin.php';">Hủy</button>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    </div>
</body>
<script>
        document.addEventListener("DOMContentLoaded", function () {
            const imageInput = document.getElementById("newsImage");
            const imagePreview = document.getElementById("imagePreview");

            imageInput.addEventListener("change", function (event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        imagePreview.innerHTML = `<img src="${e.target.result}" class="img-thumbnail" width="150" height="150">`;
                    };
                    reader.readAsDataURL(file);
                } else {
                    imagePreview.innerHTML = "";
                }
            });
        });
    </script>

</html>