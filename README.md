# Nhôm kính Nhất Kim

## Giới thiệu

**Nhôm kính Nhất Kim** là website giới thiệu, quảng cáo sản phẩm được xây dựng cho Công ty Cổ phần Nhôm kính Nhất Kim.

Đây là phiên bản demo được phát triển trong thời gian thực tập tại **Công ty TNHH Công nghệ và Truyền thông số Nam Anh**, nhằm mô phỏng một hệ thống web có cả phần quản trị và phần hiển thị nội dung cho người dùng.

Trong quá trình thực hiện, dự án được sử dụng để áp dụng các kiến thức về phát triển web fullstack với PHP, xử lý dữ liệu phía server, xây dựng giao diện frontend, thiết kế cơ sở dữ liệu và quản lý nội dung động.

**Demo:** http://nhatkimwindow.com

## Tính năng

* Quản lý và cập nhật nội dung thông qua Admin Panel.
* Lưu trữ và truy xuất dữ liệu từ MySQL.
* Upload và quản lý hình ảnh, file trên server.
* Phân quyền khu vực quản trị.
* Hiển thị nội dung động từ database trên website.
* Tách các thành phần dùng chung như header, footer và cấu hình thành các partial riêng.
* Xử lý URL và một số cấu hình server thông qua `.htaccess`.

## Công nghệ

* **PHP** – Xử lý backend, form và logic phía server.
* **MySQL** – Lưu trữ và quản lý dữ liệu.
* **HTML / CSS / JavaScript** – Xây dựng giao diện và các tương tác phía client.
* **Apache / .htaccess** – Cấu hình server, URL và directory.
* **Git / GitHub** – Quản lý mã nguồn và version control.

## Cấu trúc thư mục

```text
Nhom-Kinh-Nhat-Kim/
├── admin/                 # Admin panel và chức năng quản trị
├── database/              # Database scripts và SQL assets
├── includes/              # Các thành phần dùng chung và cấu hình
├── public/                # Frontend assets
├── uploads/               # File và hình ảnh được upload
├── index.php              # Entry point của website
├── nhomkinhnhatkim.sql    # Database schema và sample data
└── .htaccess              # Cấu hình Apache
```

## Chạy project

### 1. Import database

Import file `nhomkinhnhatkim.sql` vào MySQL thông qua phpMyAdmin, MySQL Workbench hoặc công cụ quản lý database tương ứng.

### 2. Cấu hình database

Cập nhật thông tin kết nối database trong file cấu hình của project:

```text
DB_HOST
DB_NAME
DB_USER
DB_PASSWORD
```

Các giá trị cụ thể phụ thuộc vào môi trường local của bạn.

### 3. Chạy trên localhost

Có thể sử dụng XAMPP, WAMP, Laragon hoặc PHP built-in server để chạy project.

Ví dụ với PHP built-in server:

```bash
php -S localhost:3000
```

Sau đó truy cập:

```text
http://localhost:3000
```

## Những gì đã học được

Thông qua dự án này, tôi có cơ hội thực hành và hiểu rõ hơn về:

* Xây dựng website với PHP thuần và xử lý request phía server.
* Xử lý form và CRUD với MySQL.
* Thiết kế và tổ chức cấu trúc database.
* Tách reusable components bằng PHP `include`.
* Upload và quản lý file trên server.
* Tổ chức cấu trúc project backend/frontend.
* Cấu hình Apache và `.htaccess`.
* Sử dụng Git và GitHub để quản lý source code.

## Lưu ý

Đây là phiên bản demo được xây dựng lại dựa trên dự án thực tế trong thời gian thực tập.

Các nghiệp vụ, dữ liệu và thông tin nội bộ của dự án thực tế không được đưa vào repository do liên quan đến quyền sở hữu và bảo mật của công ty.
