-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 20, 2025 lúc 10:01 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nhomkinhnhatkim`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`category_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Cửa kính', 'iodhtgy udytsrlighjdu eut ẻoiturdoij  uôietjjsjgeoirh o oiuhtoe hjjeoiur hỏthjeio uhwoieht ơhj ỏehtgoent ', '2025-02-07 02:15:07', '2025-02-14 07:28:00'),
(2, 'Cửa nhôm', 'rdghjodifv eoirutrodidugj ẻoutodjg 4iueteoriut ỏeu5toerpug 9e4ut6ioertu ue 9e9 oe4iu 93845u6', '2025-02-14 07:29:08', '2025-02-14 07:29:08'),
(3, 'Tay cầm cửa', 'dffhgkj bbjghilfkd ỏiut jiweuhtr ksuert ưeiuer ẻ ri uo ụklw hkw hk4h iueh ks jwk4uh jjsgbk 4g4ej4whg i4kh nưio4en', '2025-02-14 07:29:08', '2025-02-14 07:29:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `inquiries`
--

CREATE TABLE `inquiries` (
  `inquiry_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `inquiries`
--

INSERT INTO `inquiries` (`inquiry_id`, `name`, `diachi`, `phone`, `message`, `created_at`) VALUES
(2, 'Nguyễn Tiến Trung', '@0 Vũ Như Tô', '0867538329', 'Cần Liên hệ tư vaans ạ', '2025-02-19 05:46:53'),
(5, 'cửa nhôm owin', 'fhfghfgh', '6575675', 'fhfghfhfgh', '2025-02-19 05:53:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `post_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `new_images` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('da-dang','ban-nhap','khong-hien-thi') DEFAULT 'ban-nhap'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`post_id`, `title`, `slug`, `new_images`, `created_at`, `updated_at`, `status`) VALUES
(10, 'Những Công Trình Của Nhất Kim Window', 'Chất lượng đi đầu & Giá trị bền lâu', '../uploads/news_images/banner-nhat-kim.jpg', '2025-02-17 03:30:08', '2025-02-17 05:51:23', 'da-dang'),
(11, 'Dàn máy làm cửa nhôm CNC hiện đại của Công ty Nhất Kim Window', 'Nhất Kim Window sử dụng các thiết bị, máy móc hiện đại, tiên tiến trong sản xuất như máy cắt nhôm CNC, máy ép góc, máy cắt CNC 2 đầu lưỡi... Áp dụng công nghệ tiên tiến trong quản lý và sản xuất, đảm bảo chất lượng sản phẩm đạt tiêu chuẩn cao.', '../uploads/news_images/469751715_2059149907864767_381401262001039859_n.jpg', '2025-02-17 05:50:50', '2025-02-17 05:50:50', 'da-dang'),
(12, 'Nhất Kim Windown ăn mừng Tết Nguyên Đán', 'Để chúc mừng các thành tự trong năm cũ cũng như chuẩn bị cho một năm mới đầy hy vọng , Nhất Kim Windown tổ chức tiệc ăn mừng năm mới cũng như gửi lời chi ân cảm ơn khách hàng đã đồng hành cùng Nhất Kim Windown trong năm qua', '../uploads/news_images/474526418_2089071384872619_193676143856913009_n.jpg', '2025-02-17 06:10:06', '2025-02-17 06:10:06', 'da-dang'),
(13, 'Nhất Kim Window luôn đổi mới sáng tạo trong từng công trình', 'Sự đổi mới và sáng tạo là chìa khóa tạo nên những công trình vĩ đại. Mỗi dự án không chỉ là một khối bê tông, thép hay kính, mà còn là sự kết tinh của tư duy đột phá, công nghệ tiên tiến và bàn tay tài hoa của những người kiến tạo.', '../uploads/news_images/464923838_2030199104093181_1151507219511034410_n.jpg', '2025-02-18 02:09:57', '2025-02-18 02:10:12', 'da-dang'),
(14, 'Nhất Kim Window được chứng nhận là nhà phân phối uỷ quyền của OWIN', 'Là nhà phân phối được uỷ quyền phân phối sản phẩn của Nhôm OWIN tại thị trường Hải Dương', '../uploads/news_images/421701605_1840748353038258_1708265363345558838_n.jpg', '2025-02-19 06:42:21', '2025-02-19 06:42:21', 'da-dang');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `new_description`
--

CREATE TABLE `new_description` (
  `id` int(11) NOT NULL,
  `post_id` varchar(11) DEFAULT NULL,
  `type` enum('text','image','title') DEFAULT NULL,
  `content` text DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `new_description`
--

INSERT INTO `new_description` (`id`, `post_id`, `type`, `content`, `position`) VALUES
(1, '10', 'title', 'Những Công Trình Tuyệt Vời Của Nhất Kim Window', 1),
(2, '10', 'text', 'Nhất Kim Window tự hào là một trong những thương hiệu hàng đầu trong ngành sản xuất và cung cấp cửa sổ, cửa đi, vách kính, và các giải pháp cửa cho các công trình xây dựng cao cấp. Với nhiều năm kinh nghiệm trong ngành, Nhất Kim Window đã không ngừng nỗ lực để mang đến những sản phẩm chất lượng, hiện đại và phù hợp với xu hướng mới của kiến trúc và thiết kế.', 2),
(3, '10', 'image', '../uploads/product-images/473992839_2087157981730626_1458970592655830701_n.jpg', 3),
(4, '10', 'title', 'Chất Lượng Và Sự Đổi Mới Trong Mỗi Công Trình', 5),
(5, '10', 'text', 'Các sản phẩm của Nhất Kim Window không chỉ đơn thuần là cửa sổ hay cửa đi, mà mỗi sản phẩm đều là một tác phẩm nghệ thuật, kết hợp giữa chất lượng vượt trội và thiết kế tinh tế. Với mục tiêu mang lại sự an toàn, tiện nghi và thẩm mỹ cho các công trình, Nhất Kim Window đã tham gia vào hàng loạt các dự án lớn, từ các tòa nhà cao tầng, biệt thự sang trọng, đến các khu nghỉ dưỡng cao cấp.', 6),
(6, '10', 'image', '../uploads/product-images/473583610_2085679885211769_822771112488300355_n.jpg', 7),
(7, '10', 'title', 'Một Số Dự Án Nổi Bật Của Nhất Kim Window', 8),
(9, '10', 'text', 'Công ty đã góp phần nâng tầm diện mạo cho hàng loạt công trình lớn như biệt thự sang trọng, tòa nhà cao cấp, khách sạn, khu nghỉ dưỡng và trung tâm thương mại hiện đại. Với công nghệ tiên tiến và đội ngũ kỹ thuật chuyên nghiệp, Nhất Kim Window không chỉ mang đến những giải pháp cửa nhôm kính bền vững, thẩm mỹ mà còn đảm bảo độ an toàn và cách âm vượt trội. Mỗi dự án đều là minh chứng cho sự cam kết về chất lượng, góp phần kiến tạo không gian sống và làm việc đẳng cấp.', 9),
(10, '10', 'image', '../uploads/product-images/472717373_2076934516086306_1101593427815225068_n.jpg', 10),
(11, '10', 'text', 'Luôn làm việc với tiêu chí \"Chất lượng đi đầu & Giá trị bền lâu\" ,chúng tôi tự hào mỗi công trình là một tâm huyết, lỗ lực để các sản phẩm đồng hành cùng quý khách theo thời gian', 4),
(12, '10', 'image', '../uploads/product-images/471260552_2069582110154880_8054394366477293433_n.jpg', 11),
(13, '10', 'image', '../uploads/product-images/471821261_2073754993070925_6805899651003911115_n.jpg', 12),
(14, '10', 'image', '../uploads/product-images/471875188_2074314403014984_7646523316259535875_n.jpg', 13),
(15, '10', 'title', 'Nhất Kim Window', 15),
(16, '10', 'text', 'Chất lượng đi đầu & Giá trị bền lâu', 16),
(17, '10', 'image', '../uploads/product-images/472316041_2077867255993032_3791776750948013647_n.jpg', 14),
(18, '11', 'text', 'Tháng 6/2024, Công ty Cổ phần Gopco Việt Nam vừa hoàn tất việc lắp đặt dàn máy làm cửa nhôm CNC tại Hải Dương: máy cắt nhôm 2 đầu lưỡi 550 Weike WJM-CNC-550×4200 và máy phay cnc 2 đầu hành trình 1500 weike tại Công ty Cổ phần Nhất Kim Window. Đây là một thiết bị hiện đại, chuyên dụng trong ngành gia công cửa nhôm, với khả năng cắt chính xác và nhanh chóng nhờ vào công nghệ CNC tiên tiến.', 1),
(19, '11', 'title', 'Công ty Nhất Kim Window  lắp đặt dàn máy làm cửa nhôm CNC tại Hải Dương', 2),
(20, '11', 'text', 'Công ty Cổ phần Nhất Kim Window là đơn vị chuyên hoạt động trong lĩnh vực sản xuất, gia công và lắp đặt các sản phẩm cửa nhôm kính, cửa nhựa uPVC và các sản phẩm liên quan. Các dòng sản phẩm chính:', 3),
(21, '11', 'text', '-Cửa nhôm kính: Các loại cửa đi, cửa sổ, cửa trượt, vách kính... được sản xuất từ nhôm chất lượng cao, bền đẹp và đa dạng về mẫu mã.', 4),
(22, '11', 'text', '-Mặt dựng nhôm kính: Các hệ mặt dựng hiện đại, đáp ứng yêu cầu thẩm mỹ và kỹ thuật của các công trình xây dựng cao tầng.', 5),
(23, '11', 'text', '-Phụ kiện cửa: Các loại phụ kiện chất lượng cao đảm bảo sự vận hành trơn tru và bền bỉ của các sản phẩm cửa.', 6),
(24, '11', 'text', 'Hiện tại công ty CP Nhất Kim Window là đại lý nhôm Owin tại tỉnh Hải Dương. Nhất Kim Window đã thực hiện nhiều dự án lớn nhỏ trên toàn quốc, từ các công trình dân dụng, nhà ở đến các dự án thương mại, công nghiệp, khách sạn, resort...', 7),
(25, '11', 'text', 'Nhất Kim Window sử dụng các thiết bị, máy móc hiện đại, tiên tiến trong sản xuất như máy cắt nhôm CNC, máy ép góc, máy cắt CNC 2 đầu lưỡi... Áp dụng công nghệ tiên tiến trong quản lý và sản xuất, đảm bảo chất lượng sản phẩm đạt tiêu chuẩn cao.', 8),
(26, '11', 'image', '../uploads/product-images/dan-may-lam-cua-nhom-cnc-tai-hai-duong-cong-ty-nhat-kim-window-0.jpg', 9),
(27, '11', 'title', 'Thông tin dàn máy làm cửa nhôm CNC tại Công ty Nhất Kim Window', 10),
(28, '11', 'text', 'Công ty Cổ phần Gopco Việt Nam vừa hoàn tất việc lắp đặt máy cắt nhôm 2 đầu lưỡi 550 Weike WJM-CNC-550×4200 tại Công ty Cổ phần Nhất Kim Window. Đây là một thiết bị hiện đại trong dàn máy làm cửa nhôm CNC tại Hải Dương, có khả năng cắt chính xác và nhanh chóng nhờ vào côg nghệ CNC tiên tiến.', 11),
(29, '11', 'text', 'Đặc điểm nổi bật của máy cắt nhôm 2 đầu lưỡi 550 Weike WJM-CNC-550×4200:', 12),
(30, '11', 'text', '-Công nghệ CNC hiện đại: Đảm bảo độ chính xác cao trong quá trình cắt, giảm thiểu sai sót và tăng năng suất lao động.', 13),
(31, '11', 'text', '-Khả năng cắt đa dạng: Máy có thể cắt các loại nhôm với độ dày và kích thước khác nhau, phù hợp với nhu cầu sản xuất đa dạng của Công ty CP Nhất Kim Window.', 14),
(32, '11', 'text', '-Tiết kiệm thời gian: Với hai đầu cắt lưỡi 550, máy có thể thực hiện nhiều tác vụ cắt đồng thời, giảm thời gian gia công và nâng cao hiệu suất.', 15),
(33, '11', 'text', '-An toàn và dễ sử dụng: Máy được thiết kế với các tính năng an toàn, dễ dàng vận hành và bảo trì, đảm bảo an toàn cho người sử dụng.', 16),
(34, '11', 'text', '-Nhiều tính năng tiện ích: Thước đo chiều cao phôi nhôm, gá tách phôi tự động ở đầu máy số 2, máy in đi kèm, thiết bị vệ sinh góc cắt, 3 giá đỡ phôi tự động, ray di chuyển đầu máy là ray vuông ... ', 17),
(35, '11', 'image', '../uploads/product-images/dan-may-lam-cua-nhom-cnc-tai-hai-duong-cong-ty-nhat-kim-window-01.jpg', 18),
(36, '11', 'text', 'Trước đó, tháng 4/2024, Gopco cũng đã chuyển giao máy phay cnc 2 đầu hành trình 1500 WEIKE. Đây là phiên bản mới nhất, trang bị màn hình điều khiển cảm ứng, như một chiếc ipad lớn, có thể kết nối với wifi, rất tiện lợi trong quá trình sản xuất, lấy dữ liệu. Bên cạnh đó, máy cũng có nhiều tính năng tiện ích khác như:', 19),
(37, '11', 'text', '-Toàn bộ ray di chuyển kẹp phôi và ray dẫn hướng là ray vuông, to. Kẹp giữ phôi có thể di chuyển được', 20),
(38, '11', 'text', '-Động cơ làm mát bằng gió, sạch sẽ và không gây ồn', 21),
(39, '11', 'text', '-Có khả năng khoan bậc. Khách hàng chủ động cài đặt tất cả hệ nhôm và hệ khóa mong muốn', 22),
(40, '11', 'text', '-Tự động lật 3 mặt. Khoan được tất cả các hệ nhôm (kể cả nhôm thủy lực, nhôm cầu cách nhiệt, nhôm nội thất, các loại khóa cửa nhôm và bản lề nhôm nội thất', 23),
(41, '11', 'text', '-Tốc độ phay cực nhanh, 2 phút xong 3 mặt khóa nhanh gấp 3 lần so với dùng máy khoét khóa phổ thông', 24),
(42, '11', 'image', '../uploads/product-images/dan-may-lam-cua-nhom-cnc-tai-hai-duong-cong-ty-nhat-kim-window-02.jpg', 25),
(43, '11', 'title', 'Ý nghĩa của việc lắp đặt dàn máy làm cửa nhôm tại Hải Dương| Công ty CP Nhất Kim Window:', 26),
(44, '11', 'text', ' - Nâng cao năng lực sản xuất: Việc đầu tư vào dàn máy làm cửa nhôm WEIKE giúp Công ty CP Nhất Kim Window tăng cường khả năng sản xuất, đáp ứng được các đơn hàng lớn và yêu cầu khắt khe của khách hàng.', 27),
(45, '11', 'text', ' - Tăng tính cạnh tranh: Với trang thiết bị hiện đại, Công ty CP Nhất Kim Window có thể cung cấp các sản phẩm nhôm chất lượng cao, nâng cao uy tín và vị thế trên thị trường.', 28),
(46, '11', 'text', ' - Phát triển bền vững: Đầu tư vào công nghệ mới không chỉ giúp tăng hiệu quả sản xuất mà còn góp phần vào sự phát triển bền vững của công ty, tạo đà cho những bước tiến xa hơn trong tương lai.', 29);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image_url` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `product_name`, `description`, `status`, `created_at`, `updated_at`, `image_url`) VALUES
(7, 2, 'Cửa sổ mở quay 3 cánh', 'Cửa sổ mở 3 cánh nhôm Owinnhập khẩu mang lại nhiều lợi ích và tiện ích cho không gian sống', 1, '2025-02-17 08:09:08', '2025-02-17 08:59:15', '../uploads/product-images/1739779748_bo-cua-nay-thay-vao-hinh-02-co-gai-mo-cua-trang-09.jpg'),
(8, 2, 'Cửa thuỷ lực', 'Dòng cửa đẹp và chất lượng với thiết kế đơn giản nhưng sang trọng, chúng tôi đảm bảo hoàn thiện nhanh chóng, an toàn bàn giao đúng hạn cho khách hàng tạo sự hoàn hảo cho ngôi nhà bạn.', 1, '2025-02-17 08:34:36', '2025-02-17 08:34:36', '../uploads/product-images/1739781276_cuathuluc.jpg'),
(9, 2, 'Cửa ghi quay 1 cánh', 'Đây là loại cửa được sử dụng rộng rãi tại Việt Nam. Khi mở cánh bản lề sẽ quay tạo thành góc vuông 90 độ giúp bạn đóng mở dễ dàng. Loại cửa này thích hợp sử dụng làm cửa phòng ngủ, cửa nhà vệ sinh, cửa sân thượng,…', 1, '2025-02-17 08:44:58', '2025-02-17 08:59:04', '../uploads/product-images/1739781898_cua-nhom-xingfa-1-canh.jpg'),
(10, 2, 'Cửa sổ lùa 2 cánh', 'a sổ nhôm kính lùa 2 cánh có thiết kế tiện lợi, đóng mở êm ái, khả năng chịu va đập tốt mà giá thành lại khá rẻ', 1, '2025-02-17 08:58:27', '2025-02-17 09:31:51', '../uploads/product-images/1739782707_cua-nhom-truot-2-canh.jpg'),
(15, 1, 'khung cửa', 'cứng trắc dễ sử dụng', 1, '2025-02-20 03:54:41', '2025-02-20 03:54:41', '../uploads/product-images/1740023681_DJI_20250214104131_0042_D.JPG');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_description`
--

CREATE TABLE `product_description` (
  `id_product_description` int(11) NOT NULL,
  `product_id` varchar(11) DEFAULT NULL,
  `type` enum('text','image','title') DEFAULT NULL,
  `content` text DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `product_description`
--

INSERT INTO `product_description` (`id_product_description`, `product_id`, `type`, `content`, `position`) VALUES
(1, '10', 'title', 'Cửa sổ lùa nhôm là gì?', 0),
(2, '10', 'text', 'Cửa sổ lùa nhôm hay còn gọi là cửa sổ nhôm kính mở trượt. Sản phẩm có thiết kế hiện đại, tạo nên không gian sống thoáng mát, gọn gàng cho gia đình. Loại cửa này có cấu tạo khá đơn giản, bao gồm: đường ray trượt trên dưới, bộ khung nhôm, kính cường lực và những phụ kiện như khóa chốt, tay nắm của đi kèm. Nhờ thiết kế tối giản và sử dụng chất liệu nhôm – kính, cửa sổ nhôm kính lùa giúp căn phòng của bạn luôn sáng sủa vì tận dụng được ánh sáng thiên nhiên từ bên ngoài hắt vào phòng', 0),
(3, '10', 'text', 'Cửa sổ nhôm kính lùa thường có 1 – 3 đường ray trượt và có 2 – 6 cánh cửa kính. Trong đó, loại cửa sổ lùa 2 cánh là thông dụng nhất, bao gồm cửa sổ lùa nhôm kính cường lực và cửa sổ nhôm kính lùa thông thường. Cửa sổ lùa nhôm kính cường lực có khả năng chịu áp lực và chống va đập cực kỳ tốt. Nhưng tùy vào tài chính từng gia đình, nhiều người vẫn yêu thích sử dụng cửa sổ nhôm kính lùa thông thường vì giá thành rẻ, trong khi vẫn đảm bảo an toàn và thẩm mỹ cho ngôi nhà. ', 0),
(4, '10', 'title', 'Cấu tạo cửa sổ lùa 2 cánh nhôm kính', 0),
(5, '10', 'text', 'Cửa sổ nhôm kính lùa 2 cánh được cấu tạo từ 3 thành phần chính, được thiết kế từ ngoài vào trong. Cụ thể như sau:', 0),
(6, '10', 'text', '- Khung nhôm bao bọc bên ngoài (có thể chia thành nhiều ô nhỏ): Với chất liệu nhôm cao cấp, đảm bảo được độ bền chắc và khả năng chịu được lực va đập mạnh.', 0),
(7, '10', 'text', '- Ray trượt: Được bố trí phía trên và dưới, giúp cho cánh cửa được trượt gọn về hai phía trái hoặc phải khi cần mở – đóng. ', 0),
(8, '10', 'text', '- Cánh cửa: Hai cánh cửa bên trong được cấu tạo từ kính cường lực hoặc kính thường. Vật liệu này đã được trải qua quá trình tinh luyện đặc biệt, đảm bảo khả năng chịu được nhiệt độ thay đổi của thời tiết mà không bị cong vênh, chịu được lực va đập mạnh và khả năng cách âm tốt. Các nhà sản xuất hiện nay cũng đưa ra nhiều mẫu mã với nhiều màu sắc khác nhau đáp ứng sở thích và xu hướng theo từng thời kỳ.', 0),
(9, '10', 'text', 'Ngoài ra, một bộ cửa sổ lùa 2 cánh còn đi kèm những phụ kiện khác như: tay nắm cửa, khóa cửa, đệm giảm chấn, đệm dẫn hướng và các loại keo, gioăng cao su,…', 0),
(10, '10', 'image', '../uploads/product-images/cua-so-lua-2-canh-3-2.png', 0),
(11, '10', 'title', 'Cơ chế hoạt động của cửa sổ lùa nhôm 2 cánh', 0),
(12, '10', 'text', 'Cửa sổ lùa nhôm 2 cánh có khả năng đóng mở dễ dàng nhờ cơ chế kéo trượt các cánh cửa trên thay ray. Bạn chỉ cần dùng tay kéo nhẹ cánh cửa dọc theo thanh ray, cửa sẽ được mở ra nhẹ nhàng, không mất sức, không tạo tiếng động lớn. Cơ chế hoạt động của loại cửa nhôm kính lùa này còn giúp đảm bảo tính ổn định và an toàn cho người dùng, hạn chế tình trạng bị kẹt tay trong quá trình đóng mở và sử dụng.', 0),
(13, '10', 'text', 'Khi cửa sổ lùa nhôm đã được mở ra hoàn toàn, hai cánh cửa sẽ song song, xếp chồng lên nhau, chừa lại 1/2 diện tích của khung cửa để không khí bên ngoài đi vào trong phòng, giúp phòng thông thoáng và thoải mái hơn. Cơ chế đóng mở của cửa sổ nhôm kính lùa đặc biệt phù hợp cho những căn phòng bị hạn chế về diện lắp đặt cửa sổ.', 0),
(14, '10', 'image', '../uploads/product-images/cua-so-lua-2-canh-4-2.png', 0),
(15, '10', 'title', 'Ưu điểm nổi bật của cửa sổ lùa nhôm kính 2 cánh', 0),
(16, '10', 'text', 'Cùng điểm qua những đặc điểm nổi trội của cửa sổ nhôm kính lùa 2 cánh mang đến cho không gian sống như sau:', 0),
(17, '10', 'text', '-Sản phẩm có trọng lượng nhẹ: Nhờ vào khung nhôm nhẹ, kết hợp với thiết kế các khoang rỗng, tổng thể cửa sổ nhôm kính lùa có khối lượng tương đối nhẹ so với các sản phẩm thông thường khác. Cũng nhờ vào đó mà quá trình vận chuyển, lắp đặt và thi công cửa sổ lùa 2 cánh cũng được thuận tiện, dễ dàng hơn.', 0),
(18, '10', 'text', '-Khả năng cách âm và cách nhiệt tốt: Các thanh profile bằng nhôm được cấu tạo dạng hộp, chia thành nhiều khoang trống, thêm vào ở giữa một lớp khí trơ. Nhờ thiết kế khoa học, cửa sổ lùa nhôm mang lại hiệu quả cách âm và cách nhiệt khá tốt.', 0),
(19, '10', 'text', '-Độ kín nước cao: Các ống dẫn nước được thiết kế dẫn ra bên ngoài nên hoàn toàn ngăn được nước và không khí đi vào bên trong cửa nhôm.', 0),
(20, '10', 'text', '-Chịu được sức gió lớn: Sản phẩm sử dụng hệ gioăng cao su có độ đàn hồi tốt giúp giữ độ khít cao. Theo nghiên cứu, bộ cửa sổ nhôm và kính cường lực có khả năng chịu được áp lực gió lên đến 1600 pascal. Nhờ đó, công trình vẫn chắc chắn và an toàn ngay cả khi nằm trong khu vực có nhiều gió bão.', 0),
(21, '10', 'text', '-Lợi ích về kinh tế: Với khả năng cách âm và cách nhiệt tốt, cửa sổ nhôm kính lùa 2 cánh giúp tiết kiệm điện năng trong quá trình sử dụng lâu dài. Bề mặt cửa sổ được sơn tĩnh điện, đảm bảo độ bền màu mà không cần bảo dưỡng quá nhiều. Đồng thời, giá thành của cửa sổ lùa 2 cánh cũng tương đối hợp lý so với những ưu điểm mang lại.', 0),
(22, '10', 'text', '-Tính thẩm mỹ cao cho công trình thiết kế: Với 2 cánh cửa nhôm kính lùa, sản phẩm giúp mở rộng không gian và bao quát tầm nhìn ra bên ngoài, tận hưởng trọn vẹn nét đẹp của thiên nhiên mà không cần phải đóng – mở như loại cửa sổ truyền thống.', 0),
(23, '10', 'text', '-Vệ sinh, bảo dưỡng dễ dàng: Cửa sổ nhôm kính rất dễ lau chùi bằng các cách vệ sinh thông thường và vẫn mang lại độ bóng sáng như vẻ ban đầu.', 0),
(24, '10', 'image', '../uploads/product-images/cua-so-lua-2-canh-4-2 (1).png', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_videos`
--

CREATE TABLE `product_videos` (
  `video_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `video_url` varchar(255) NOT NULL,
  `thumbnail_url` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `avatar`, `role`, `created_at`, `updated_at`) VALUES
(1, 'sonadmin', '$2y$10$IK5kABHJIpBn2i10RalpjuOYQYwZXnJpWMG2Aco8irSbYj8/t7sum', 'frid90637555@gmail.com', '', 'admin', '2025-02-12 07:47:00', '2025-02-19 04:41:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `video_url` varchar(255) NOT NULL,
  `loai_video` int(11) NOT NULL,
  `product_link` varchar(255) DEFAULT NULL,
  `status` enum('published','hidden') NOT NULL DEFAULT 'published'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `videos`
--

INSERT INTO `videos` (`id`, `title`, `video_url`, `loai_video`, `product_link`, `status`) VALUES
(2, 'của nhôm nhà anh Hưng', 'https://www.facebook.com/anhduong1109/videos/c%E1%BB%ADa-nh%C3%B4m-owin-m%C3%A0u-n%C3%A2u-cafe/1311620473447200', 1, '', 'published'),
(4, 'Nhà cửa owin', 'https://www.tiktok.com/@cuadephaiduong/video/7438967412256443669?q=nh%E1%BA%A5t%20kim%20window&t=1739933849412', 3, '', 'published'),
(5, 'Nhà cửa', 'https://www.tiktok.com/@cua_dep_hai_duong/video/7383640700245642504?q=nh%E1%BA%A5t%20kim%20window&t=1739933849412', 3, '', 'published'),
(6, 'cưa nhôm', 'https://www.tiktok.com/@cua_dep_hai_duong/video/7359143116072324359?q=nh%E1%BA%A5t%20kim%20window&t=1739933849412', 3, '', 'published'),
(7, 'nhôm kính 2', 'https://www.facebook.com/reel/1550067352365621', 1, '', 'published'),
(8, 'của kín ', 'https://www.tiktok.com/@cua_dep_hai_duong/video/7354605814746860808?q=nh%E1%BA%A5t%20kim%20window&t=1739933849412', 3, '', 'published'),
(9, 'kính nhôm ', 'https://www.youtube.com/watch?v=XFLy1BiIDdM', 2, '', 'published'),
(10, 'kính my', 'https://www.youtube.com/watch?v=GBBKefF74f8', 2, '', 'published'),
(11, 'của kính ', 'https://www.tiktok.com/@cua_dep_hai_duong/video/7308315279321206034?q=nh%E1%BA%A5t%20kim%20window&t=1739933849412', 3, '', 'published'),
(12, 'Review mẫu cửa mở chính sử dụng nhôm Owin màu vân gỗ trắc tại Tứ Kỳ - Hải Dương', 'https://www.youtube.com/watch?v=QrEsH66DYQE', 2, '', 'published');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`inquiry_id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`post_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_products_categories` (`category_id`);

--
-- Chỉ mục cho bảng `product_description`
--
ALTER TABLE `product_description`
  ADD PRIMARY KEY (`id_product_description`);

--
-- Chỉ mục cho bảng `product_videos`
--
ALTER TABLE `product_videos`
  ADD PRIMARY KEY (`video_id`),
  ADD KEY `fk_product_videos_products` (`product_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `inquiry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `product_description`
--
ALTER TABLE `product_description`
  MODIFY `id_product_description` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `product_videos`
--
ALTER TABLE `product_videos`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product_videos`
--
ALTER TABLE `product_videos`
  ADD CONSTRAINT `fk_product_videos_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
