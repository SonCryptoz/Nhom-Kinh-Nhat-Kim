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
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/products-admin.css">
    <link rel="stylesheet" href="./assets/css/admin-base.css">
    <link rel="stylesheet" href="./assets/css/admin-responsive.css">
    <title>Admin Panel</title>
</head>

<body>
    <div class="wrap">
        <?php include '../includes/sidebar.php'; ?>
        <div class="wrapper">
            <div class="container mt-4">
                <h2 class="mb-3" style="font-weight: 600; color: var(--primary-color);">Quản lý sản phẩm</h2>
                <!-- Search and Actions -->
                <div class="d-flex justify-content-between align-items-center mb-3 custom-column">
                    <div class="d-flex gap-2">
                        <input type="text" id="searchProduct" class="form-control" placeholder="Tìm kiếm sản phẩm">
                        <select class="form-select w-50">
                            <option selected>Loại</option>
                            <option value="1">Cửa kính</option>
                            <option value="2">Cửa nhôm</option>
                            <option value="3">Tay cầm cửa</option>
                        </select>
                        <button class="btn btn-primary btn-search" id="searchBtn">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="./delete-product-admin.php" class="btn btn-danger del-btn">Xóa</a>
                        <a href="./add-product-admin.php" class="btn btn-primary add-btn">+ Thêm sản phẩm</a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-light table-hover align-middle table-custom">
                        <thead>
                            <tr>
                                <th><input type="checkbox"></th>
                                <th>Ảnh sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Loại</th>
                                <th>Đánh giá</th>
                                <th>Thời gian</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Giả sử bạn đã có kết nối CSDL trong biến $conn
                            $sql = "SELECT * FROM products ORDER BY created_at DESC";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    // Nếu không có ảnh thì dùng ảnh mặc định (nếu cần)
                                    $imgSrc = !empty($row['image_url']) ? htmlspecialchars($row['image_url']) : './assets/images/default.png';
                                    // Định dạng thời gian tạo sản phẩm
                                    $created_at = date("M d, h:i A", strtotime($row['created_at']));
                                    ?>
                                    <tr>
                                        <!-- Checkbox với giá trị là product_id -->
                                        <td>
                                            <input type="checkbox" name="selected_products[]"
                                                value="<?php echo $row['product_id']; ?>">
                                        </td>
                                        <!-- Ảnh sản phẩm -->
                                        <td>
                                            <img src="<?php echo $imgSrc; ?>" alt="Image" class="me-2"
                                                style="width:50px; height:auto;">
                                        </td>
                                        <!-- Tên sản phẩm -->
                                        <td><?php echo htmlspecialchars($row['product_name']); ?></td>
                                        <!-- Danh mục -->
                                        <td><?php echo htmlspecialchars($row['category_id']); ?></td>
                                        <!-- Rating -->
                                        <td>
                                            <span class="text-warning">⭐
                                                <?php echo isset($row['rating']) ? $row['rating'] : '5.0'; ?></span>
                                        </td>
                                        <!-- Ngày tạo sản phẩm -->
                                        <td><?php echo $created_at; ?></td>
                                        <!-- Các nút hành động -->
                                        <td>
                                            <!-- Nút sửa sản phẩm -->
                                            <button class="btn btn-outline-primary"
                                                onclick="redirectToUpdate(<?php echo $row['product_id']; ?>)">
                                                <i class="material-symbols-rounded edit-bnt">edit</i>
                                            </button>
                                            <!-- Nút xóa sản phẩm -->
                                            <button class="btn btn-outline-danger delete-btn"
                                                onclick="if(confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')) { window.location.href='../admin/delete-product.php?id=<?php echo $row['product_id']; ?>'; }">
                                                <i class="material-symbols-rounded delete-icon">delete</i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo "<tr><td colspan='7'>Không có sản phẩm nào</td></tr>";
                            }
                            ?>
                        </tbody>

                    </table>
                </div>

                <div class="pagination">
                    <button class="prev-btn">«</button>
                    <div class="page-numbers">
                        <button class="page-btn active">1</button>
                    </div>
                    <button class="next-btn">»</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    function redirectToUpdate(productId) {
        window.location.href = `update-product-admin.php?id=${productId}`;
    }

    document.addEventListener("DOMContentLoaded", function () {

        const itemsPerPage = 5; // Số video mỗi trang
        const videos = document.querySelectorAll("tbody tr");
        const paginationContainer = document.querySelector(".page-numbers");
        const prevButton = document.querySelector(".prev-btn");
        const nextButton = document.querySelector(".next-btn");

        let currentPage = 1;
        let totalPages = Math.ceil(videos.length / itemsPerPage);

        function renderPagination() {
            paginationContainer.innerHTML = "";

            for (let i = 1; i <= totalPages; i++) {
                let pageBtn = document.createElement("button");
                pageBtn.classList.add("page-btn");
                pageBtn.textContent = i;
                pageBtn.dataset.page = i;
                if (i === currentPage) pageBtn.classList.add("active");

                paginationContainer.appendChild(pageBtn);
            }

            // Thêm sự kiện cho từng nút sau khi tạo
            document.querySelectorAll(".page-btn").forEach((btn) => {
                btn.addEventListener("click", function () {
                    currentPage = parseInt(this.dataset.page);
                    updatePage();
                });
            });
        }

        function updatePage() {
            videos.forEach((video, index) => {
                video.style.display = (index >= (currentPage - 1) * itemsPerPage && index < currentPage * itemsPerPage)
                    ? "table-row" // ⚡ Đúng định dạng bảng
                    : "none";
            });

            document.querySelectorAll(".page-btn").forEach((btn) => {
                btn.classList.toggle("active", parseInt(btn.dataset.page) === currentPage);
            });

            prevButton.disabled = currentPage === 1;
            nextButton.disabled = currentPage === totalPages;

            // Gọi lại renderPagination để cập nhật trạng thái active
            renderPagination();
        }

        prevButton.addEventListener("click", function () {
            if (currentPage > 1) {
                currentPage--;
                updatePage();
            }
        });

        nextButton.addEventListener("click", function () {
            if (currentPage < totalPages) {
                currentPage++;
                updatePage();
            }
        });

        // Khởi tạo phân trang
        renderPagination();
        updatePage();
    });
</script>

</html>