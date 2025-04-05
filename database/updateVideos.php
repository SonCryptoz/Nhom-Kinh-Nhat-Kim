<?php
// updateVideos.php

session_start();
include '../includes/database.php';

// Kiểm tra xem dữ liệu có được gửi qua POST hay không
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy và xử lý các giá trị từ form
    $id           = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $title        = isset($_POST['title']) ? trim($_POST['title']) : '';
    $video_url    = isset($_POST['video_url']) ? trim($_POST['video_url']) : '';
    $product_id   = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0; // 1: Facebook, 2: YouTube, 3: TikTok
    $product_link = isset($_POST['product_link']) ? trim($_POST['product_link']) : '';
    $status       = isset($_POST['status']) ? trim($_POST['status']) : '';

    // Kiểm tra dữ liệu bắt buộc
    if ($id <= 0 || empty($title) || empty($video_url)) {
        echo "Dữ liệu không hợp lệ.";
        exit;
    }

    // Câu lệnh UPDATE với prepared statement để tránh SQL Injection
    $sql = "UPDATE videos SET title = ?, video_url = ?, loai_video = ?, product_link = ?, status = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
        exit;
    }

    // Gán các tham số: s - string, i - integer
    $stmt->bind_param("ssissi", $title, $video_url, $product_id, $product_link, $status, $id);

    // Thực thi câu lệnh và kiểm tra kết quả
    if ($stmt->execute()) {
        // Nếu cập nhật thành công, chuyển hướng về trang danh sách video (ví dụ videos.php)
        header("Location: ../admin/videos.php?update=success");
        exit;
    } else {
        echo "Cập nhật thất bại: (" . $stmt->errno . ") " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Phương thức không hợp lệ.";
}
?>
