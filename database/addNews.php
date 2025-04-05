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

// Lấy dữ liệu từ form
$title = isset($_POST['title']) ? trim($_POST['title']) : '';
$slug = isset($_POST['slug']) ? trim($_POST['slug']) : '';
$status = isset($_POST['status']) ? trim($_POST['status']) : 'ban-nhap';

// Kiểm tra dữ liệu bắt buộc
if (empty($title) || empty($slug)) {
    echo "Vui lòng nhập đầy đủ tiêu đề và slug.";
    exit;
}

// Xử lý upload ảnh chính
$imagePath = '';
if (isset($_FILES['newsImage']) && $_FILES['newsImage']['error'] === UPLOAD_ERR_OK) {
    // Đường dẫn vật lý để upload file
    $uploadDir = __DIR__ . '/../uploads/news_images/';
    
    
    // Lấy thông tin file upload
    $fileTmpPath = $_FILES['newsImage']['tmp_name'];
    $originalFileName = basename($_FILES['newsImage']['name']);
    
    // Lấy phần mở rộng của file
    $fileExt = strtolower(pathinfo($originalFileName, PATHINFO_EXTENSION));
    $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];
    
    if (in_array($fileExt, $allowedExts)) {
        // Sử dụng tên gốc của file (như trong file upload của bạn)
        $newFileName = $originalFileName;
        $destPath = $uploadDir . $newFileName;
        
        if (move_uploaded_file($fileTmpPath, $destPath)) {
            // Lưu đường dẫn URL tương đối (không bao gồm "public")
            $imagePath = '../uploads/news_images/' . $newFileName;
        } else {
            echo "Lỗi khi upload file.";
            exit;
        }
    } else {
        echo "Chỉ cho phép upload ảnh (jpg, jpeg, png, gif).";
        exit;
    }
} else {
    echo "Vui lòng chọn ảnh cho bài viết.";
    exit;
}



// Sử dụng prepared statement để chèn dữ liệu vào bảng news
$sql = "INSERT INTO news (title, slug, new_images, status) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Lỗi chuẩn bị truy vấn: " . $conn->error);
}
$stmt->bind_param("ssss", $title, $slug, $imagePath, $status);

if ($stmt->execute()) {
    echo "Bài viết đã được thêm thành công!";
    // Sau khi thêm thành công, bạn có thể chuyển hướng:
    // header("Location: news-admin.php");
    // exit;
} else {
    echo "Lỗi: " . $stmt->error;
}

$stmt->close();
$conn->close();
header("Location: " . "../admin/news-admin.php");
?>