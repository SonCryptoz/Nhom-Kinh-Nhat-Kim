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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category_id = intval($_POST['category_id']);
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $status = isset($_POST['status']) ? 1 : 0;

    $image_url = "";
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // Đường dẫn vật lý để upload file ảnh sản phẩm
        $uploadDir = __DIR__ . '/../uploads/product-images/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        
        // Lấy thông tin file ảnh upload
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $originalFileName = basename($_FILES['image']['name']);
        
        // Lấy phần mở rộng của file ảnh
        $fileExt = strtolower(pathinfo($originalFileName, PATHINFO_EXTENSION));
        $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];
        
        if (in_array($fileExt, $allowedExts)) {
            // Tạo tên file mới (có thêm thời gian để tránh trùng lặp)
            $newFileName = time() . "_" . $originalFileName;
            $destPath = $uploadDir . $newFileName;
            
            if (move_uploaded_file($fileTmpPath, $destPath)) {
                // Lưu đường dẫn URL tương đối cho ảnh sản phẩm
                $image_url = '../uploads/product-images/' . $newFileName;
            } else {
                echo "Lỗi khi upload ảnh sản phẩm.";
                exit;
            }
        } else {
            echo "Chỉ cho phép upload ảnh với định dạng: jpg, jpeg, png, gif.";
            exit;
        }
    } else {
        echo "Vui lòng chọn ảnh sản phẩm.";
        exit;
    }
    
    // Xử lý upload video sản phẩm
     

    // Chèn vào CSDL
    $stmt = $conn->prepare("INSERT INTO products (category_id, product_name, description, status, image_url) 
                            VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issis", $category_id, $name, $description, $status, $image_url);

    if ($stmt->execute()) {
        echo "Thêm sản phẩm thành công!";
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    header("Location: " . "../admin/products-admin.php");
}
?>
