## 📖 Giới thiệu

**Nhôm kính Nhất Kim** là website giới thiệu sản phẩm cho công ty Cổ phần Nhôm kính Nhất Kim.

Dự án là phiên bản demo mô phỏng hệ thống quản lý/nội bộ (web app) được xây dựng trong thời gian thực tập tại Công ty TNHH Công nghệ và Truyền thông số Nam Anh. Mục tiêu là áp dụng các kiến thức: Lập trình web fullstack, xử lý backend, frontend, cơ sở dữ liệu và tương tác người dùng.

Dự án được triển khai bằng **PHP + MySQL + HTML/CSS/JS** với cấu trúc backend và frontend tách biệt, có tính năng cơ bản như quản lý dữ liệu và giao diện người dùng.

🌐 [Xem Demo](http://nhatkimwindow.com)

---

## ✨ Tính năng chính

✔ Quản lý nội dung cơ bản qua form và database.

✔ Upload ảnh/file lên server.

✔ Phân quyền/Admin Panel (dành cho quản trị).

✔ Trang công khai trả về nội dung động từ database.

✔ Cấu trúc template với header, footer, layout tách biệt.

---

## 🛠 Công nghệ sử dụng
- **PHP:** Ngôn ngữ backend để xử lý logic máy chủ và tương tác với database.

- **MySQL:** Hệ quản trị cơ sở dữ liệu để lưu trữ dữ liệu ứng dụng.

- **HTML / CSS / JavaScript:** Xây dựng giao diện và tương tác người dùng.

- **.htaccess:** Cấu hình URL và bảo mật directory.

- **Uploads / Static Assets:** Thư mục chứa tài nguyên như hình ảnh, file upload.

---

## 📁 Cấu trúc thư mục chính

```txt
Nhom-Kinh-Nhat-Kim/
├── admin/                 # Backend admin panel
├── database/              # SQL and DB assets
├── includes/              # Shared partials (header, footer, config)
├── public/                # Frontend public assets
├── uploads/               # User-uploaded files
├── index.php              # Entry point (Landing page)
├── nhomkinhnhatkim.sql    # Schema & sample data
├── .htaccess              # Server config
```
---

## 📌 Hướng dẫn chạy project (Demo)

### 1. Import database:

- Mở phpMyAdmin hoặc Workbench

- Import file **nhomkinhnhatkim.sql**

### 2. Cấu hình kết nối DB:

- Mở file cấu hình và chỉnh thông tin DB (host, user, pass).

### 3. Mở trên localhost:

- Chạy Apache/PHP server (XAMPP, WAMP, Laragon).

- Mở file root index.php nhấp chuột phải chọn **PHP Server: Serve Project**

- Truy cập http://localhost:3000/index.php
---

## 🧠 Những gì đã học được

✔ Làm việc với backend thuần PHP và xử lý form dữ liệu.

✔ Thiết kế database và quản lý schema MySQL.

✔ Cấu trúc giao diện với include/partials.

✔ Quản lý upload file, bảo mật đường dẫn.

✔ Sử dụng GitHub để chia sẻ và version control.

---

## 📂 Lưu ý về bản quyền

📌 Đây là phiên bản demo được dựng lại dựa trên dự án thực tập.


Chi tiết nghiệp vụ và dữ liệu của dự án thực tế không được chia sẻ do bản quyền công ty.

