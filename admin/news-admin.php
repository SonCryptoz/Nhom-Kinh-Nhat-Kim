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
    <link rel="stylesheet" href="./assets/css/news-admin.css">
    <link rel="stylesheet" href="./assets/css/admin-base.css">
    <link rel="stylesheet" href="./assets/css/admin-responsive.css">
    <title>Admin Panel</title>
</head>

<body>
    <div class="wrap">
        <?php include '../includes/sidebar.php'; ?>
        <div class="wrapper">
            <div class="container mt-4">
                <h2 class="mb-3" style="font-weight: 600; color: var(--primary-color);">Danh sách tin tức hoạt động
                </h2>
                <!-- Thanh tìm kiếm và lọc -->
                <div class="d-flex justify-content-between align-items-center mb-3 custom-column">
                    <div class="d-flex gap-2 inp">
                        <input type="text" id="searchInput" class="form-control" placeholder="Tìm theo tiêu đề, slug">
                        <button class="btn btn-primary btn-search" id="searchBtn">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="./add-news-admin.php" class="btn btn-primary add-btn">+ Thêm bài viết</a>
                    </div>
                </div>

                <!-- Bảng dữ liệu -->
                <div class="row">
                    <?php
                    // Kết nối đến CSDL (giả sử $conn đã có sẵn)
                    $sql = "SELECT * FROM news ORDER BY created_at DESC";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            // Xác định màu của badge theo trạng thái bài viết
                            $badgeClass = '';
                            $statusText = '';
                            switch ($row['status']) {
                                case 'da-dang':
                                    $badgeClass = 'bg-success';
                                    $statusText = 'Đã đăng';
                                    break;
                                case 'ban-nhap':
                                    $badgeClass = 'bg-warning';
                                    $statusText = 'Bản nháp';
                                    break;
                                case 'khong-hien-thi':
                                    $badgeClass = 'bg-secondary';
                                    $statusText = 'Không hiển thị';
                                    break;
                                default:
                                    $badgeClass = 'bg-info';
                                    $statusText = $row['status'];
                                    break;
                            }
                            ?>
                            <div class="col-md-4 cad-item">
                                <div class="card shadow-sm d-flex flex-column" style="height: 750px;">
                                    <!-- Hình ảnh -->
                                    <img src="<?php echo htmlspecialchars($row['new_images']); ?>"
                                        class="card-img-top" alt="Hình ảnh" style="height: 250px; object-fit: cover;">

                                    <!-- Nội dung card -->
                                    <div class="card-body d-flex flex-column h-100">
                                        <h5 class="card-title"><?php echo htmlspecialchars($row['title']); ?></h5>
                                        <p class="card-text"><strong>Slug:</strong>
                                            <?php echo htmlspecialchars($row['slug']); ?></p>
                                        <p class="card-text">
                                            <strong>Trạng thái:</strong>
                                            <span class="badge <?php echo $badgeClass; ?>"><?php echo $statusText; ?></span>
                                        </p>
                                        <p class="card-text">
                                            <small class="text-muted">Ngày tạo:
                                                <?php echo date('M d, H:i A', strtotime($row['created_at'])); ?></small>
                                        </p>
                                        <p class="card-text">
                                            <small class="text-muted">Cập nhật:
                                                <?php echo date('M d, H:i A', strtotime($row['updated_at'])); ?></small>
                                        </p>

                                        <!-- Nút chỉnh sửa và xóa, đẩy xuống cuối cùng -->
                                        <div class="d-flex justify-content-between mt-auto p-3">
                                            <button class="btn btn-outline-primary"
                                                onclick="redirectToUpdate(<?php echo $row['post_id']; ?>)">
                                                <i class="material-symbols-rounded edit-bnt">edit</i>
                                            </button>
                                            <button class="btn btn-outline-danger delete-btn" onclick="if(confirm('Bạn có chắc chắn muốn xóa bài viết này?')) { 
                                                    window.location.href='delete-post.php?id=<?php echo $row['post_id']; ?>'; 
                                                }">
                                                <i class="material-symbols-rounded delete-icon">delete</i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                        }
                    } else {
                        echo "<p>Không có bài viết nào.</p>";
                    }
                    ?>
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
        window.location.href = `update-news-admin.php?id=${productId}`;
    }

    document.addEventListener("DOMContentLoaded", function () {

        const itemsPerPage = 6;
        const videos = document.querySelectorAll(".cad-item");
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