-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 29, 2023 lúc 06:34 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mypham`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--
-- Tạo: Th10 29, 2023 lúc 05:31 PM
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--
-- Tạo: Th10 29, 2023 lúc 05:31 PM
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_23_041447_create_tbl_admin_table', 1),
(6, '2023_05_02_025638_create_tbl_category_product', 2),
(7, '2023_05_06_100035_create_tbl_brand_product', 3),
(8, '2023_05_06_104354_create_tbl_brand_product', 4),
(9, '2023_05_06_111222_create_tbl_product', 5),
(10, '2023_05_10_155712_tbl_customer', 6),
(11, '2023_05_10_180752_tbl_shipping', 6),
(12, '2023_05_11_154930_tbl_payment', 6),
(13, '2023_05_11_155007_tbl_order', 6),
(14, '2023_05_11_155233_tbl_order_details', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--
-- Tạo: Th10 29, 2023 lúc 05:31 PM
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--
-- Tạo: Th10 29, 2023 lúc 05:31 PM
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--
-- Tạo: Th10 29, 2023 lúc 05:31 PM
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_tel` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_tel`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'Hoang Nghia', '0705799891', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand_product`
--
-- Tạo: Th10 29, 2023 lúc 05:31 PM
--

CREATE TABLE `tbl_brand_product` (
  `brand_id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_desc` text DEFAULT NULL,
  `brand_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand_product`
--

INSERT INTO `tbl_brand_product` (`brand_id`, `brand_name`, `brand_desc`, `brand_status`, `created_at`, `updated_at`) VALUES
(3, 'Cocoon', NULL, 1, NULL, NULL),
(6, 'Channel', NULL, 1, NULL, NULL),
(7, 'Dior', NULL, 1, NULL, NULL),
(8, 'Unilever', NULL, 1, NULL, NULL),
(9, 'Avene', NULL, 1, NULL, NULL),
(10, 'a', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category_product`
--
-- Tạo: Th10 29, 2023 lúc 05:31 PM
--

CREATE TABLE `tbl_category_product` (
  `cate_id` int(10) UNSIGNED NOT NULL,
  `cate_name` varchar(255) NOT NULL,
  `cate_desc` text DEFAULT NULL,
  `cate_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category_product`
--

INSERT INTO `tbl_category_product` (`cate_id`, `cate_name`, `cate_desc`, `cate_status`, `created_at`, `updated_at`) VALUES
(8, 'Chăm sóc da mặt', NULL, 1, NULL, NULL),
(9, 'Trang điểm', NULL, 1, NULL, NULL),
(10, 'Nước hoa', NULL, 1, NULL, NULL),
(11, 'Dưỡng thể', NULL, 1, NULL, NULL),
(12, 'Chăm sóc tóc', NULL, 1, NULL, NULL),
(13, 'Chăm sóc răng miệng', NULL, 1, NULL, NULL),
(14, 'Phụ kiện', NULL, 1, NULL, NULL),
(15, 'TH2', NULL, 1, NULL, NULL),
(16, 'ABC', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--
-- Tạo: Th10 29, 2023 lúc 05:31 PM
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `created_at`, `updated_at`) VALUES
(1, 'Hoàng Trọng Nghĩa', 'nghia@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', NULL, NULL),
(2, 'nghia', 'admin@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--
-- Tạo: Th10 29, 2023 lúc 05:31 PM
--

CREATE TABLE `tbl_order` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_total` double(8,2) NOT NULL,
  `order_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order_details`
--
-- Tạo: Th10 29, 2023 lúc 05:31 PM
--

CREATE TABLE `tbl_order_details` (
  `order_details_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_payment`
--
-- Tạo: Th10 29, 2023 lúc 05:31 PM
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(10) UNSIGNED NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--
-- Tạo: Th10 29, 2023 lúc 05:31 PM
--

CREATE TABLE `tbl_product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `cate_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_desc` text DEFAULT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `cate_id`, `brand_id`, `product_name`, `product_desc`, `product_price`, `product_image`, `product_status`, `created_at`, `updated_at`) VALUES
(15, 8, 3, 'Tẩy Tế Bào Chết Da mặt Cocoon', 'Tẩy tế bào chết Cocoon chăm sóc da mặt, nhẹ nhàng lột tẩy với tinh thể đường tự nhiên và bơ ca cao, làm dịu vùng da khô\r\nXuất xứ: Việt Nam\r\nDung tích: 150ml', '130000', '00128.jpg', 1, NULL, NULL),
(16, 11, 6, 'Kem Dưỡng Thể Chanel', 'Sữa dưỡng thể ngăn ngừa lão hóa da Chanel  là sản phẩm giúp bạn giải quyết các vấn đề về lão hóa trên da, tăng cường độ ẩm cho da, nuôi dưỡng cải tạo làn da khô, tái tạo tế bào da và bảo vệ lớp Collagen, mang đến cho bạn làn da căng mịn, tràn đầy sức sống\r\nXuất xứ: Pháp\r\nKhối lượng: 150g', '2300000', '00241.jpg', 1, NULL, NULL),
(17, 8, 9, 'Sữa Rửa Mặt Avene', 'Sữa Rửa Mặt Avene Cleanance Cleansing Gel là sữa rữa mặt siêu lành tính cho da dầu mụn nhạy cảm. Với thành phần đầu bảng là nước khoáng Avene quý giá. Nguồn nước suối thiên nhiên độc quyền của Avene rất tinh khiết và giàu khoáng chất, giúp làm mềm và dịu da hiệu quả, ngoài ra còn có Zinc Gluconate giúp kháng khuẩn, kiểm soát mụn nên đây là lựa chọn phù hợp cho các làn da mụn nhạy cảm đó nha.\r\nXuất xứ: Pháp\r\nDung tích: 200ml', '265000', '00384.png', 1, NULL, NULL),
(18, 8, 9, 'Sữa rửa mặt CLEAR Pore', 'CLEAR Pore Normalizing Cleanser không giống như hầu hết các loại sữa rửa mặt khác, hoàn toàn không gây kích ứng da và không gây nên tình trạng da khô hay ngứa rát.\r\nXuất xứ: Mỹ\r\nDung tích: 177ml', '450000', '00435.jpg', 0, NULL, NULL),
(19, 11, 3, 'Kem dưỡng thể Cocoon', 'Bơ dưỡng thể cà phê đắk lắk cocoon thuần chay, chất kem sánh mịn như bơ, mềm mịn như nhung và thấm nhanh như tan vào da, để lại cảm giác mềm mịn và một mùi thơm bơ.\r\nXuất xứ: Việt Nam\r\nThể tích: 200ml', '160000', '00552.jpg', 1, NULL, NULL),
(20, 12, 8, 'Dầu gội DOVE', 'Dầu gội Dove Ngăn Gãy Rụng Tóc MỚI với Bio-Serum kết tinh từ Dầu Hạt Hướng Dương và Chiết Xuất Lá Trà Xanh, thấm đều và nuôi dưỡng từng sợi tóc từ bên trong, giúp tóc mềm mượt dễ chải, giảm xơ rối ngay từ khi tóc ướt, giúp ngăn gãy rụng từ gốc, cho tóc chắc khỏe gấp 5 lần.\r\nXuất xứ: Việt Nam\r\nKhối lượng: 640gr', '120000', '00625.png', 1, NULL, NULL),
(21, 11, 9, 'Kem Dưỡng Thể Avene', 'Kem Dưỡng Thể Avene Cải Thiện Lỗ Chân Lông \r\nXuất xứ: Pháp\r\nDung tích: 200ml', '780000', '00747.jpg', 1, NULL, NULL),
(22, 11, 3, 'Tẩy Da Chết Cocoon', 'Sản phẩm được tạo từ những hạt cà phê Đăk Lăk nguyên chất xay nhuyễn, hòa quyện cùng bơ cacao Tiền Giang giúp loại bỏ tế bào chết hiệu quả, làm đều màu da, mang lại năng lượng, giúp da trở nên mềm mại và rạng rỡ.\r\nXuất xứ: Việt Nam\r\nThể tích: 600ml', '325000', '00817.webp', 1, NULL, NULL),
(23, 12, 8, 'Dầu xả DOVE', 'Kem xả Dove Phục Hồi Hư Tổn tái tạo tóc hư tổn cho mái tóc suôn mượt, khỏe đẹp, sản phẩm phù hợp với tóc hư tổn, khô, xơ rối.\r\nXuất xứ: Việt Nam\r\nKhối lượng: 610ml', '140000', '00981.jpg', 1, NULL, NULL),
(24, 11, 8, 'Sữa tắm LifeBuoy', 'Bảo vệ làn da vượt trội với Sữa tắm Lifebuoy Bảo vệ Vượt trội 10 chứa ion Bạc+ hỗ trợ đề kháng da tự nhiên, bọt kem có thể thấm sâu vào các lỗ chân lông, làm sạch sâu và loại bỏ 10 loại vi khuẩn gây bệnh, giúp bạn và gia đình có làn da sạch khỏe,\r\nXuất xứ: Việt Nam\r\nKhối lượng: 800gr', '120000', '0100.webp', 1, NULL, NULL),
(25, 9, 7, 'Son môi lì Dior', 'Son kem lì Dior Rouge Dior Forever Liquid 6ml Màu 999 Forever Dior Đỏ Tươi là sắc son đỏ huyền thoại quyến rũ và càng thu hút thêm sự yêu thích của mọi cô nàng. Chất son mềm mịn\r\nXuất xứ: Pháp\r\nTrọng lượng: 6g', '850000', '01132.jpg', 1, NULL, NULL),
(26, 9, 7, 'Kem nền Dior forever perfect makeup', 'Đây là một trong những loại kem nền được yêu thích nhất của Dior nhận được nhiều đánh giá tích cực từ các beauty blogger trên thế giới. Với ưu thế lớp nền hoàn hảo tối đa 16 giờ đem lại độ phủ vừa và để lại lớp sơn mờ sáng tự nhiên. Với công thức bắt sáng và độ chống nắng mức độ trung bình SPF 35 giúp bảo vệ da, giảm thiểu tối đa các lớp mỹ phẩm trên da, cho lớp nền mỏng nhẹ.\r\nXuất xứ: Pháp\r\nThể tích: 60ml', '1200000', '01213.jpg', 0, NULL, NULL),
(27, 10, 7, 'Nước hoa Dior Sauvage', 'Chắc hẳn dòng nước hoa Dior Sauvage EDP của Dior không còn quá xa lạ với đấng mày râu thích nước hoa, hầu như ai cũng thích mùi hương nam tính, mạnh mẽ này. Ra mắt từ năm 2015 và Dior Sauvage EDP luôn giữ top đầu trong danh sách những mùi hương mà đấng mày râu ưa thích.\r\nXuất xứ: Pháp\r\nThể tích: 100ml', '2750000', '01373.jpg', 1, NULL, NULL),
(28, 10, 6, 'Nước hoa Coco Chanel', 'Nước Hoa Chanel Coco Mademoiselle là một phiên bản bổ sung cho nét tính cách đầy tương phản của Gabrielle Chanel. Đó là biểu hiện cho nét nữ tính, một hương thơm sinh động, tươi mát và phức cảm dành cho những phụ nữ thanh lịch và quý phái.\r\nXuất xứ: Pháp\r\nThể tích: 100ml', '3450000', '0147.webp', 1, NULL, NULL),
(29, 8, 9, 'Xịt khoáng Avene', 'Xịt khoáng Avene 150ml giúp làm ổn định lớp make-up, dịu mát da, giảm hiệu ứng cháy nắng trên da, chống viêm nhiễm, mần đỏ da và giúp chăm sóc da.\r\nXuất xứ: Đức\r\nThể tích: 150ml', '270000', '01521.jpg', 1, NULL, NULL),
(30, 12, 8, 'Ủ tóc DOVE', 'Kem ủ Dove Keratin Cao Cấp Phục Hồi Hư Tổn, kết hợp sức mạnh Advanced Keratin Shot và Hydro Filler, bảo vệ tóc trước tác động nhiệt và hóa chất.\r\nXuất xứ: Thái Lan\r\nThể tích: 180ml', '95000', '01677.webp', 1, NULL, NULL),
(31, 8, 9, 'Kem chống nắng Avene', 'KCN UV Avene giúp cản nắng tối đa, ngăn da lão hóa đến 5 năm.\r\nXuất xứ: Indonesia\r\nThể tích: 100ml\r\nKem chống nắng UV Defender SPF 50+ PA ++++ giúp cản nắng tối đa, ngăn da lão hóa đến 5 năm.', '400000', '01762.jpg', 1, NULL, NULL),
(32, 12, 3, 'Thuốc nhuộm tóc L\'Oreal', 'Nước cân bằng da Cocoon chứa các thành phần tự nhiên như bí đao, rau má và tràm trà.\r\nXuất xứ: Việt Nam\r\nThể tích: 40ml\r\nThành phẩn nước bí đao cân bằng da Cocoon:\r\nCó thành phần tự nhiên gồm bí đao, rau má, tràm trà.', '145000', '0186.jpg', 1, NULL, NULL),
(33, 12, 3, 'Tinh dầu bưởi giúp mọc tóc Cocoon', 'Môi trường ô nhiễm và hóa chất là tác nhân gây hại đối với tóc và da đầu của bạn, chính điều này đã gây ra nấm và rụng tóc. Nước dưỡng tóc tinh dầu bưởi sẽ giúp bạn xóa đi nỗi lo rụng tóc với tinh dầu vỏ bưởi tự nhiên có đặc tính chống oxy hóa và làm sạch, kết hợp hoạt chất Xylishine và vitamin B5 cung cấp dưỡng chất tuyệt vời cho da đầu, thúc đẩy sự phát triển tóc chắc khỏe.\r\nXuất xứ: Việt Nam\r\nThể tích: 140ml', '130000', '0204.jpg', 1, NULL, NULL),
(34, 14, 9, 'Toner cân bằng da Cocoon', 'Kem nhuộm dưỡng tóc  L\'Oreal Paris Excellence Créme 172ml với tông màu phù  hợp làn da Châu Á cho phép bạn có thể tự nhuộm ngay tại nhà mà tóc vẫn óng ả, mượt mà.\r\nXuất xứ: Trung Quốc\r\nThể tích: 172ml', '145000', '01945.webp', 1, NULL, NULL),
(35, 14, 7, 'Cọ trang điểm mắt Dior', '- Cọ nền Dior #12 với đầu bằng được vát xéo, cho hiệu ứng trượt trên da dễ dàng sử dụng cho các sản phẩm nền dạng lỏng cũng như dạng thỏi. \r\n-Diorđược thiết kế theo tiêu chuẩn Châu Âu cao cấp, lông tự nhiên cho độ bắt sản phẩm cao nhất.\r\nXuất xứ: Pháp\r\nCây cọ sang trọng, cầm chắc tay, nhìn là yêu ngay các bạn nhé !!!!', '145000', '02159.jpg', 1, NULL, NULL),
(36, 14, 6, 'Túi đựng mỹ phẩm Chanel', 'Bộ cọ tán kem nền LES PINCEAUX DE CHANEL giúp bạn thao tác như một chuyên gia trang điểm thực thụ. CỌ ĐÁNH NỀN FLUID AND POWDER FOUNDATION giúp tạo độ che phủ đồng đều cho toàn khuôn mặt. Thiết kế CỌ TÁN KEM NỀN CÓ THỂ RÚT GỌN tiện dụng cho phép bạn dễ dàng mang theo bên mình, hoàn hảo cho từng loại phấn nền của Thương hiệu, giúp thao tác thật dễ dàng và chính xác.', '350000', '02282.webp', 1, NULL, NULL),
(37, 8, 7, 'Tẩy trang Dior Lotion to Foam', 'Dior hydra life micillar water được xem như một loại \"nước thần\" hiệu quả đảm nhiệm tốt cả hai nhiệm vụ tẩy trang, dưỡng da và dưỡng ẩm. Với nhiều ưu điểm về thành phần cũng như công dụng nên sản phẩm này được đánh giá là một trong những sản phẩm được yêu thích nhất của Dior.\r\nNước micillar water dành lau sạch bụi , makeup kiểu nhẹ và cho những ngày làm biếng remover makeup, đặc biệt làm da cực mịn', '1000000', '02462.jpg', 1, NULL, NULL),
(38, 14, 7, 'Bộ cọ đánh nền Dior', 'Bộ cọ tán kem nền LES PINCEAUX DE CHANEL giúp bạn thao tác như một chuyên gia trang điểm thực thụ. CỌ ĐÁNH NỀN FLUID AND POWDER FOUNDATION giúp tạo độ che phủ đồng đều cho toàn khuôn mặt. Thiết kế CỌ TÁN KEM NỀN CÓ THỂ RÚT GỌN tiện dụng cho phép bạn dễ dàng mang theo bên mình, hoàn hảo cho từng loại phấn nền của Thương hiệu, giúp thao tác thật dễ dàng và chính xác.', '345000', '02363.jpg', 1, NULL, NULL),
(39, 13, 8, 'Kem đánh răng P/S', 'Kem đánh răng P/S được đánh giá tốt nhất tại Việt Nam. Kem đánh răng P/S bảo vệ 123 chăm sóc toàn diện 230g tăng cường mạnh mẽ hoạt chất Perlite và hương bạc hà the mát cho răng trắng sáng. Kem đánh răng giúp mang lại hơi thở luôn thơm mát.\r\nXuất xứ: Việt Nam\r\nKhối lượng: 230g', '40000', '02543.jpg', 1, NULL, NULL),
(40, 13, 8, 'Kem đánh răng CloseUp', 'Closeup là nhãn hiệu kem đánh răng được nhiều người tin dùng nhất trên thị trường. Bộ bàn chải đánh răng và kem đánh răng Closeup muối biển và chanh 230g giúp làm sáng răng, loại bỏ vết ố, ngăn ngừa sâu răng và mùi hôi trong hơi thở, đồng thời lưu lại hơi thở thơm mát dài lâu.\r\nXuất xứ: Việt Nam\r\nKhối lượng: 230g', '45000', '02696.jpg', 1, NULL, NULL),
(41, 13, 8, 'Bàn chải điện P/S', 'Bàn chải điện P/S S100 PRO sử dụng công nghệ sóng âm Sonic giúp làm sạch mảng bám tới 10 lần so với bàn chải thông thường. \r\n- Bộ sản phẩm bao gồm: 01 thân bàn chải điện, 02 đầu chải*, 01 bộ sạc USB *02 đầu chải nhận kèm là Sạch Sâu \r\nĐặc điểm vượt trội: \r\n- Công nghệ sóng âm tiên tiến tạo nên các hạt siêu bọt \r\n- Microbubble, sạch hiệu quả mà vẫn dịu nhẹ cho nướu', '1040000', '02782.jpg', 1, NULL, NULL),
(42, 10, 6, 'Nước hoa Chanel Bleu De Chanel', 'Set Nước Hoa Chanel Bleu De Chanel EDP (3x20ML) - Tiện Lợi Khi Đi Chơi, Du Lịch\r\n- Nước hoa Chanel Bleu được ra mắt vào năm 2010 dưới bàn tay tài hoa của nhà điều chế Jacques Polge đã sáng tạo mùi thơm danh tiếng nhất của dòng nước hoa Chanel nam.', '2750000', '02846.webp', 1, NULL, NULL),
(43, 14, 6, 'Kệ trang điểm Chanel 4 tầng', 'Khay Kệ Trang Điểm Chanel 3 Tầng là mẫu mới nhất trong bộ sưu tập Hộp đựng mỹ phẩm Chanel cao cấp. Với chất liệu Acrylic đen bóng sang trọng. Kệ kích thước to đựng được rất nhiều vật dụng trang điểm.\r\nChất liệu khay được làm bằng Acrylic đen bóng cao cấp, cho độ bóng và sáng tuyệt đối so với các loại nhựa tổng hợp thông thường.\r\nKhay Kệ Trang Điểm Chanel 4 Tầng là mẫu thiết kế mới nhất 2019 trong bộ sưu tập Khay Đựng Mỹ Phẩm Chanel.', '1550000', '02952.jpg', 1, NULL, NULL),
(44, 9, 6, 'Kem che khuyết điểm', 'Kem che khuyết điểm thần thánh Le Correcteur De Chanel được coi là vị cứu tinh của chị em phụ nữ giúp che đi những vùng da chưa hoàn hảo trên khuôn mặt như thâm mụn, da không đều màu, nám, bọng mắt. Giúp cho bạn có được lớp makeup trờ nên thật hoàn hơn.\r\nChe khuyết điểm Chanel chứa Abricot Corrector làm giảm sự xuất hiện của các đốm đen và quầng thâm, đồng thời khắc phục tình trạng tăng sắc tố. Có kết cấu dạng lỏng, mỏng nhẹ và vô cùng dễ tán. Rất dễ tán, để lại trên da để lại 1 lớp lì và mịn mướt.', '900000', '03051.webp', 1, NULL, NULL),
(46, 15, 9, 'sSS', NULL, '10', '174665078.png', 0, NULL, NULL),
(47, 13, 9, 'a', 'a', '500', 'b28.png', 1, NULL, NULL),
(48, 15, 8, 'anv', NULL, '900000', '112.png', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_shipping`
--
-- Tạo: Th10 29, 2023 lúc 05:31 PM
--

CREATE TABLE `tbl_shipping` (
  `shipping_id` int(10) UNSIGNED NOT NULL,
  `shipping_name` varchar(255) NOT NULL,
  `shipping_email` varchar(255) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`shipping_id`, `shipping_name`, `shipping_email`, `shipping_address`, `created_at`, `updated_at`) VALUES
(1, 'a', 'a', 'a', NULL, NULL),
(2, 'a', 'aa', 'a', NULL, NULL),
(3, 'nghia', 'nghia@gmail.com', 'hp', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--
-- Tạo: Th10 29, 2023 lúc 05:31 PM
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `tbl_brand_product`
--
ALTER TABLE `tbl_brand_product`
  ADD PRIMARY KEY (`brand_id`);

--
-- Chỉ mục cho bảng `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  ADD PRIMARY KEY (`cate_id`);

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Chỉ mục cho bảng `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_brand_product`
--
ALTER TABLE `tbl_brand_product`
  MODIFY `brand_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  MODIFY `cate_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `order_details_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `shipping_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
