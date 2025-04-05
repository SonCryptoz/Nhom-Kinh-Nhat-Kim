<?php
// addInquiry.php
// File này nhận dữ liệu từ form và lưu vào bảng inquiries

session_start();
include '../includes/database.php'; // Điều chỉnh đường dẫn kết nối CSDL cho phù hợp

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form và làm sạch
    $name    = isset($_POST['name']) ? trim($_POST['name']) : '';
    $phone   = isset($_POST['phone']) ? trim($_POST['phone']) : '';
    $diachi  = isset($_POST['diachi']) ? trim($_POST['diachi']) : '';
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';
    
    // Nếu có truyền product_id từ form (nếu không có thì sẽ là NULL)
     
    
    // Kiểm tra dữ liệu bắt buộc
    if (empty($name) || empty($phone) || empty($diachi)) {
        echo "<script>alert('Vui lòng nhập đầy đủ thông tin cần thiết.'); window.history.back();</script>";
        exit;
    }
    
    // Câu lệnh SQL để chèn dữ liệu vào bảng inquiries
    $sql = "INSERT INTO inquiries ( name, diachi, phone, message) VALUES ( ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
        exit;
    }
    
    $stmt->bind_param("ssss",  $name, $diachi, $phone, $message);
    
    if ($stmt->execute()) {
        // Thông báo thành công và load lại trang vừa gửi
        echo "<script>alert('Yêu cầu tư vấn của bạn đã được gửi thành công!'); window.location.href = document.referrer;</script>";
        exit;
    } else {
        echo "<script>alert('Lỗi khi gửi yêu cầu: " . $stmt->error . "'); window.history.back();</script>";
    }
    
    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('Phương thức không hợp lệ.'); window.history.back();</script>";
}
?>
