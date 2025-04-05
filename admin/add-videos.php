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
    <link rel="stylesheet" href="./assets/css/add-videos.css">
    <link rel="stylesheet" href="./assets/css/admin-base.css">
    <link rel="stylesheet" href="./assets/css/admin-responsive.css">
    <title>Admin Panel</title>
</head>

<body>
    <div class="wrap">
        <?php include '../includes/sidebar.php'; ?>
        <div class="wrapper">
            <div class="container mt-4">
                <h2 class="mb-3">Thêm Video mới</h2>
                <div class="card p-4 custom-card">
                    <form action="../database/addVideos.php" method="POST" enctype="multipart/form-data">
                        <!-- Tiêu đề Video -->
                        <div class="mb-3">
                            <label for="videoTitle" class="form-label">Tiêu đề Video</label>
                            <input type="text" id="videoTitle" name="title" class="form-control"
                                placeholder="Cửa nhôm Owin..." required>
                        </div>

                        <!-- URL Video -->
                        <div class="mb-3">
                            <label for="videoUrl" class="form-label">URL Video</label>
                            <input type="url" id="videoUrl" name="video_url" class="form-control"
                                placeholder="https://facebook.com/..." required>
                        </div>

                        <!-- (Nếu cần) Ảnh Thumbnail: Bạn có thể thêm input file ở đây -->
                        <!-- <div class="mb-3">
            <label for="thumbnail" class="form-label">Ảnh Thumbnail</label>
            <input type="file" id="thumbnail" name="thumbnail" class="form-control">
        </div> -->

                        <!-- Chọn loại danh mục video -->
                        <div class="mb-3">
                            <label for="productSelect" class="form-label">Loại danh mục video</label>
                            <select id="productSelect" name="product_id" class="form-select">
                                <option value="1">Facebook</option>
                                <option value="2">Youtube</option>
                                <option value="3">Tiktok</option>
                            </select>
                        </div>

                        <!-- Sản phẩm liên quan (Nếu có) -->
                        <div class="mb-3">
                            <label for="linkproduct" class="form-label">Sản phẩm liên quan (Nếu có)</label>
                            <input type="text" id="linkproduct" name="product_link" class="form-control"
                                placeholder="Link sản phẩm">
                        </div>

                        <!-- Trạng thái -->
                        <div class="mb-3">
                            <label for="status" class="form-label">Trạng thái</label>
                            <select id="status" name="status" class="form-select">
                                <option value="published">Hiển thị</option>
                                <option value="hidden">Ẩn</option>
                            </select>
                        </div>

                        <!-- Nút Hủy / Lưu -->
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-secondary me-2"
                                onclick="window.location.href='videos.php';">Hủy</button>
                            <button type="submit" class="btn btn-primary add-video-btn">Thêm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    document.getElementById("thumbnail").addEventListener("change", function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const previewImage = document.getElementById("previewImage");
                previewImage.src = e.target.result;
                previewImage.style.display = "block";
            };
            reader.readAsDataURL(file);
        }
    });
</script>

</html>