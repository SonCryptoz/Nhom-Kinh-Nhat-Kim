<?php
// update_product.php

// Kết nối CSDL
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
$name = ($countName >= 2) ? $nameParts[$countName - 2] . " " . $nameParts[$countName - 1] : $nameParts[0];

// Kiểm tra quyền hạn
if ($role == 'staff') {
    header('Location: videos.php');
    exit();
}

// Lấy dữ liệu từ form
$id_product   = (int) $_POST['id_product'];
$product_name = $_POST['product_name'];
$description  = $_POST['description'];
$category_id  = (int) $_POST['category_id'];
$status       = (int) $_POST['status'];

// Lấy thông tin sản phẩm hiện tại từ CSDL
$sql = "SELECT image_url FROM products WHERE product_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_product);
$stmt->execute();
$result = $stmt->get_result();
$existing = $result->fetch_assoc();
$stmt->close();

$image_url = $existing['image_url']; // Giữ lại giá trị cũ nếu không có ảnh mới

// Xử lý file upload cho hình ảnh (nếu có)
if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
    // Tạo thư mục lưu ảnh nếu chưa có
    // Sử dụng __DIR__ để lấy đường dẫn hiện tại (là thư mục database)
    // Sau đó chuyển lên một cấp và vào thư mục uploads/product-images/
    $target_dir = __DIR__ . '/../uploads/product-images/';
    

    // Đổi tên file để tránh trùng lặp
    $image_name = time() . '_' . basename($_FILES['image']['name']);
    $target_file = $target_dir . $image_name;

    // Lưu ảnh và cập nhật đường dẫn ảnh (đường dẫn tương đối)
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        $image_url = '../uploads/product-images/' . $image_name;
    } else {
        echo "Lỗi khi upload hình ảnh.<br>";
    }
}

// Cập nhật sản phẩm vào bảng products
$sql_update = "UPDATE products SET product_name = ?, description = ?, image_url = ?, category_id = ?, status = ? WHERE product_id = ?";
$stmt = $conn->prepare($sql_update);
if (!$stmt) {
    die("Lỗi prepare: " . $conn->error);
}
$stmt->bind_param("sssiii", $product_name, $description, $image_url, $category_id, $status, $id_product);

if ($stmt->execute()) {
    echo "Cập nhật sản phẩm thành công.";
} else {
    echo "Lỗi khi cập nhật sản phẩm: " . $conn->error;
}

$stmt->close();
$conn->close();
header("Location: " . "../database/update_product.php");
?>
