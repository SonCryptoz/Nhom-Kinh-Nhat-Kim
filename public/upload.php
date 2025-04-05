<?php
// Kết nối CSDL
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'webcuakinh';
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
    die("Lỗi kết nối: " . $conn->connect_error);
}

// Kiểm tra nếu form được gửi
if (isset($_POST['submit'])) {
    $product_name = $_POST['product_name'];
    $description = $_POST['description'];

    // Thư mục lưu file
    $image_dir = "uploads/product-images/";
    $video_dir = "uploads/product-videos/";

    // Tạo thư mục nếu chưa tồn tại
    if (!is_dir($image_dir)) {
        mkdir($image_dir, 0777, true);
    }
    if (!is_dir($video_dir)) {
        mkdir($video_dir, 0777, true);
    }

    // Xử lý hình ảnh
    $image_name = basename($_FILES["image"]["name"]);
    $image_path = $image_dir . $image_name;
    move_uploaded_file($_FILES["image"]["tmp_name"], $image_path);

    // Xử lý video (nếu có)
    $video_path = NULL; // Mặc định là NULL nếu không có video
    if (!empty($_FILES["video"]["name"])) {
        $video_name = basename($_FILES["video"]["name"]);
        $video_path = $video_dir . $video_name;
        move_uploaded_file($_FILES["video"]["tmp_name"], $video_path);
    }

    // Chèn dữ liệu vào CSDL
    $sql = "INSERT INTO product (product_name, description, image_url, video_url) 
            VALUES ('$product_name', '$description', '$image_path', '$video_path')";

    if ($conn->query($sql) === TRUE) {
        echo "Thêm sản phẩm thành công!";
    } else {
        echo "Lỗi: " . $conn->error;
    }

    $conn->close();
}
?>
