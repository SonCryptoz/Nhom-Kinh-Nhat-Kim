<?php
// Bắt đầu session để hiển thị thông báo
session_start();
include '../includes/database.php'; // Kết nối CSDL

if (isset($_GET['id'])) {
    $post_id = intval($_GET['id']);

    // Bắt đầu transaction để đảm bảo dữ liệu toàn vẹn
    $conn->begin_transaction();

    try {
        // Xóa bài viết trong bảng post_description (nếu có bảng liên quan)
        $sql1 = "DELETE FROM new_description WHERE post_id = ?";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->bind_param("i", $post_id);
        $stmt1->execute();
        $stmt1->close();

        // Xóa bài viết trong bảng chính (posts)
        $sql2 = "DELETE FROM news WHERE post_id = ?";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bind_param("i", $post_id);
        $stmt2->execute();
        $stmt2->close();

        // Commit transaction nếu không có lỗi
        $conn->commit();

        // Chuyển hướng về trang danh sách bài viết sau khi xóa thành công
        header("Location: news-admin.php?message=deleted");
        exit();
    } catch (Exception $e) {
        // Nếu có lỗi, rollback để không làm mất dữ liệu
        $conn->rollback();
        echo "Lỗi khi xóa bài viết: " . $e->getMessage();
    }
} else {
    echo "Không có bài viết nào được chỉ định để xóa.";
}
?>
