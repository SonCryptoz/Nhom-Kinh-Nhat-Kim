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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="./assets/css/admin.css">
    <link rel="stylesheet" href="./assets/css/admin-base.css">
    <link rel="stylesheet" href="./assets/css/admin-responsive.css">
    <title>Admin Panel</title>
</head>

<body>
    <div class="wrap">
        <?php include '../includes/sidebar.php'; ?>
        <div class="wrapper">
            <div class="container my-4">
                <div class="row">
                    <!-- Welcome Section -->
                    <div class="col-12">
                        <div class="p-4 bg-primary text-white rounded">
                            <h2>Welcome back, <?php echo htmlspecialchars($name) ?>!</h2>
                            <p>Chào mừng bạn quay trở lại hệ thống quản trị.</p>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <!-- Left: Device Type Chart -->
                    <div class="col-md-6 d-flex">
                        <div class="card custom-card p-3 flex-fill">
                            <h5>Loại thiết bị sử dụng</h5>
                            <canvas id="deviceTypeChart"></canvas>
                        </div>
                    </div>

                    <!-- Right: Total Views & Visitors Growth -->
                    <div class="col-md-6 d-flex flex-column gap-4 mt4">
                        <div class="card custom-card p-3">
                            <h5>Tổng số lượt mọi người truy cập</h5>
                            <canvas id="totalViewsChart"></canvas>
                        </div>
                        <div class="card custom-card p-3">
                            <h5>Số lượng khách gửi yêu cầu</h5>
                            <canvas id="visitorsGrowthChart"></canvas>
                        </div>
                    </div>
                </div>

                <div class="row mt-4 mb-4">
                    <!-- Bottom: Total Clicks Chart -->
                    <div class="col-12">
                        <div class="card custom-card p-3">
                            <h5>Tổng số click trang</h5>
                            <canvas id="totalClicksChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    // Biểu đồ Device Type
    new Chart(document.getElementById('deviceTypeChart'), {
        type: 'doughnut',
        data: {
            labels: ['PC', 'Tablet', 'Mobile'],
            datasets: [{
                data: [50, 30, 20],
                backgroundColor: ['#6dc3ff', '#ff7172', '#8fff63']
            }]
        }
    });

    // Biểu đồ Total Clicks
    new Chart(document.getElementById('totalClicksChart'), {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
            datasets: [{
                label: 'Lượt click',
                data: [120, 190, 300, 500, 240],
                backgroundColor: '#f95dd0'
            }]
        }
    });

    // Biểu đồ Total Views
    new Chart(document.getElementById('totalViewsChart'), {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
            datasets: [{
                label: 'Lượt xem',
                data: [1500, 2000, 1800, 2500, 3000],
                backgroundColor: '#FFC107',
                fill: false
            }]
        }
    });

    // Biểu đồ Visitors Growth
    new Chart(document.getElementById('visitorsGrowthChart'), {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
            datasets: [{
                label: 'Khách',
                data: [800, 1200, 1000, 1400, 1600],
                backgroundColor: '#FF5722',
                fill: false
            }]
        }
    });
</script>

</html>