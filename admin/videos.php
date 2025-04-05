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
    <link rel="stylesheet" href="./assets/css/videos.css">
    <link rel="stylesheet" href="./assets/css/admin-base.css">
    <link rel="stylesheet" href="./assets/css/admin-responsive.css">
    <title>Admin Panel</title>
</head>

<body>
    <div class="wrap">
        <?php include '../includes/sidebar.php'; ?>
        <div class="wrapper">
            <div class="container mt-4">
                <h2 class="mb-3" style="font-weight: 600; color: var(--primary-color);">Quản lý Video</h2>
                <!-- Thanh công cụ -->
                <div class="d-flex justify-content-between align-items-center mb-3 custom-column">
                    <div class="d-flex gap-2">
                        <input type="text" id="searchVideo" class="form-control" placeholder="Tìm kiếm video">
                        <select id="filterStatus" class="form-select w-50">
                            <option value="">Trạng thái</option>
                            <option value="published">Hiển thị</option>
                            <option value="hidden">Ẩn</option>
                        </select>
                        <button class="btn btn-primary btn-search" id="searchBtn">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="./delete-videos.php" class="btn btn-danger del-btn">Xóa</a>
                        <a href="./add-videos.php" class="btn btn-primary add-btn">+ Thêm video</a>
                    </div>
                </div>

                <!-- Bảng danh sách video -->
                <div class="table-responsive">
                    <table class="table table-hover table-light align-middle table-custom">
                        <thead>
                            <tr>
                                <th><input type="checkbox"></th>

                                <th>Tiêu đề</th>
                                <th>Video loại</th>
                                <th>Video URL</th>
                                <th>Trạng thái</th>
                                <th>Sản phẩm liên quan</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Truy vấn lấy thông tin video (có thể thay WHERE theo yêu cầu)
                            $sql = "SELECT * FROM videos";
                            $result = $conn->query($sql);

                            if ($result && $result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $id = $row['id'];
                                    $title = htmlspecialchars($row['title']);
                                    $video_url = $row['video_url'];
                                    $video_loai = $row['loai_video'];
                                    if ($video_loai == 1) {
                                        $loai_text = "Facebook";
                                    } elseif ($video_loai == 2) {
                                        $loai_text = "YouTube";
                                    } elseif ($video_loai == 3) {
                                        $loai_text = "TikTok";
                                    } else {
                                        $loai_text = "N/A";
                                    }
                                    $status = $row['status']; // Ví dụ: 'published' hoặc 'hidden'
                                    $product_link = isset($row['product_link']) ? htmlspecialchars($row['product_link']) : 'Không có sản phẩm liên quan';

                                    // Nếu có trường thumbnail, dùng nó, ngược lại dùng ảnh mặc định
                            

                                    // Xác định badge trạng thái
                                    $statusBadge = ($status === 'published')
                                        ? '<span class="badge bg-success">Hiển thị</span>'
                                        : '<span class="badge bg-danger">Ẩn</span>';

                                    echo '<tr>';
                                    echo '  <td><input type="checkbox" value="' . $id . '"></td>';

                                    echo '  <td>' . $title . '</td>';
                                    echo '  <td>' . $loai_text . '</td>';
                                    echo '  <td><a href="' . $video_url . '" target="_blank">Xem video</a></td>';
                                    echo '  <td>' . $statusBadge . '</td>';
                                    echo '  <td>' . $product_link . '</td>';
                                    echo '  <td>';
                                    echo '      <button class="btn btn-outline-primary" onclick="redirectToUpdate(' . $id . ')">';
                                    echo '          <i class="material-symbols-rounded edit-bnt">edit</i>';
                                    echo '      </button>';
                                    echo '<button class="btn btn-outline-danger delete-btn" onclick="if(confirm(\'Bạn có chắc chắn muốn xóa video này?\')) { location.href=\'deleteVideo.php?id=' . $id . '\'; }">';
                                    echo '    <i class="material-symbols-rounded delete-icon">delete</i>';
                                    echo '</button>';
                                    
                                    echo '  </td>';
                                    echo '</tr>';
                                }
                            } else {
                                echo '<tr><td colspan="7">Không có video nào.</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>


                <!-- pagination -->
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
        window.location.href = `update-videos.php?id=${productId}`;
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