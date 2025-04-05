<?php
session_start();
include '../includes/database.php'; // Điều chỉnh đường dẫn nếu cần

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Chuẩn bị câu lệnh DELETE
    $stmt = $conn->prepare("DELETE FROM videos WHERE id = ?");
    if (!$stmt) {
        echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
        exit;
    }
    
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        // Xóa thành công, chuyển hướng về trang danh sách video kèm thông báo thành công
        header("Location: videos.php?delete=success");
        exit;
    } else {
        echo "Xóa video thất bại: (" . $stmt->errno . ") " . $stmt->error;
    }
    
    $stmt->close();
} else {
    echo "ID không hợp lệ.";
}

$conn->close();
?>
