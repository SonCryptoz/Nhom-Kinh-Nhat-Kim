<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nhomkinhnhatkim";

// Kết nối cơ sở dữ liệu
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed. Please try again later.");
}

mysqli_set_charset($conn, "utf8");
?>
