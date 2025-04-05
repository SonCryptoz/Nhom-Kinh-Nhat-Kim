<?php
session_start();
include '../includes/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    // $id không cần thiết nếu cập nhật theo username, nên ta sẽ lấy old_username để định danh người dùng
    $old_username = isset($_POST['old_username']) ? trim($_POST['old_username']) : '';
    $username     = isset($_POST['username']) ? trim($_POST['username']) : '';
    $email        = isset($_POST['email']) ? trim($_POST['email']) : '';
    $new_password = isset($_POST['new_password']) ? trim($_POST['new_password']) : '';

    // Kiểm tra dữ liệu bắt buộc
    if (empty($old_username) || empty($username) || empty($email)) {
        echo "Dữ liệu không hợp lệ.";
        exit;
    }

    // Nếu người dùng nhập mật khẩu mới thì hash mật khẩu
    if (!empty($new_password)) {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        $sql = "UPDATE users SET username = ?, email = ?, password = ? WHERE username = ?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
            exit;
        }
        // Tất cả các giá trị ở đây đều là chuỗi: username mới, email, mật khẩu đã hash, và username cũ
        $stmt->bind_param("ssss", $username, $email, $hashed_password, $old_username);
    } else {
        // Nếu không có mật khẩu mới, chỉ cập nhật username và email
        $sql = "UPDATE users SET username = ?, email = ? WHERE username = ?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
            exit;
        }
        $stmt->bind_param("sss", $username, $email, $old_username);
    }

    if ($stmt->execute()) {
        // Cập nhật thành công, cập nhật lại session nếu cần
        $_SESSION['username'] = $username; // cập nhật session nếu tên tài khoản thay đổi
        header("Location: ../admin/profile.php?update=success");
        exit;
    } else {
        echo "Cập nhật thất bại: (" . $stmt->errno . ") " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Phương thức không hợp lệ.";
}
?>
