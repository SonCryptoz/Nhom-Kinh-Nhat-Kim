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
$user_id = intval($_SESSION['name']);

// Truy vấn lấy thông tin người dùng từ bảng user
$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $username = htmlspecialchars($row['username']);
    $email = htmlspecialchars($row['email']);
    // Lưu ý: mật khẩu không được hiển thị ra. Chỉ hiển thị trường để nhập mật khẩu mới.
    $role = htmlspecialchars($row['role']); // Giả sử cột role có tên "role"
} else {
    echo "Không tìm thấy thông tin người dùng.";
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
    <link rel="stylesheet" href="./assets/css/profile.css">
    <link rel="stylesheet" href="./assets/css/admin-base.css">
    <link rel="stylesheet" href="./assets/css/admin-responsive.css">
    <title>Admin Panel</title>
</head>

<body>
    <div class="wrap">
        <?php include '../includes/sidebar.php'; ?>
        <div class="wrapper">
            <div class="container mt-4">
                <h2 class="mb-3">Hồ Sơ Của Tôi</h2>

                <div class="card custom-card">
                    <div class="card-body">
                        <div class="row">
                            <!-- Ảnh đại diện -->
                            <div class="col-md-4 text-center">
                                <img src="./assets/images/nhat-kim-logo.png" alt="Avatar"
                                    class="rounded-circle img-thumbnail" width="300" height="300">
                                 
                            </div>

                            <!-- Thông tin người dùng -->
                            <div class="col-md-8">
                                <form action="../database/updateUser.php" method="POST">
                                <input type="hidden" name="old_username" value="<?= $username; ?>">

                                    <!-- Lưu ID người dùng ẩn -->
                                    <input type="hidden" name="id" value="<?= $user_id; ?>">

                                    <div class="mb-3">
                                        <label class="form-label">Tên tài khoản</label>
                                        <input type="text" class="form-control" name="username"
                                            value="<?= $username; ?>">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" value="<?= $email; ?>">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Mật khẩu mới</label>
                                        <input type="password" class="form-control" name="new_password"
                                            placeholder="Nhập mật khẩu mới (nếu muốn đổi)">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Vai trò</label>
                                        <input type="text" class="form-control" value="<?= $role; ?>" disabled>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>