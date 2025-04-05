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
$id = isset($_GET['id']) ? (int) $_GET['id'] : 1; // Nếu không có id, mặc định $id = 1
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
$sql = "SELECT * FROM videos WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $title = $row['title'];
    $video_url = $row['video_url'];
    // Giả sử trường lưu loại video có tên 'loai_video' với giá trị 1, 2, 3
    $product_id = $row['loai_video'];
    $product_link = $row['product_link'];
    $status = $row['status'];
} else {
    echo "Không tìm thấy video nào.";
    exit;
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
                    <form action="../database/updateVideos.php" method="POST" enctype="multipart/form-data">
                        <!-- Giữ ID video ẩn -->
                        <input type="hidden" name="id" value="<?= $id; ?>">

                        <!-- Tiêu đề Video -->
                        <div class="mb-3">
                            <label for="videoTitle" class="form-label">Tiêu đề Video</label>
                            <input type="text" id="videoTitle" name="title" class="form-control"
                                placeholder="Cửa nhôm Owin..." required value="<?= htmlspecialchars($title); ?>">
                        </div>

                        <!-- URL Video -->
                        <div class="mb-3">
                            <label for="videoUrl" class="form-label">URL Video</label>
                            <input type="url" id="videoUrl" name="video_url" class="form-control"
                                placeholder="https://facebook.com/..." required
                                value="<?= htmlspecialchars($video_url); ?>">
                        </div>

                        <!-- Loại danh mục video -->
                        <div class="mb-3">
                            <label for="productSelect" class="form-label">Loại danh mục video</label>
                            <select id="productSelect" name="product_id" class="form-select">
                                <option value="1" <?= ($product_id == 1 ? 'selected' : ''); ?>>Facebook</option>
                                <option value="2" <?= ($product_id == 2 ? 'selected' : ''); ?>>Youtube</option>
                                <option value="3" <?= ($product_id == 3 ? 'selected' : ''); ?>>Tiktok</option>
                            </select>
                        </div>

                        <!-- Sản phẩm liên quan (Nếu có) -->
                        <div class="mb-3">
                            <label for="linkproduct" class="form-label">Sản phẩm liên quan (Nếu có)</label>
                            <input type="text" id="linkproduct" name="product_link" class="form-control"
                                placeholder="Link sản phẩm" value="<?= htmlspecialchars($product_link); ?>">
                        </div>

                        <!-- Trạng thái -->
                        <div class="mb-3">
                            <label for="status" class="form-label">Trạng thái</label>
                            <select id="status" name="status" class="form-select">
                                <option value="published" <?= ($status === 'published' ? 'selected' : ''); ?>>Hiển thị
                                </option>
                                <option value="hidden" <?= ($status === 'hidden' ? 'selected' : ''); ?>>Ẩn</option>
                            </select>
                        </div>

                        <!-- Nút Hủy / Lưu -->
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-secondary me-2"
                                onclick="window.location.href='videos.php';">Hủy</button>
                            <button type="submit" class="btn btn-primary update-video-btn">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
 

</html>