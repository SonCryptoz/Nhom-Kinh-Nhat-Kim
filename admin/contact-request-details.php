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
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    // Truy vấn lấy dữ liệu yêu cầu theo id
    $sql = "SELECT * FROM inquiries WHERE inquiry_id = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
    }
    
    $stmt->bind_param("i", $id);
    $stmt->execute();
    
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
    } else {
        echo "Không tìm thấy yêu cầu nào.";
        exit;
    }
    
    $stmt->close();
} else {
    echo "ID không hợp lệ.";
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
    <link rel="stylesheet" href="./assets/css/contact-request-details.css">
    <link rel="stylesheet" href="./assets/css/admin-base.css">
    <link rel="stylesheet" href="./assets/css/admin-responsive.css">
    <title>Admin Panel</title>
</head>

<body>
    <div class="wrap">
        <?php include '../includes/sidebar.php'; ?>
        <div class="wrapper">
            <div class="container mt-4">
                <h2 class="mb-3" style="font-weight: 600; color: var(--primary-color);">Chi tiết yêu cầu</h2>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>ID:</th>
                        <td><?php echo $data['inquiry_id']; ?></td>
                    </tr>
                    <tr>
                        <th>Tên khách hàng:</th>
                        <td><?php echo htmlspecialchars($data['name']); ?></td>
                    </tr>
                     
                    <tr>
                        <th>Điện thoại:</th>
                        <td><?php echo htmlspecialchars($data['phone']); ?></td>
                    </tr>
                    
                     
                    <tr>
                        <th>Nội dung yêu cầu:</th>
                        <td><?php echo nl2br(htmlspecialchars($data['message'])); ?></td>
                    </tr>
                    <tr>
                        <th>Ngày gửi:</th>
                        <td><?php echo date("M d, Y h:i A", strtotime($data['created_at'])); ?></td>
                    </tr>
                </table>
                <button type="button" class="btn btn-secondary me-2"
                    onclick="window.location.href='contact-request.php';">Quay lại</button>
            </div>
        </div>
    </div>
</body>

</html>