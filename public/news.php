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
    <link rel="stylesheet" href="./assets/css/news.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Trang tin tức</title>
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
                <div class="news-grid">
                    <?php
                    // Kết nối đến CSDL ($conn đã có sẵn)
                    $sql = "SELECT * FROM news WHERE status = 'da-dang' ORDER BY created_at DESC";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <a href="./news-details.php?id=<?php echo $row['post_id']; ?>" class="news-item">
                                <div class="news-content-image">
                                    <img src="<?php echo htmlspecialchars($row['new_images']); ?>" alt="image">
                                </div>
                                <div class="news-content-section">
                                    <h3 class="news-content-title"><?php echo htmlspecialchars($row['title']); ?></h3>
                                    <p class="news-content-description">
                                        <?php echo htmlspecialchars($row['slug']); ?>
                                    </p>
                                </div>
                            </a>
                            <?php
                        }
                    } else {
                        echo "<p>Không có tin tức nào.</p>";
                    }
                    ?>


                    <!-- Thêm các bài viết khác -->
                </div>
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
</script>

</html>