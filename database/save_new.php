<?php
session_start();
include '../includes/database.php';
$id_product = $_POST['id_product'];

// 1. Xoá các block đã đánh dấu xoá
if (isset($_POST['content_id']) && isset($_POST['delete_existing'])) {
    $content_ids = $_POST['content_id'];
    $delete_flags = $_POST['delete_existing'];
    foreach ($content_ids as $index => $content_id) {
        if ($delete_flags[$index] == "1") {
            $sql = "DELETE FROM new_description WHERE id = ? AND post_id= ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("is", $content_id, $id_product);
            $stmt->execute();
            $stmt->close();
        }
    }
}

// 2. Cập nhật các block đã có (không bị xoá)
if (isset($_POST['content_id']) && isset($_POST['delete_existing'])) {
    $content_ids = $_POST['content_id'];
    $contents    = $_POST['content'];
    $types       = $_POST['type'];
    $orders      = $_POST['order'];
    $delete_flags = $_POST['delete_existing'];
    
    foreach ($content_ids as $index => $content_id) {
        // Nếu block bị đánh dấu xoá, bỏ qua UPDATE
        if ($delete_flags[$index] == "1") {
            continue;
        }
        $type = $types[$index];
        $content = $contents[$index];
        $order = (int)$orders[$index];

        // Nếu là hình ảnh, kiểm tra file upload mới
        if ($type === 'image' && isset($_FILES['image']['name'][$content_id]) && !empty($_FILES['image']['name'][$content_id]) && $_FILES['image']['size'][$content_id] > 0) {
            $target_dir = "../uploads/product-images/";
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0777, true);
            }
            $target_file = $target_dir . basename($_FILES["image"]["name"][$content_id]);
            if (move_uploaded_file($_FILES["image"]["tmp_name"][$content_id], $target_file)) {
                $content = $target_file;
            } else {
                echo "Lỗi khi upload file cho block id = " . $content_id . "<br>";
            }
        }
        
        // Cập nhật block hiện có
        $sql = "UPDATE new_description SET content = ?, position = ? WHERE id = ? AND post_id= ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("siss", $content, $order, $content_id, $id_product);
        $stmt->execute();
        $stmt->close();
    }
}

// 3. Chèn các block mới
if (isset($_POST['new_content_type'])) {
    $new_types = $_POST['new_content_type'];
    $new_orders = isset($_POST['order_new']) ? $_POST['order_new'] : array();
    
    foreach ($new_types as $i => $new_type) {
        $order_new = isset($new_orders[$i]) ? (int)$new_orders[$i] : 0;
        $new_content = "";
        if ($new_type === 'image') {
            if (isset($_FILES['new_image']['name'][$i]) && !empty($_FILES['new_image']['name'][$i]) && $_FILES['new_image']['size'][$i] > 0) {
                $target_dir = "../uploads/product-images/";
                if (!is_dir($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }
                $target_file = $target_dir . basename($_FILES["new_image"]["name"][$i]);
                if (move_uploaded_file($_FILES["new_image"]["tmp_name"][$i], $target_file)) {
                    $new_content = $target_file;
                } else {
                    echo "Lỗi khi upload file cho block mới $i<br>";
                }
            } else {
                echo "Không có file upload cho block mới $i<br>";
            }
        } else {
            if(isset($_POST['new_content'][$i])){
                $new_content = $_POST['new_content'][$i];
            }
        }
        
        // INSERT block mới vào CSDL
        $sql = "INSERT INTO new_description (post_id, type, content, position) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $id_product, $new_type, $new_content, $order_new);
        $stmt->execute();
        $stmt->close();
    }
}

echo "Cập nhật, xoá và chèn nội dung thành công.";
$conn->close();
header("Location: ../admin/update-news-admin.php?id=" . $id_product);
exit();
?>
