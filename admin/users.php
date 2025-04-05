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
    <link rel="stylesheet" href="./assets/css/users.css">
    <link rel="stylesheet" href="./assets/css/admin-base.css">
    <link rel="stylesheet" href="./assets/css/admin-responsive.css">
    <title>Admin Panel</title>
</head>

<body>
    <div class="wrap">
        <?php include '../includes/sidebar.php'; ?>
        <div class="wrapper">
            <div class="container mt-4">
                <h2 class="mb-3" style="font-weight: 600; color: var(--primary-color);">Danh sách tài khoản người dùng
                </h2>
                <!-- Thanh tìm kiếm và lọc -->
                <div class="d-flex justify-content-between align-items-center mb-3 custom-column">
                    <div class="d-flex gap-2 inp">
                        <input type="text" id="searchInput" class="form-control" placeholder="Tìm theo tên tài khoản">
                        <button class="btn btn-primary btn-search" id="searchBtn">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="./add-users.php" class="btn btn-primary add-btn">+ Thêm tài khoản</a>
                    </div>
                </div>

                <!-- Bảng dữ liệu -->
                <div class="table-responsive">
                    <table class="table table-hover align-middle table-custom">
                        <thead class="table-dark">
                            <tr>
                                <th>Avatar</th>
                                <th>Tên tài khoản</th>
                                <th>Email</th>
                                <th>Vai trò</th>
                                <th>Ngày tạo</th>
                                <th>Ngày cập nhật</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><img src="./assets/images/nhat-kim-logo.png" alt="Avatar" class="rounded-circle" width="60"
                                        height="60"></td>
                                <td>John Doe</td>
                                <td>johndoe@example.com</td>
                                <td><span class="badge bg-success">Admin</span></td>
                                <td>Feb 14, 2025</td>
                                <td>Feb 15, 2025</td>
                                <td>
                                    <button class="btn btn-outline-danger delete-btn"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản này?');">
                                        <i class="material-symbols-rounded delete-icon">delete</i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td><img src="./assets/images/nhat-kim-logo.png" alt="Avatar" class="rounded-circle" width="60"
                                        height="60"></td>
                                <td>John Doe</td>
                                <td>johndoe@example.com</td>
                                <td><span class="badge bg-success">Admin</span></td>
                                <td>Feb 14, 2025</td>
                                <td>Feb 15, 2025</td>
                                <td>
                                    <button class="btn btn-outline-danger delete-btn"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản này?');">
                                        <i class="material-symbols-rounded delete-icon">delete</i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td><img src="./assets/images/nhat-kim-logo.png" alt="Avatar" class="rounded-circle" width="60"
                                        height="60"></td>
                                <td>John Doe</td>
                                <td>johndoe@example.com</td>
                                <td><span class="badge bg-success">Admin</span></td>
                                <td>Feb 14, 2025</td>
                                <td>Feb 15, 2025</td>
                                <td>
                                    <button class="btn btn-outline-danger delete-btn"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản này?');">
                                        <i class="material-symbols-rounded delete-icon">delete</i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td><img src="./assets/images/nhat-kim-logo.png" alt="Avatar" class="rounded-circle" width="60"
                                        height="60"></td>
                                <td>John Doe</td>
                                <td>johndoe@example.com</td>
                                <td><span class="badge bg-success">Admin</span></td>
                                <td>Feb 14, 2025</td>
                                <td>Feb 15, 2025</td>
                                <td>
                                    <button class="btn btn-outline-danger delete-btn"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản này?');">
                                        <i class="material-symbols-rounded delete-icon">delete</i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td><img src="./assets/images/nhat-kim-logo.png" alt="Avatar" class="rounded-circle" width="60"
                                        height="60"></td>
                                <td>John Doe</td>
                                <td>johndoe@example.com</td>
                                <td><span class="badge bg-success">Admin</span></td>
                                <td>Feb 14, 2025</td>
                                <td>Feb 15, 2025</td>
                                <td>
                                    <button class="btn btn-outline-danger delete-btn"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản này?');">
                                        <i class="material-symbols-rounded delete-icon">delete</i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td><img src="./assets/images/nhat-kim-logo.png" alt="Avatar" class="rounded-circle" width="60"
                                        height="60"></td>
                                <td>John Doe</td>
                                <td>johndoe@example.com</td>
                                <td><span class="badge bg-success">Admin</span></td>
                                <td>Feb 14, 2025</td>
                                <td>Feb 15, 2025</td>
                                <td>
                                    <button class="btn btn-outline-danger delete-btn"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản này?');">
                                        <i class="material-symbols-rounded delete-icon">delete</i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td><img src="./assets/images/nhat-kim-logo.png" alt="Avatar" class="rounded-circle" width="60"
                                        height="60"></td>
                                <td>John Doe</td>
                                <td>johndoe@example.com</td>
                                <td><span class="badge bg-success">Admin</span></td>
                                <td>Feb 14, 2025</td>
                                <td>Feb 15, 2025</td>
                                <td>
                                    <button class="btn btn-outline-danger delete-btn"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản này?');">
                                        <i class="material-symbols-rounded delete-icon">delete</i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td><img src="./assets/images/nhat-kim-logo.png" alt="Avatar" class="rounded-circle" width="60"
                                        height="60"></td>
                                <td>John Doe</td>
                                <td>johndoe@example.com</td>
                                <td><span class="badge bg-success">Admin</span></td>
                                <td>Feb 14, 2025</td>
                                <td>Feb 15, 2025</td>
                                <td>
                                    <button class="btn btn-outline-danger delete-btn"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản này?');">
                                        <i class="material-symbols-rounded delete-icon">delete</i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td><img src="./assets/images/nhat-kim-logo.png" alt="Avatar" class="rounded-circle" width="60"
                                        height="60"></td>
                                <td>John Doe</td>
                                <td>johndoe@example.com</td>
                                <td><span class="badge bg-success">Admin</span></td>
                                <td>Feb 14, 2025</td>
                                <td>Feb 15, 2025</td>
                                <td>
                                    <button class="btn btn-outline-danger delete-btn"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản này?');">
                                        <i class="material-symbols-rounded delete-icon">delete</i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td><img src="./assets/images/nhat-kim-logo.png" alt="Avatar" class="rounded-circle" width="60"
                                        height="60"></td>
                                <td>John Doe</td>
                                <td>johndoe@example.com</td>
                                <td><span class="badge bg-success">Admin</span></td>
                                <td>Feb 14, 2025</td>
                                <td>Feb 15, 2025</td>
                                <td>
                                    <button class="btn btn-outline-danger delete-btn"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản này?');">
                                        <i class="material-symbols-rounded delete-icon">delete</i>
                                    </button>
                                </td>
                            </tr>
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
        window.location.href = `update-news-admin.php?id=${productId}`;
    }

    document.addEventListener("DOMContentLoaded", function () {

        const itemsPerPage = 5;
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