<?php
 
include './includes/database.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery with Scroll Effect</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 1s ease-out, transform 1s ease-out;
        }

        .fade-in.show {
            opacity: 1;
            transform: translateY(0);
        }

        .product-box-image {
            border-radius: 8px;
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        /* Định dạng cho tên sản phẩm */
        .product-box-name {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container mx-auto py-8">
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <?php
            // Kết nối đến CSDL (giả sử $conn đã có sẵn)
            $sql = "SELECT * FROM products WHERE category_id=2  ORDER BY product_id DESC LIMIT 4";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="col-inner fade-in product-box"
                        style="background-color: #bde1e175; padding: 15px; border-radius: 10px;">
                        <a class="image-lightbox lightbox-gallery"  
                            title="">
                            <div class="box has-hover gallery-box box-overlay dark">
                                <div class="box-image">
                                    <img class="w-full h-auto product-box-image"
                                        src="<?php echo htmlspecialchars($row['image_url']); ?>"
                                        alt="<?php echo htmlspecialchars($row['product_name']); ?>">
                                </div>
                                <div class="overlay fill" style="background-color: rgba(0,0,0,0.15)"></div>
                            </div>
                        </a>
                        <p class="product-box-name"><?php echo htmlspecialchars($row['product_name']); ?></p>
                    </div>
                    <?php
                }
            } else {
                echo "<p>Không có sản phẩm nào.</p>";
            }
            ?>



        </div>
    </div>



    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const elements = document.querySelectorAll(".fade-in");
            let delay = 0;

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach((entry, index) => {
                    if (entry.isIntersecting) {
                        setTimeout(() => {
                            entry.target.classList.add("show");
                        }, delay);
                        delay += 300; // Mỗi ảnh hiện lên sau ảnh trước 300ms
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.3 });

            elements.forEach(element => {
                observer.observe(element);
            });
        });

    </script>
</body>

</html>