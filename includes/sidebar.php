<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Menu</title>
    <link rel="stylesheet" href="../admin/assets/css/sidebar.css">
    <link rel="stylesheet" href="../admin/assets/css/admin-base.css">
    <!-- Linking Google fonts for icons -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0">
</head>

<body>
    <aside class="sidebar">
        <!-- Sidebar header -->
        <header class="sidebar-header">
            <a href="#" class="header-logo">
                <img src="../public/assets/images/nhat-kim-logo.png" alt="avatar">
            </a>
            <button class="toggler sidebar-toggler">
                <span class="material-symbols-rounded">chevron_left</span>
            </button>
            <button class="toggler menu-toggler">
                <span class="material-symbols-rounded">menu</span>
            </button>
        </header>
        <nav class="sidebar-nav">
            <!-- Primary top nav -->
            <ul class="nav-list primary-nav">
                <li class="nav-item">
                    <a href="../admin/admin.php" class="nav-link">
                        <span class="nav-icon material-symbols-rounded">dashboard</span>
                        <span class="nav-label">Bảng điều khiển</span>
                    </a>
                    <span class="nav-tooltip">Dashboard</span>
                </li>
                <li class="nav-item">
                    <a href="../admin/products-admin.php" class="nav-link">
                        <span class="nav-icon material-symbols-rounded">inventory_2</span>
                        <span class="nav-label">Quản lý sản phẩm</span>
                    </a>
                    <span class="nav-tooltip">Quản lý sản phẩm</span>
                </li>
                <li class="nav-item">
                    <a href="../admin/videos.php" class="nav-link">
                        <span class="nav-icon material-symbols-rounded">video_library</span>
                        <span class="nav-label">Quản lý video</span>
                    </a>
                    <span class="nav-tooltip">Quản lý video</span>
                </li>
                <li class="nav-item">
                    <a href="../admin/contact-request.php" class="nav-link">
                        <span class="nav-icon material-symbols-rounded">assignment</span>
                        <span class="nav-label">Quản lý yêu cầu</span>
                    </a>
                    <span class="nav-tooltip">Quản lý yêu cầu</span>
                </li>
                <li class="nav-item">
                    <a href="../admin/news-admin.php" class="nav-link">
                        <span class="nav-icon material-symbols-rounded">newspaper</span>
                        <span class="nav-label">Quản lý tin tức</span>
                    </a>
                    <span class="nav-tooltip">Quản lý tin tức</span>
                </li>
                 
            </ul>

            <!-- Secondary bottom nav -->
            <ul class="nav-list secondary-nav">
                <li class="nav-item">
                    <a href="../admin/profile.php" class="nav-link">
                        <span class="nav-icon material-symbols-rounded">account_circle</span>
                        <span class="nav-label">Hồ sơ</span>
                    </a>
                    <span class="nav-tooltip">Profile</span>
                </li>
                <li class="nav-item">
                    <a href="../admin/logout.php" class="nav-link"
                        onclick="return confirm('Bạn có chắc chắn muốn đăng xuất?');">
                        <span class="nav-icon material-symbols-rounded">logout</span>
                        <span class="nav-label">Đăng xuất</span>
                    </a>
                    <span class="nav-tooltip">Logout</span>
                </li>
            </ul>
        </nav>
    </aside>
</body>
<script>
    const sidebar = document.querySelector(".sidebar");
    const sidebarToggler = document.querySelector(".sidebar-toggler");
    const menuToggler = document.querySelector(".menu-toggler");

    // Ensure these heights match the CSS sidebar height values
    let collapsedSidebarHeight = "56px"; // Height in mobile view (collapsed)
    let fullSidebarHeight = "100vh"; // Height in larger screen

    // Toggle sidebar's collapsed state
    sidebarToggler.addEventListener("click", () => {
        sidebar.classList.toggle("collapsed");
    });

    // Update sidebar height and menu toggle text
    const toggleMenu = (isMenuActive) => {
        sidebar.style.height = isMenuActive ? `${sidebar.scrollHeight}px` : collapsedSidebarHeight;
        menuToggler.querySelector("span").innerText = isMenuActive ? "close" : "menu";
    }

    // Toggle menu-active class and adjust height
    menuToggler.addEventListener("click", () => {
        toggleMenu(sidebar.classList.toggle("menu-active"));
    });

    // (Optional code): Adjust sidebar height on window resize
    window.addEventListener("resize", () => {
        if (window.innerWidth >= 1024) {
            sidebar.style.height = fullSidebarHeight;
        } else {
            sidebar.classList.remove("collapsed");
            sidebar.style.height = "auto";
            toggleMenu(sidebar.classList.contains("menu-active"));
        }
    });

    document.addEventListener("DOMContentLoaded", () => {
        const links = document.querySelectorAll(".nav-link");
        const currentPath = window.location.pathname; // Lấy đường dẫn hiện tại

        links.forEach(link => {
            const linkPath = new URL(link.href, window.location.origin).pathname; // Chuyển href thành pathname chuẩn

            if (currentPath.includes("products-admin.php") || currentPath.includes("add-product-admin.php") || currentPath.includes("update-product-admin.php")) {
                if (linkPath.includes("products-admin.php")) {
                    link.classList.add("active");
                }
            } 
            else if (currentPath.includes("products-admin.php") || currentPath.includes("add-videos.php") || currentPath.includes("update-videos.php")) {
                if (linkPath.includes("videos.php")) {
                    link.classList.add("active");
                }
            } 
            else if (currentPath.includes("products-admin.php") || currentPath.includes("contact-request-details.php")) {
                if (linkPath.includes("contact-request.php")) {
                    link.classList.add("active");
                }
            } 
            else if (currentPath.includes("products-admin.php") || currentPath.includes("add-news-admin.php") || currentPath.includes("update-news-admin.php")) {
                if (linkPath.includes("news-admin.php")) {
                    link.classList.add("active");
                }
            } 
            else if (linkPath === currentPath) {
                link.classList.add("active");
            } 
            else {
                link.classList.remove("active"); // Xóa active khỏi các mục khác
            }
        });
    });
</script>

</html>