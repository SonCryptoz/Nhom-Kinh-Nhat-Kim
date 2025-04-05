<?php
// Mật khẩu cần mã hoá
$password = "nhatkimwindow579@";

// Mã hoá mật khẩu sử dụng thuật toán mặc định (thường là BCRYPT)
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// In ra mật khẩu đã được mã hoá
echo "Mật khẩu đã mã hoá: " . $hashedPassword;
?>
