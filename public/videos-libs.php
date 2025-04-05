<?php
session_start();
include '../includes/database.php';
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="./assets/images/nhat-kim-logo-no-slogan12.png" sizes="32x32" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/videos-libs.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <title>Video</title>
</head>

<body>
    <?php include '../includes/header.php'; ?>

    <div class="wrapper">
        <!-- video Section -->
        <section class="about-section">
            <div class="about-container">
                <div class="about-content">
                    <h1>Thư viện video Nhất Kim Window</h1>
                    <p>
                        Khám phá các video giới thiệu sản phẩm, quy trình thi công và những dự án thực tế của Nhất Kim
                        Window.
                        Chúng tôi mang đến những hình ảnh chân thực về chất lượng, độ bền và vẻ đẹp của các công trình
                        nhôm kính do chúng tôi thực hiện.
                    </p>
                    <a class="about-button" href="#">Subcribe YouTube</a>
                </div>
                <div class="about-video">
                    <iframe src="https://www.youtube.com/embed/o0Q_Xd0jihk?start=29" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>
        </section>

        <section class="video-filter">
            <h1>VIDEO CỦA CHÚNG TÔI</h1>
            <div class="video-search-comp">
                <input type="text" id="searchProduct" class="form-control" placeholder="Tìm kiếm video">
                 
                <button class="btn btn-primary btn-search" id="searchBtn">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
        </section>

        <!-- Nút lọc video -->
        <div style="text-align: center; margin-bottom: 20px;">
            <button id="verticalBtn"
                style="padding:10px 20px; margin-right:10px;border: 2px solid var(--primary-color);">Video dọc</button>
            <button id="horizontalBtn" style="padding:10px 20px;border: 2px solid var(--primary-color);">Video
                ngang</button>
        </div>

        <section class="video-grid">
            <?php
            // Giả sử bạn đã có kết nối CSDL trong biến $conn
            
            // Lấy tất cả video có trạng thái published
            $sql = "SELECT * FROM videos WHERE status = 'published'";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Lấy dữ liệu từ bảng
                    $title = htmlspecialchars($row['title']);
                    $video_url = $row['video_url'];
                    $product_id = $row['loai_video'];  // 1: Facebook, 2: YouTube, 3: TikTok
            
                    if ($product_id == 2) {
                        // YouTube: chuyển đổi URL nếu cần
                        if (strpos($video_url, 'watch?v=') !== false) {
                            $video_url = str_replace('watch?v=', 'embed/', $video_url);
                        }

                        echo '<div class="video-item youtube-item" data-orientation="horizontal" data-category="vach-ngan">';
                        echo '    <h3>' . $title . '</h3>';
                        echo '    <iframe src="' . $video_url . '" title="YouTube video player" frameborder="0"';
                        echo '        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"';
                        echo '        allowfullscreen>';
                        echo '    </iframe>';
                        echo '</div>';


                    } elseif ($product_id == 3) {
                        // TikTok: giao diện dọc
                        preg_match('/video\/(\d+)/', $video_url, $matches);
                        $video_id = isset($matches[1]) ? $matches[1] : '';
                        echo '<div class="video-item vertical-item" data-orientation="vertical" data-category="cua-kinh">';
                        echo '    <h3>' . $title . '</h3>';
                        echo '    <blockquote class="tiktok-embed" cite="' . $video_url . '" data-video-id="' . $video_id . '" style="max-width: 605px; min-width: 325px;">';
                        echo '        <section>';
                        echo '            <a target="_blank" title="@cuadephaiduong" href="https://www.tiktok.com/@cuadephaiduong">@cuadephaiduong</a>';
                        echo '            <a target="_blank" title="♬ original sound - TikTok" href="https://www.tiktok.com/music/original-sound-' . $video_id . '">♬ original sound</a>';
                        echo '        </section>';
                        echo '    </blockquote>';
                        echo '</div>';
                    } elseif ($product_id == 1) {
                        if (strpos($video_url, '/reels/') !== false) {
                            echo '<div class="video-item" data-category="vach-ngan" style="text-align: center;">';
                            echo '    <h3>' . $title . '</h3>';
                            echo '    <a href="' . $video_url . '" target="_blank" title="' . $title . '">';
                            echo '        <img src="path/to/thumbnail.jpg" alt="' . $title . '" style="width:100%;">';
                            echo '    </a>';
                            echo '</div>';
                        } else {
                            // Video Facebook thông thường
                            echo '<div class="video-item vertical-item" data-orientation="vertical" data-category="vach-ngan" style="text-align: center;">';
                            echo '    <h3 style="padding-bottom: 20px;">' . $title . '</h3>';
                            echo '    <iframe src="https://www.facebook.com/plugins/video.php?href=' . urlencode($video_url) . '"';
                            echo '            style="border:none; overflow:hidden; width:100%; height:700px; margin: 0 auto; display: block;"';
                            echo '            scrolling="no" frameborder="0" allowfullscreen="true">';
                            echo '    </iframe>';
                            echo '</div>';
                        }

                    }
                }
                // Chỉ nhúng script TikTok một lần cho toàn bộ trang
                echo '<script async src="https://www.tiktok.com/embed.js"></script>';
            } else {
                echo 'Không có video nào.';
            }
            ?>
        </section>


        <div class="pagination">
            <button class="prev-btn">«</button>
            <div class="page-numbers">
                <button class="page-btn active">1</button>
                <button class="page-btn">2</button>
                <button class="page-btn">3</button>
                <button class="page-btn">4</button>
            </div>
            <button class="next-btn">»</button>
        </div>
    </div>

    <?php include '../includes/footer.php'; ?>
</body>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const itemsPerPage = 6; // Số video mỗi trang
    // Lấy tất cả các phần tử video
    const allItems = Array.from(document.querySelectorAll(".video-item"));
    let filteredItems = [];  // Danh sách video sau khi lọc
    let currentPage = 1;

    // Các phần tử phân trang
    const paginationContainer = document.querySelector(".page-numbers");
    const prevButton = document.querySelector(".prev-btn");
    const nextButton = document.querySelector(".next-btn");

    // Hàm cập nhật trang hiển thị dựa trên filteredItems
    function updatePage() {
        // Ẩn tất cả video
        allItems.forEach(item => item.style.display = "none");

        const start = (currentPage - 1) * itemsPerPage;
        const end = currentPage * itemsPerPage;
        // Hiển thị các phần tử thuộc trang hiện tại trong danh sách đã lọc
        filteredItems.slice(start, end).forEach(item => {
            item.style.display = "block";
        });

        // Cập nhật active cho các nút phân trang
        document.querySelectorAll(".page-btn").forEach((btn, index) => {
            btn.classList.toggle("active", index + 1 === currentPage);
        });

        const totalPages = Math.ceil(filteredItems.length / itemsPerPage);
        prevButton.disabled = (currentPage === 1);
        nextButton.disabled = (currentPage === totalPages || totalPages === 0);
    }

    // Hàm tạo các nút phân trang dựa trên filteredItems
    function renderPagination() {
        paginationContainer.innerHTML = "";
        const totalPages = Math.ceil(filteredItems.length / itemsPerPage);
        for (let i = 1; i <= totalPages; i++) {
            const pageBtn = document.createElement("button");
            pageBtn.classList.add("page-btn");
            pageBtn.textContent = i;
            if (i === currentPage) pageBtn.classList.add("active");

            pageBtn.addEventListener("click", function () {
                currentPage = i;
                updatePage();
            });

            paginationContainer.appendChild(pageBtn);
        }
    }

    // Hàm lọc video theo hướng (vertical hoặc horizontal)
    function filterByOrientation(orientation) {
        filteredItems = allItems.filter(item => item.getAttribute("data-orientation") === orientation);
        currentPage = 1; // Reset trang về 1 sau khi lọc
        renderPagination();
        updatePage();
    }

    // Gán sự kiện cho nút "Chiều dọc"
    document.getElementById('verticalBtn').addEventListener('click', function () {
        filterByOrientation("vertical");
    });

    // Gán sự kiện cho nút "Chiều ngang"
    document.getElementById('horizontalBtn').addEventListener('click', function () {
        filterByOrientation("horizontal");
    });

    // Sự kiện cho nút Prev, Next của phân trang
    prevButton.addEventListener("click", function () {
        if (currentPage > 1) {
            currentPage--;
            updatePage();
        }
    });

    nextButton.addEventListener("click", function () {
        const totalPages = Math.ceil(filteredItems.length / itemsPerPage);
        if (currentPage < totalPages) {
            currentPage++;
            updatePage();
        }
    });

    // Khi trang load, tự động lọc theo chiều ngang (mặc định)
    filterByOrientation("horizontal");
});
</script>


</html>