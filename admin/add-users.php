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
    <link rel="stylesheet" href="./assets/css/add-users.css">
    <link rel="stylesheet" href="./assets/css/admin-base.css">
    <link rel="stylesheet" href="./assets/css/admin-responsive.css">
    <title>Admin Panel</title>
</head>

<body>
    <div class="wrap">
        <?php include '../includes/sidebar.php'; ?>
        <div class="wrapper">
            <div class="container mt-4">
                <h2 class="mb-4">Thêm tài khoản mới</h2>
                <div class="card custom-card ">
                    <div class="card-body">
                        <form>
                            <!-- Tên tài khoản -->
                            <div class="mb-3">
                                <label class="form-label">Tên tài khoản</label>
                                <input type="text" class="form-control" placeholder="Nhập tên tài khoản">
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" placeholder="Nhập email">
                            </div>

                            <!-- Mật khẩu -->
                            <div class="mb-3">
                                <label class="form-label">Mật khẩu</label>
                                <input type="password" class="form-control" placeholder="Nhập mật khẩu">
                            </div>

                            <!-- Ảnh đại diện -->
                            <div class="mb-3">
                                <label for="avatar" class="form-label">Ảnh avatar</label>
                                <input type="file" id="avatar" name="avatar" class="form-control"
                                    accept="image/*">
                                <div class="mt-2">
                                    <img id="previewImage" src="" alt="Xem trước ảnh" width="120"
                                        style="display: none;">
                                </div>
                            </div>

                            <!-- Vai trò -->
                            <div class="mb-3">
                                <label class="form-label">Vai trò</label>
                                <select class="form-select">
                                    <option value="user">Admin</option>
                                    <option value="admin">Staff</option>
                                </select>
                            </div>

                            <!-- Nút Hủy / Lưu -->
                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-secondary me-2"
                                    onclick="window.location.href='users.php';">Hủy</button>
                                <button type="submit" class="btn btn-primary add-video-btn">Thêm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    document.getElementById("avatar").addEventListener("change", function (event) {
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