<?php
session_start();
include '../includes/database.php';

if (!isset($conn)) {
    die('Lỗi kết nối CSDL.');
}

// Kiểm tra đầu vào
if (!empty($_POST["username"]) && !empty($_POST["password"])) {
    $getUsername = trim($_POST["username"]);
    $getPassword = trim($_POST["password"]);

    // Truy vấn chỉ lấy các cột cần thiết
    $stmt = $conn->prepare("SELECT user_id, username, role, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $getUsername);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Kiểm tra mật khẩu với password_verify()
        if (password_verify($getPassword, $row['password'])) {
            // Cập nhật Session ID để tăng bảo mật
            session_regenerate_id(true);
            
            $_SESSION['name'] = $row['username'];
            $_SESSION['id'] = $row['user_id'];
            $_SESSION['role'] = $row['role'];

            if ($row['role'] === "admin") {
                echo '1';
              
                 // Chuyển hướng admin
            } else {
                echo 'Không có quyền truy cập hợp lệ.';
            }
        } else {
            echo 'Sai mật khẩu, vui lòng thử lại!';
        }
    } else {
        echo 'Tài khoản không tồn tại!';
    }
    
    $stmt->close();
} else {
    echo 'Vui lòng nhập đầy đủ thông tin!';
}

$conn->close();
?>
