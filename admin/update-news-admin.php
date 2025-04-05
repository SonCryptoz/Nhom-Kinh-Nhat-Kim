<?php
session_start();
include '../includes/database.php';

// Kiểm tra session có tồn tại không
if (!isset($_SESSION['name'], $_SESSION['id'], $_SESSION['role'])) {
    header('Location: login.php');
    exit();
}

// Cập nhật session ID để tránh tấn công session fixation
session_regenerate_id(true);
$id = isset($_GET['id']) ? (int) $_GET['id'] : 1; // Nếu không có id, mặc định $id = 1

$user_id = $_SESSION['id'];
$role = $_SESSION['role'];

// Xử lý tên người dùng
$nameParts = explode(" ", trim($_SESSION['name']));
$countName = count($nameParts);

if ($countName >= 2) {
    $name = $nameParts[$countName - 2] . " " . $nameParts[$countName - 1];
} else {
    $name = $nameParts[0]; // Nếu chỉ có 1 từ, lấy nguyên tên
}

// Kiểm tra quyền hạn
if ($role == 'staff') {
    header('Location: videos.php');
    exit();
}

// Hàm lấy tên quyền
function getRole($role)
{
    switch ($role) {
        case 'staff':
            return "Nhân viên";
        case 'admin':
        default:
            return "Chủ";
    }
}
// 1️⃣ Lấy dữ liệu sản phẩm từ bảng `product`
$sql_product = "SELECT * FROM news WHERE post_id = ?";
$stmt = $conn->prepare($sql_product);
$stmt->bind_param("i", $id);
$stmt->execute();
$product_result = $stmt->get_result();
$product_row = $product_result->fetch_assoc();

// 2️⃣ Lấy dữ liệu từ bảng `content_blocks`
$sql_content = "SELECT * FROM new_description WHERE post_id = ?";
$stmt = $conn->prepare($sql_content);
$stmt->bind_param("i", $id);
$stmt->execute();
$content_result = $stmt->get_result();
$content_row = $content_result->fetch_assoc();

// 3️⃣ Hiển thị dữ liệu nếu có
if ($product_row) {

}

if ($content_row) {

}

// Nếu cả hai bảng đều không có dữ liệu, hiển thị thông báo
if (!$product_row && !$content_row) {
    echo "Không có dữ liệu cho sản phẩm này.";
}

// Đóng kết nối


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <style>
        /* custom-content.css */

        /* Container của form nội dung */
        .custom-form-container {
            max-width: 1024px;
            margin: 1.5rem auto;
            padding: 1.5rem;
            border: 4px dashed #38a169;
            /* Màu xanh lá */
            border-radius: 0.5rem;
            background-color: #f7fafc;
        }

        /* Mỗi block nội dung */
        .custom-block {
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 0.375rem;
            padding: 1rem;
            margin-bottom: 1rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        /* Container flex cho nội dung và nút xoá cùng dòng */
        .custom-flex {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        /* Phần nội dung block */
        .custom-content {
            flex-grow: 1;
            padding-right: 1rem;
        }

        /* Nút xoá (bên phải cùng dòng với nội dung) */
        .custom-delete-btn {
            background-color: #f56565;
            color: #fff;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            border: none;
            cursor: pointer;
        }

        /* Nút thêm block mới (nằm ở footer của mỗi block) */
        .custom-add-btn {
            background-color: #4299e1;
            color: #fff;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            border: none;
            cursor: pointer;
        }

        /* Nút thêm block mới ở cuối form */
        .custom-add-btn-main {
            background-color: #4299e1;
            color: #fff;
            padding: 0.75rem 1.5rem;
            border-radius: 0.375rem;
            border: none;
            cursor: pointer;
            display: inline-block;
            margin-top: 1rem;
        }

        /* Các input, textarea, và file input trong block */
        .custom-block label {
            font-size: 1.125rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
            display: block;
        }

        .custom-block input[type="text"],
        .custom-block textarea,
        .custom-block input[type="file"] {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #cbd5e0;
            border-radius: 0.375rem;
            margin-bottom: 1rem;
        }

        /* Margin cho footer của block */
        .custom-block-footer {
            margin-top: 0.5rem;
        }

        /* Responsive: Nếu màn hình nhỏ, điều chỉnh flex */
        @media (max-width: 768px) {
            .custom-flex {
                flex-direction: column;
                align-items: flex-start;
            }

            .custom-delete-btn {
                margin-top: 0.5rem;
            }
        }

        /* custom-style.css */

        /* General Wrapper */
        .custom-wrapper {
            font-family: 'Arial', sans-serif;
            color: #333;
            background-color: #fefefe;
            padding: 1rem;
        }

        /* Form Container */
        .custom-form-container {
            max-width: 1024px;
            margin: 1.5rem auto;
            padding: 1.5rem;
            border: 4px dashed #48bb78;
            /* Màu xanh lá nhẹ */
            border-radius: 0.5rem;
            background-color: #f9f9f9;
        }

        /* Labels */
        .custom-form-container label {
            font-size: 1.125rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
            display: block;
        }

        /* Input Fields & Textarea */
        .custom-form-container input[type="text"],
        .custom-form-container textarea,
        .custom-form-container input[type="file"] {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ccc;
            border-radius: 0.375rem;
            margin-bottom: 1rem;
            background-color: #fff;
        }

        /* Buttons */
        .custom-btn {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            text-align: center;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
            border: none;
        }

        .custom-btn-green {
            background-color: #48bb78;
            color: #fff;
        }

        .custom-btn-blue {
            background-color: #4299e1;
            color: #fff;
        }

        .custom-btn-red {
            background-color: #f56565;
            color: #fff;
        }

        /* Product Preview Styles */
        .custom-product-image {
            width: 160px;
            margin-bottom: 1rem;
            border-radius: 0.375rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .custom-video {
            width: 100%;
            max-width: 500px;
            margin-bottom: 1rem;
            border-radius: 0.375rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Content Blocks Container */
        .custom-block {
            background-color: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 0.375rem;
            padding: 1rem;
            margin-bottom: 1rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        /* Flex Container for Block Content and Delete Button */
        .custom-block-flex {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        /* Content Wrapper */
        .custom-content-wrapper {
            flex-grow: 1;
        }

        /* Delete Button (nằm cùng dòng, bên phải) */
        .custom-delete-btn {
            margin-left: 1rem;
        }

        .custom-product-image,
        .custom-video {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        /* Block Footer (nút + bên dưới block) */
        .custom-block-footer {
            margin-top: 0.5rem;
            text-align: center;
            /* Căn giữa nội dung bên trong */
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .custom-block-flex {
                flex-direction: column;
                align-items: flex-start;
            }

            .custom-delete-btn {
                margin-left: 0;
                margin-top: 0.5rem;
            }
        }
    </style>
</head>

<body class="bg-white-100 ">
    <button onclick="window.history.back();"
        style="padding-bottom:5px ;margin-bottom: 10px ;position: fixed; top: 20px; left: 20px; width: 40px; height: 40px; background-color: #007bff; border: none; border-radius: 50%; color: #fff; font-size: 20px; cursor: pointer;">
        &larr;
    </button>


    <div class="wrapper">


        <div class="custom-form-container">
            <form action="../database/update_new.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_product" value="<?php echo $product_row['post_id']; ?>">

                <div class="mb-4">
                    <label class="custom-label" for="product_name">Tiêu đề:</label>
                    <input type="text" name="product_name" id="product_name"
                        value="<?php echo htmlspecialchars($product_row['title']); ?>" required>
                </div>

                <div class="mb-4">
                    <label class="custom-label" for="description">Slug:</label>
                    <textarea name="description" id="description" rows="4"
                        required><?php echo htmlspecialchars($product_row['slug']); ?></textarea>
                </div>

                <div class="mb-4">
                    <label class="custom-label">Hình ảnh trang tin:</label>
                    <?php if (!empty($product_row['new_images'])): ?>
                        <img src="<?php echo $product_row['new_images']; ?>" alt="Hình ảnh sản phẩm"
                            class="custom-product-image">
                    <?php endif; ?>
                    <input type="file" name="image" accept="image/*">
                </div>


                <div class="mb-3">
                    <label class="form-label">Trạng thái</label>

                    <div class="form-check form-check-inline" style="display: flex;gap:10px;">
                        <input class="form-check-input" type="radio" name="status" id="da-dang" value="da-dang" <?php echo ($product_row['status'] == 'da-dang') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="da-dang">Đã đăng</label>
                    </div>

                    <div class="form-check form-check-inline" style="display: flex;gap:10px;">
                        <input class="form-check-input" type="radio" name="status" id="ban-nhap" value="ban-nhap" <?php echo ($product_row['status'] == 'ban-nhap') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="ban-nhap">Nháp</label>
                    </div>

                    <div class="form-check form-check-inline" style="display: flex;gap:10px;">
                        <input class="form-check-input" type="radio" name="status" id="khong-hien-thi"
                            value="khong-hien-thi" <?php echo ($product_row['status'] == 'khong-hien-thi') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="khong-hien-thi">Không hiển thị</label>
                    </div>
                </div>




                <button type="submit" class="custom-btn custom-btn-green">Cập nhật sản phẩm</button>
            </form>
        </div>




        <div class="custom-form-container">
            <fieldset class="border-4 p-5">
                <form action="../database/save_new.php" method="POST" enctype="multipart/form-data"
                    id="contentForm">
                    <input type="hidden" name="id_product" value="<?php echo $id; ?>">

                    <div id="blocksContainer">
                        <?php
                        $sql = "SELECT * FROM new_description WHERE post_id  = $id ORDER BY position ASC, id ASC";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            $contentId = $row['id'];
                            echo "<div class='custom-block existing-block mb-4 p-4 border' data-type='existing' id='block_$contentId'>";
                            // Hidden inputs dùng để UPDATE
                            echo "<input type='hidden' name='content_id[]' value='$contentId'>";
                            echo "<input type='hidden' class='order-input' name='order[]' value='" . $row['position'] . "'>";
                            // Hidden input đánh dấu xoá: 0 = không xoá, 1 = xoá
                            echo "<input type='hidden' class='delete-flag' name='delete_existing[]' value='0'>";

                            // Flex container cho nội dung và nút xoá
                            echo "<div class='custom-flex'>";
                            echo "  <div class='custom-content'>";
                            if ($row['type'] == 'text') {
                                echo "<label>Nội dung văn bản:</label>";
                                echo "<textarea name='content[]' class='border p-2 w-full'>" . htmlspecialchars($row['content']) . "</textarea>";
                                echo "<input type='hidden' name='type[]' value='text'>";
                            } elseif ($row['type'] == 'title') {
                                echo "<label>Tiêu đề:</label>";
                                echo "<input type='text' name='content[]' class='border p-2 w-full' value='" . htmlspecialchars($row['content']) . "'>";
                                echo "<input type='hidden' name='type[]' value='title'>";
                            } elseif ($row['type'] == 'image') {
                                echo "<label>Hình ảnh:</label>";
                                echo "<img src='" . $row['content'] . "' alt='Hình ảnh' class='mt-3 mx-auto block rounded-lg shadow w-40'>";
                                // File upload với key là content id
                                echo "<input type='file' name='image[" . $contentId . "]' accept='image/*' class='border p-2 w-full'>";
                                // Nếu không upload file mới thì giữ lại đường dẫn cũ
                                echo "<input type='hidden' name='content[]' value='" . $row['content'] . "'>";
                                echo "<input type='hidden' name='type[]' value='image'>";
                            }
                            echo "  </div>";  // End custom-content
                        
                            // Nút "Xoá" nằm bên phải cùng dòng
                            echo "  <div>";
                            echo "    <button type='button' class='custom-delete-btn' onclick='deleteExistingBlock(this)'>Xoá</button>";
                            echo "  </div>";
                            echo "</div>";  // End custom-flex
                        
                            // Footer: Nút "+" nằm bên dưới block
                            echo "<div class='custom-block-footer'>";
                            echo "  <button type='button' class='custom-add-btn' onclick='addNewBlock(this)'>+</button>";
                            echo "</div>";

                            echo "</div>";  // End custom-block
                        }
                        ?>
                    </div><!-- end blocksContainer -->

                    <!-- Nút thêm block mới ở cuối form -->
                    <button type="button" id="addBlockBtn" class="custom-add-btn-main" onclick="addNewBlock(this)">+
                        Thêm ô mới</button>

                    <button type="submit" class="custom-btn custom-btn-green">Lưu dữ liệu</button>
                </form>
            </fieldset>
        </div>






    </div>
</body>
<script>
    // Biến đếm cho các block mới (để đặt tên input)
    let newBlockCount = 0;

    // Hàm chèn block mới ngay sau nút triggerButton
    function addNewBlock(triggerButton) {
        newBlockCount++;
        // Tạo div block mới với lớp 'custom-block' và data-type 'new'
        const newDiv = document.createElement('div');
        newDiv.className = "custom-block new-block mb-4 p-4 border";
        newDiv.setAttribute("data-type", "new");

        // Nội dung HTML của block mới, bao gồm:
        // - Hidden input order (sẽ được cập nhật lại trước khi submit)
        // - Select chọn kiểu nội dung và hidden input new_type
        // - Nội dung thay đổi theo kiểu được chọn (mặc định là text)
        // - Nút xóa block mới
        newDiv.innerHTML = `
            <input type="hidden" class="order-input" name="order_new[]" value="0">
            <div class="flex items-center mb-2">
              <label class="block text-lg font-bold mr-2">Chọn kiểu nội dung:</label>
              <select name="new_content_type[]" onchange="changeNewBlockType(this, ${newBlockCount})" class="border p-2">
                <option value="text">Văn bản</option>
                <option value="title">Tiêu đề</option>
                <option value="image">Hình ảnh</option>
              </select>
              <input type="hidden" name="new_type[]" value="text">
              <button type="button" class="remove-block ml-2 text-red-600" onclick="removeBlock(this)">Xoá</button>
            </div>
            <div id="newBlockContent_${newBlockCount}">
              <label class="block text-lg font-bold">Nội dung văn bản:</label>
              <textarea name="new_content[]" class="border p-2 w-full"></textarea>
            </div>
        `;

        // Chèn block mới ngay sau nút được nhấn
        triggerButton.insertAdjacentElement('afterend', newDiv);
    }

    // Hàm thay đổi nội dung hiển thị theo kiểu block mới
    function changeNewBlockType(selectObj, blockId) {
        const selectedType = selectObj.value;
        // Cập nhật hidden input new_type[] (để biết kiểu block mới)
        selectObj.parentNode.querySelector("input[name='new_type[]']").value = selectedType;
        const contentDiv = document.getElementById(`newBlockContent_${blockId}`);

        let html = '';
        if (selectedType === 'text') {
            html = `<label class="block text-lg font-bold">Nội dung văn bản:</label>
                    <textarea name="new_content[]" class="border p-2 w-full"></textarea>`;
        } else if (selectedType === 'title') {
            html = `<label class="block text-lg font-bold text-blue-500">Tiêu đề:</label>
                    <input type="text" name="new_content[]" class="border p-2 w-full">`;
        } else if (selectedType === 'image') {
            html = `<label class="block text-lg font-bold">Hình ảnh:</label>
                    <input type="file" name="new_image[]" accept="image/*" class="border p-2 w-full">`;
        }
        contentDiv.innerHTML = html;
    }

    // Hàm xóa một block mới (chỉ xoá khỏi form)
    function removeBlock(button) {
        const blockDiv = button.closest('.custom-block');
        blockDiv.remove();
    }

    // Hàm đánh dấu xoá block đã có (existing block)
    function deleteExistingBlock(button) {
        // Lấy div block chứa nút được nhấn (sử dụng lớp custom-block)
        const blockDiv = button.closest('.custom-block');
        // Tìm hidden input đánh dấu xoá và gán giá trị "1"
        const deleteFlag = blockDiv.querySelector('.delete-flag');
        if (deleteFlag) {
            deleteFlag.value = "1";
        }
        // Ẩn block đi (vẫn còn trong form để gửi dữ liệu)
        blockDiv.style.display = "none";
    }

    // Trước khi submit, cập nhật thứ tự (order) cho tất cả các block theo thứ tự xuất hiện trong DOM.
    document.getElementById('contentForm').addEventListener('submit', function (e) {
        // Lấy tất cả các block (cũ và mới) trong container (với cả block mới chèn sau nút addBlockBtn)
        const blocks = document.querySelectorAll('#blocksContainer .custom-block, #addBlockBtn ~ .custom-block');
        let order = 1;
        blocks.forEach(function (block) {
            let orderInput = block.querySelector('.order-input');
            if (orderInput) {
                orderInput.value = order;
            }
            order++;
        });
    });
</script>