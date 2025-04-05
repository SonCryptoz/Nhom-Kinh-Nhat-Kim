<?php
session_start();
include '../includes/database.php';

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Xử lý form khi submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form và xử lý (chú ý xử lý an toàn dữ liệu thật sự cần thiết trong production)
    $title = $conn->real_escape_string($_POST["title"]);
    $video_url = $conn->real_escape_string($_POST["video_url"]);
    $product_id = $conn->real_escape_string($_POST["product_id"]);
    $product_link = isset($_POST["product_link"]) ? $conn->real_escape_string($_POST["product_link"]) : '';
    $status = $conn->real_escape_string($_POST["status"]);

    // Tạo câu lệnh SQL để chèn dữ liệu vào bảng videos
    $sql = "INSERT INTO videos (title, video_url, loai_video, product_link, status)
            VALUES ('$title', '$video_url', '$product_id', '$product_link', '$status')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Video đã được thêm thành công!</div>";
    } else {
        echo "<div class='alert alert-danger'>Lỗi: " . $conn->error . "</div>";
    }

}

$conn->close();
header("Location: " . "../admin/videos.php");
?>