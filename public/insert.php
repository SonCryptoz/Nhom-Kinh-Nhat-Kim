<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import Sản Phẩm</title>
    <style>
        /* Thiết lập chung */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Khung form */
        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        h2 {
            color: #333;
        }

        /* Ô nhập */
        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        textarea {
            height: 80px;
        }

        /* Nút submit */
        button {
            background: #007bff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            transition: 0.3s;
        }

        button:hover {
            background: #0056b3;
        }

        /* Nhãn */
        label {
            font-weight: bold;
            text-align: left;
            display: block;
            margin-top: 10px;
        }

        /* File input */
        input[type="file"] {
            border: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Thêm Sản Phẩm</h2>
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <label for="product_name">Tên sản phẩm:</label>
            <input type="text" name="product_name" required>

            <label for="description">Mô tả:</label>
            <textarea name="description" required></textarea>

            <label for="image">Hình ảnh:</label>
            <input type="file" name="image" accept="image/*" required>

            <label for="video">Video:</label>
            <input type="file" name="video" accept="video/*">

            <button type="submit" name="submit">Thêm Sản Phẩm</button>
        </form>
    </div>
</body>
</html>
