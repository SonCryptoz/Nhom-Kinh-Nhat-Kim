<?php
// Cấu hình kết nối database
session_start();
include '../includes/database.php';
// Lấy id sản phẩm từ form
$id_product = $_POST['id_product'];
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
$name = ($countName >= 2) ? $nameParts[$countName - 2] . " " . $nameParts[$countName - 1] : $nameParts[0];

// Kiểm tra quyền hạn
if ($role == 'staff') {
    header('Location: videos.php');
    exit();
}
// Lấy dữ liệu cũ của sản phẩm (để giữ lại hình ảnh nếu không upload ảnh mới)
$sqlOld = "SELECT new_images FROM news WHERE post_id = ?";
$stmtOld = $conn->prepare($sqlOld);
$stmtOld->bind_param("i", $id_product);
$stmtOld->execute();
$stmtOld->bind_result($old_image);
$stmtOld->fetch();
$stmtOld->close();

// Lấy các trường từ form
$product_name = $_POST['product_name'];
$slug = $_POST['description'];  // Ở đây 'description' chứa slug theo mẫu của bạn
$status = $_POST['status'];

// Xử lý file upload (nếu có)
$new_images = $old_image; // Giữ lại ảnh cũ nếu không có file mới
if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
    $target_dir = __DIR__ . '/../uploads/news-images/';

    // Kiểm tra thư mục có tồn tại không, nếu không thì tạo mới
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true); // Cấp quyền 777 để có thể ghi file
    }
    
    // Đảm bảo đường dẫn tuyệt đối
    $target_dir = realpath($target_dir) . '/';
    
    $image_name  = basename($_FILES['image']['name']);
    $target_file = $target_dir . $image_name;
    
     


    // Đổi tên file để tránh trùng lặp
    

    // Lưu ảnh và cập nhật đường dẫn ảnh (đường dẫn tương đối)
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        $new_images = '../uploads/news-images/' . $image_name;
    } else {
        echo "Lỗi khi upload hình ảnh.<br>";
    }
}


// Câu truy vấn UPDATE để cập nhật sản phẩm
$sqlUpdate = "UPDATE news SET title = ?, slug = ?, new_images = ?, status = ? WHERE post_id = ?";
$stmtUpdate = $conn->prepare($sqlUpdate);
if (!$stmtUpdate) {
    die("Chuẩn bị truy vấn thất bại: " . $conn->error);
}

// Gắn tham số: s - string, i - integer
$stmtUpdate->bind_param("ssssi", $product_name, $slug, $new_images, $status, $id_product);

// Thực thi truy vấn
if ($stmtUpdate->execute()) {
    echo "Cập nhật sản phẩm thành công.";
    // Bạn có thể chuyển hướng về trang khác nếu cần: header("Location: danh_sach.php");
} else {
    echo "Lỗi cập nhật: " . $stmtUpdate->error;
}

$stmtUpdate->close();
$conn->close();
header("Location: ../admin/update-news-admin.php?id=" . $id_product);
?>