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
    <link rel="stylesheet" href="./assets/css/contact-request.css">
    <link rel="stylesheet" href="./assets/css/admin-base.css">
    <link rel="stylesheet" href="./assets/css/admin-responsive.css">
    <title>Admin Panel</title>
</head>

<body>
    <div class="wrap">
        <?php include '../includes/sidebar.php'; ?>
        <div class="wrapper">
            <div class="container mt-4">
                <h2 class="mb-3" style="font-weight: 600; color: var(--primary-color);">Danh sách khách hàng yêu cầu
                </h2>
                <!-- Thanh tìm kiếm và lọc -->
                <div class="d-flex justify-content-between align-items-center mb-3 custom-column">
                    <div class="d-flex gap-2 inp">
                        <input type="text" id="searchInput" class="form-control"
                            placeholder="Tìm theo tên, email hoặc số điện thoại">

                        <button class="btn btn-primary btn-search" id="searchBtn">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                    <div class="d-flex">
                        <a href="./delete-contact-request.php" class="btn btn-danger del-btn">Xóa</a>
                    </div>
                </div>

                <!-- Bảng dữ liệu -->
                <div class="table-responsive">
                    <table class="table table-light table-hover align-middle table-custom">
                        <thead>
                            <tr>
                                <th><input type="checkbox"></th>
                                <th>Tên khách hàng</th>
                                <th>Điện thoại</th>

                                <th>Địa chỉ</th>
                                <th>Thời gian</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM inquiries ORDER BY created_at DESC";
                            $result = $conn->query($sql);
                            if ($result && $result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $inquiry_id = $row['inquiry_id'];
                                    $name = htmlspecialchars($row['name']);
                                    $phone = htmlspecialchars($row['phone']);
                                    $diachi = htmlspecialchars($row['diachi']);
                                    // Định dạng ngày gửi: Ví dụ "Nov 12, 10:45 PM"
                                    $created_at = date("M d, h:i A", strtotime($row['created_at']));

                                    echo '<tr>';
                                    echo '  <td><input type="checkbox" value="' . $inquiry_id . '"></td>';
                                    echo '  <td>' . $name . '</td>';
                                    echo '  <td>' . $phone . '</td>';
                                    echo '  <td>' . $diachi . '</td>';
                                    echo '  <td>' . $created_at . '</td>';
                                    echo '  <td>';
                                    // Nút xem chi tiết hoặc cập nhật (bạn cần định nghĩa hàm redirectToUpdate hoặc chuyển hướng tới trang update)
                                    echo '      <button class="btn btn-outline-primary" onclick="redirectToUpdate(' . $inquiry_id . ')">';
                                    echo '          <i class="material-symbols-rounded edit-bnt">visibility</i>';
                                    echo '      </button> ';
                                    // Nút xóa: Nếu xác nhận, chuyển hướng tới file xóa (deleteInquiry.php) với id tương ứng
                                    echo '      <button class="btn btn-outline-danger delete-btn" onclick="if(confirm(\'Bạn có chắc chắn muốn xóa yêu cầu này?\')) { location.href=\'deleteInquiry.php?id=' . $inquiry_id . '\'; }">';
                                    echo '          <i class="material-symbols-rounded delete-icon">delete</i>';
                                    echo '      </button>';
                                    echo '  </td>';
                                    echo '</tr>';
                                }
                            } else {
                                echo '<tr><td colspan="6">Không có yêu cầu nào.</td></tr>';
                            }
                            $conn->close();
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
        window.location.href = `contact-request-details.php?id=${productId}`;
    }

    document.addEventListener("DOMContentLoaded", function () {

        const itemsPerPage = 8;
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