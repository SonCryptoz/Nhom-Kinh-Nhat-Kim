<?php
// Kết nối CSDL
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = new mysqli($dbhost, $dbuser, $dbpass, "webcuakinh");

if ($conn->connect_error) {
    die("Lỗi không thể kết nối!");
}

if (isset($_FILES['image']) && isset($_POST['content_id']) && isset($_POST['id_product'])) {
    // Lấy thông tin gửi từ AJAX
    $content_id = $_POST['content_id'];
    $id_product = $_POST['id_product'];

    // Lấy file ảnh
    $image = $_FILES['image'];
    $target_dir = "./uploads/product-images/"; // Thư mục lưu trữ ảnh
    $target_file = $target_dir . basename($image["name"]);
    
    // Kiểm tra nếu ảnh tải lên hợp lệ
    if (move_uploaded_file($image["tmp_name"], $target_file)) {
        // Cập nhật CSDL với đường dẫn ảnh mới
        $sql = "UPDATE content_blocks SET content = ? WHERE id = ? AND id_product = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sii", $target_file, $content_id, $id_product);
        $stmt->execute();

        // Trả về đường dẫn ảnh mới cho JavaScript
        echo $target_file;
    } else {
        echo "Lỗi tải ảnh lên.";
    }
}
?>
