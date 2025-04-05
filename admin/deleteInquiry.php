<?php
session_start();
include '../includes/database.php'; // Điều chỉnh đường dẫn nếu cần

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Chuẩn bị câu lệnh DELETE từ bảng inquiries dựa trên inquiry_id
    $stmt = $conn->prepare("DELETE FROM inquiries WHERE inquiry_id = ?");
    if (!$stmt) {
        echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
        exit;
    }
    
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        // Xóa thành công, chuyển hướng về trang danh sách yêu cầu kèm thông báo thành công
        header("Location: contact-request.php");
        exit;
    } else {
        echo "Xóa yêu cầu thất bại: (" . $stmt->errno . ") " . $stmt->error;
    }
    
    $stmt->close();
} else {
    echo "ID không hợp lệ.";
}

$conn->close();
?>
