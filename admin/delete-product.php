<?php
// Bắt đầu session để xử lý thông báo
session_start();
include '../includes/database.php'; // Kết nối CSDL

if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);

    // Bắt đầu transaction để đảm bảo tính toàn vẹn dữ liệu
    $conn->begin_transaction();

    try {
        // Xóa dữ liệu trong bảng product_description trước
        $sql1 = "DELETE FROM product_description WHERE product_id = ?";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->bind_param("i", $product_id);
        $stmt1->execute();
        $stmt1->close();

        // Xóa dữ liệu trong bảng products
        $sql2 = "DELETE FROM products WHERE product_id = ?";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bind_param("i", $product_id);
        $stmt2->execute();
        $stmt2->close();

        // Commit transaction nếu không có lỗi
        $conn->commit();

        // Chuyển hướng về trang products-admin.php sau khi xóa thành công
        header("Location: products-admin.php?message=deleted");
        exit();
    } catch (Exception $e) {
        // Nếu có lỗi, rollback để không mất dữ liệu
        $conn->rollback();
        echo "Lỗi khi xóa sản phẩm: " . $e->getMessage();
    }
} else {
    echo "Không có sản phẩm nào được chỉ định để xóa.";
}
?>
