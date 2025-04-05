<?php
session_start();
include '../includes/database.php';

// Lấy ID từ URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $newsId = (int) $_GET['id'];
} else {
    die("ID không hợp lệ");
}

// Lấy tiêu đề tin tức từ bảng news
$sql = "SELECT * FROM news WHERE post_id = ? LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $newsId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

} else {
    echo "Không có dữ liệu cho tin tức.";
    exit;
}

// Lấy các mô tả liên quan từ bảng new_description (dựa trên post_id)
$sqlDesc = "SELECT * FROM new_description WHERE post_id = ? ORDER BY position ASC";
$stmtDesc = $conn->prepare($sqlDesc);
$stmtDesc->bind_param("s", $newsId); // Vì post_id được định nghĩa là varchar nên bind dưới dạng "s"
$stmtDesc->execute();
$resultDesc = $stmtDesc->get_result();



?>



<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/images/nhat-kim-logo-no-slogan12.png" sizes="32x32" type="image/png">
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/news-details.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Tin tức</title>
    <style> </style>
</head>

<body>
    <?php include '../includes/header.php'; ?>
    <div class="hotline-phone-ring-wrap">

        <div class="hotline-phone-ring">
            <div class="hotline-phone-ring-circle"></div>
            <div class="hotline-phone-ring-circle-fill"></div>
            <div class="hotline-phone-ring-img-circle">
                <a class="pps-btn-img" href="tel:0909179579">
                    <i class="fa-solid fa-phone"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Nút Zalo -->
    <div class="zalo-button">
        <a href="https://zalo.me/0909179579" target="_blank">
            <img src="./assets/images/zalo-icon.png" alt="Chat Zalo">
        </a>
    </div>
    <div class="wrapper">
        <div class="news-container">
            <div class="news-content">
                <div class="news-link">
                    <a href="./index.php">Trang chủ</a>
                    <i class="fa-solid fa-forward"></i>
                    <a href="./news.php">Tin tức hoạt động</a>
                </div>
                <div class="news-title">
                    <h1><?php echo htmlspecialchars($row['title']); ?></h1>
                    <div class="news-watch-amount">
                        <i class="fa-regular fa-eye"></i>
                        1345 lượt xem
                    </div>
                </div>
                <div class="news-description">
                    <h1 style="">
                        " <?php echo htmlspecialchars($row['slug']); ?>"
                    </h1>
                    <?php
                    if ($resultDesc->num_rows > 0) {
                        while ($descRow = $resultDesc->fetch_assoc()) {
                            switch ($descRow['type']) {
                                case 'title':
                                    // Nếu là tiêu đề, hiển thị trong thẻ <h2> căn giữa
                                    echo '<h2  >' . htmlspecialchars($descRow['content']) . '</h2>';
                                    break;
                                case 'text':
                                    // Nếu là văn bản, hiển thị trong thẻ <p> căn giữa
                                    echo '<p  >' . nl2br(htmlspecialchars($descRow['content'])) . '</p>';
                                    break;
                                case 'image':
                                    // Nếu là ảnh, hiển thị ảnh căn giữa với kích thước tối đa 500px
                                    echo '<img src="' . htmlspecialchars($descRow['content']) . '" alt="Image" style="display: block; margin: 0 auto; max-width: 500px;">';
                                    break;
                                default:
                                    // Nếu không khớp với bất kỳ loại nào, hiển thị thô (căn giữa)
                                    echo '<p  >' . htmlspecialchars($descRow['content']) . '</p>';
                            }
                        }
                    } else {
                        echo "Không có mô tả chi tiết.";
                    }
                    ?>
                    <div class="news-social-icons">
                        <a href="https://www.facebook.com/sharer.php?u=https://nhaykimwindow.vn/news-details.php?id=<?php echo urlencode($newsId); ?>"
                            data-label="Facebook"
                            onclick="window.open(this.href, this.title, 'width=500,height=500,top=300,left=300'); return false;"
                            rel="noopener noreferrer nofollow" target="_blank">
                            <i class="fa-brands fa-facebook"></i>
                        </a>

                        <a href="//twitter.com/share?url=https://https://nhaykimwindow.vn/news-details.php?id=<?php echo urlencode($newsId); ?>/"
                            onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"
                            rel="noopener noreferrer nofollow" target="_blank">
                            <i class="fa-brands fa-x-twitter"></i>
                        </a>
                        <a href="mailto:enteryour@addresshere.com?subject=Mang%20T%E1%BA%BFt%20Trung%20thu%20%C4%91%E1%BA%BFn%20v%E1%BB%9Bi%20tr%E1%BA%BB%20em%20v%C3%B9ng%20cao%20x%C3%A3%20Co%20M%E1%BA%A1&amp;body=Check%20this%20out:%20https://https://nhaykimwindow.vn/news-details.php?id=<?php echo urlencode($newsId); ?>/"
                            rel="nofollow">
                            <i class="fa-solid fa-envelope"></i>
                        </a>
                        <a href="//pinterest.com/pin/create/button/?url=https://https://nhaykimwindow.vn/news-details.php?id=<?php echo urlencode($newsId); ?>/&amp;media=https://nhaykimwindow.vn/wp-content/uploads/2023/11/z4923028802384_48e7f04fd72fb3d62fe5e1d39cde5b96-1024x768.jpg&amp;description=Mang%20T%E1%BA%BFt%20Trung%20thu%20%C4%91%E1%BA%BFn%20v%E1%BB%9Bi%20tr%E1%BA%BB%20em%20v%C3%B9ng%20cao%20x%C3%A3%20Co%20M%E1%BA%A1"
                            onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"
                            rel="noopener noreferrer nofollow" target="_blank">
                            <i class="fa-brands fa-pinterest"></i>
                        </a>
                        <a href="//www.linkedin.com/shareArticle?mini=true&amp;url=https://https://nhaykimwindow.vn/news-details.php?id=<?php echo urlencode($newsId); ?>/&amp;title=Mang%20T%E1%BA%BFt%20Trung%20thu%20%C4%91%E1%BA%BFn%20v%E1%BB%9Bi%20tr%E1%BA%BB%20em%20v%C3%B9ng%20cao%20x%C3%A3%20Co%20M%E1%BA%A1"
                            onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"
                            rel="noopener noreferrer nofollow" target="_blank">
                            <i class="fa-brands fa-linkedin"></i>
                        </a>
                    </div>
                </div>

            </div>
            <div class="news-sidebar">
                <h1>Liên hệ nhanh</h1>
                <a href="tel:0909179579">
                    <img src="./assets/images/nhat-kim-logo.png" alt="Image Contact">
                </a>
                <h1>Bài viết mới nhất</h1>
                <?php



                $sql = "SELECT * FROM news ORDER BY post_id DESC"; // Sắp xếp theo ID mới nhất trước
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo '<ul class="article-list">';
                    while ($row = $result->fetch_assoc()) {
                        // Nếu bảng có cột image, thay thế giá trị mặc định bên dưới bằng $row['image']
                        $image = htmlspecialchars($row['new_images']);

                        // Tạo đường dẫn đến trang chi tiết tin tức (thay đổi tùy theo cấu trúc dự án của bạn)
                        $link = "news-details.php?id=" . $row['post_id'];
                        ?>
                        <li>
                            <img src="<?php echo htmlspecialchars($image); ?>"
                                alt="<?php echo htmlspecialchars($row['title']); ?>">
                            <a href="<?php echo htmlspecialchars($link); ?>"><?php echo htmlspecialchars($row['title']); ?></a>
                        </li>
                        <?php
                    }
                    echo '</ul>';
                } else {
                    echo "Không có bài viết.";
                }


                ?>

            </div>
        </div>
        <div class="news-more">
            <h1>Có thể bạn quan tâm</h1>
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php
                    // Kết nối đến CSDL (giả sử $conn đã có sẵn)
                    $sql = "SELECT * FROM news WHERE status = 'da-dang' ORDER BY created_at DESC";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <a href="./news-details.php?id=<?php echo $row['post_id']; ?>">
                                <div class="swiper-slide">
                                    <img src=" <?php echo htmlspecialchars($row['new_images']); ?>" alt="Image">
                                    <div class="home-intro-news-content">
                                        <h3 class="home-intro-news-content-title">
                                            <?php echo htmlspecialchars($row['title']); ?>
                                        </h3>
                                        <p class="home-intro-news-content-desc">
                                            <?php echo htmlspecialchars($row['slug']); ?>
                                        </p>
                                        <a href="" class="home-intro-news-content-link">Xem thêm</a>
                                    </div>
                                </div>
                            </a>
                            <?php
                        }
                    } else {
                        echo "<p>Không có bài viết nào.</p>";
                    }
                    ?>



                </div>
                <!-- Nút điều hướng -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </div>
    <?php include '../includes/footer.php'; ?>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const itemsPerPage = 5; // Số baì viết mỗi trang
        const videos = document.querySelectorAll(".news-item");
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
                if (i === currentPage) pageBtn.classList.add("active");

                pageBtn.addEventListener("click", function () {
                    currentPage = i;
                    updatePage();
                });

                paginationContainer.appendChild(pageBtn);
            }
        }

        function updatePage() {
            videos.forEach((video, index) => {
                video.style.display = (index >= (currentPage - 1) * itemsPerPage && index < currentPage * itemsPerPage)
                    ? "flex"
                    : "none";
            });

            document.querySelectorAll(".page-btn").forEach((btn, index) => {
                btn.classList.toggle("active", index + 1 === currentPage);
            });

            prevButton.disabled = currentPage === 1;
            nextButton.disabled = currentPage === totalPages;
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

    document.addEventListener("DOMContentLoaded", function () {
        new Swiper(".swiper", {
            slidesPerView: 3,  // Hiển thị 3 bài viết
            spaceBetween: 30,  // Khoảng cách giữa các bài viết
            loop: true,        // Cho phép lặp vô hạn
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            grabCursor: true,
            centeredSlides: true, // focus vào giữa
            breakpoints: {
                1024: {
                    slidesPerView: 3, // Desktop hiển thị 3 slide
                },
                768: {
                    slidesPerView: 1, // Tablet hiển thị 2 slide
                },
                0: {
                    slidesPerView: 1, // Mobile hiển thị 1 slide
                }
            }
        });
    });
</script>

</html>