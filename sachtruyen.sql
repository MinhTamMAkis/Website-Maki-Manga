-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 07, 2023 lúc 06:22 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `sachtruyen`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chapter`
--

CREATE TABLE `chapter` (
  `id` int(10) UNSIGNED NOT NULL,
  `truyen_id` int(10) UNSIGNED NOT NULL,
  `tieude` varchar(255) NOT NULL,
  `tomtat` varchar(255) NOT NULL,
  `noidung` text NOT NULL,
  `kichhoat` int(11) NOT NULL,
  `slug_chapter` varchar(255) NOT NULL,
  `hinhanh` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chapter`
--

INSERT INTO `chapter` (`id`, `truyen_id`, `tieude`, `tomtat`, `noidung`, `kichhoat`, `slug_chapter`, `hinhanh`) VALUES
(69, 6, 'Chapter 1', 'Yumiera Dorkness là con gái của một Bá tước, bị mọi người và cả chính cha mẹ mình ghẻ lạnh.....', 'Yumiera Dorkness là con gái của một Bá tước, bị mọi người và cả chính cha mẹ mình ghẻ lạnh chỉ vì màu tóc, nguyên nhân là do Ma Vương tóc cũng màu đen giống hệt cô. Một hôm cô chợt nhớ ra được kí ức kiếp trước và cô đã trọng sinh vào một Otome game, cô không trọng sinh vào nữ chính mà lại là nữ phụ phản diện – người mà sau này trở thành trùm cuối của game!? Đây chính là một cuộc hành trình kể về một cô gái chống lại số phận nghiệt ngã, sống một cuộc đời yên bình và tránh trở thành trùm cuối để rồi dính bad end!', 0, 'chapter-1', '[\"public\\/upload\\/chapter\\/nu-phu-phan-dien-lv99-toi-la-trum-cuoi-nhung-khong-phai-la-ma-vuong\\/chapter-1\\/036.jpg\",\"public\\/upload\\/chapter\\/nu-phu-phan-dien-lv99-toi-la-trum-cuoi-nhung-khong-phai-la-ma-vuong\\/chapter-1\\/035.jpg\",\"public\\/upload\\/chapter\\/nu-phu-phan-dien-lv99-toi-la-trum-cuoi-nhung-khong-phai-la-ma-vuong\\/chapter-1\\/034.jpg\",\"public\\/upload\\/chapter\\/nu-phu-phan-dien-lv99-toi-la-trum-cuoi-nhung-khong-phai-la-ma-vuong\\/chapter-1\\/033.jpg\",\"public\\/upload\\/chapter\\/nu-phu-phan-dien-lv99-toi-la-trum-cuoi-nhung-khong-phai-la-ma-vuong\\/chapter-1\\/032.jpg\",\"public\\/upload\\/chapter\\/nu-phu-phan-dien-lv99-toi-la-trum-cuoi-nhung-khong-phai-la-ma-vuong\\/chapter-1\\/031.jpg\",\"public\\/upload\\/chapter\\/nu-phu-phan-dien-lv99-toi-la-trum-cuoi-nhung-khong-phai-la-ma-vuong\\/chapter-1\\/030.jpg\",\"public\\/upload\\/chapter\\/nu-phu-phan-dien-lv99-toi-la-trum-cuoi-nhung-khong-phai-la-ma-vuong\\/chapter-1\\/029.jpg\",\"public\\/upload\\/chapter\\/nu-phu-phan-dien-lv99-toi-la-trum-cuoi-nhung-khong-phai-la-ma-vuong\\/chapter-1\\/028.jpg\",\"public\\/upload\\/chapter\\/nu-phu-phan-dien-lv99-toi-la-trum-cuoi-nhung-khong-phai-la-ma-vuong\\/chapter-1\\/027.jpg\",\"public\\/upload\\/chapter\\/nu-phu-phan-dien-lv99-toi-la-trum-cuoi-nhung-khong-phai-la-ma-vuong\\/chapter-1\\/026.jpg\",\"public\\/upload\\/chapter\\/nu-phu-phan-dien-lv99-toi-la-trum-cuoi-nhung-khong-phai-la-ma-vuong\\/chapter-1\\/025.jpg\",\"public\\/upload\\/chapter\\/nu-phu-phan-dien-lv99-toi-la-trum-cuoi-nhung-khong-phai-la-ma-vuong\\/chapter-1\\/024.jpg\",\"public\\/upload\\/chapter\\/nu-phu-phan-dien-lv99-toi-la-trum-cuoi-nhung-khong-phai-la-ma-vuong\\/chapter-1\\/023.jpg\",\"public\\/upload\\/chapter\\/nu-phu-phan-dien-lv99-toi-la-trum-cuoi-nhung-khong-phai-la-ma-vuong\\/chapter-1\\/022.jpg\",\"public\\/upload\\/chapter\\/nu-phu-phan-dien-lv99-toi-la-trum-cuoi-nhung-khong-phai-la-ma-vuong\\/chapter-1\\/021.jpg\",\"public\\/upload\\/chapter\\/nu-phu-phan-dien-lv99-toi-la-trum-cuoi-nhung-khong-phai-la-ma-vuong\\/chapter-1\\/020.jpg\",\"public\\/upload\\/chapter\\/nu-phu-phan-dien-lv99-toi-la-trum-cuoi-nhung-khong-phai-la-ma-vuong\\/chapter-1\\/019.jpg\",\"public\\/upload\\/chapter\\/nu-phu-phan-dien-lv99-toi-la-trum-cuoi-nhung-khong-phai-la-ma-vuong\\/chapter-1\\/018.jpg\",\"public\\/upload\\/chapter\\/nu-phu-phan-dien-lv99-toi-la-trum-cuoi-nhung-khong-phai-la-ma-vuong\\/chapter-1\\/017.jpg\",\"public\\/upload\\/chapter\\/nu-phu-phan-dien-lv99-toi-la-trum-cuoi-nhung-khong-phai-la-ma-vuong\\/chapter-1\\/016.jpg\",\"public\\/upload\\/chapter\\/nu-phu-phan-dien-lv99-toi-la-trum-cuoi-nhung-khong-phai-la-ma-vuong\\/chapter-1\\/015.jpg\",\"public\\/upload\\/chapter\\/nu-phu-phan-dien-lv99-toi-la-trum-cuoi-nhung-khong-phai-la-ma-vuong\\/chapter-1\\/014.jpg\",\"public\\/upload\\/chapter\\/nu-phu-phan-dien-lv99-toi-la-trum-cuoi-nhung-khong-phai-la-ma-vuong\\/chapter-1\\/013.jpg\",\"public\\/upload\\/chapter\\/nu-phu-phan-dien-lv99-toi-la-trum-cuoi-nhung-khong-phai-la-ma-vuong\\/chapter-1\\/012.jpg\",\"public\\/upload\\/chapter\\/nu-phu-phan-dien-lv99-toi-la-trum-cuoi-nhung-khong-phai-la-ma-vuong\\/chapter-1\\/011.jpg\",\"public\\/upload\\/chapter\\/nu-phu-phan-dien-lv99-toi-la-trum-cuoi-nhung-khong-phai-la-ma-vuong\\/chapter-1\\/010.jpg\",\"public\\/upload\\/chapter\\/nu-phu-phan-dien-lv99-toi-la-trum-cuoi-nhung-khong-phai-la-ma-vuong\\/chapter-1\\/009.jpg\",\"public\\/upload\\/chapter\\/nu-phu-phan-dien-lv99-toi-la-trum-cuoi-nhung-khong-phai-la-ma-vuong\\/chapter-1\\/008.jpg\",\"public\\/upload\\/chapter\\/nu-phu-phan-dien-lv99-toi-la-trum-cuoi-nhung-khong-phai-la-ma-vuong\\/chapter-1\\/007.jpg\",\"public\\/upload\\/chapter\\/nu-phu-phan-dien-lv99-toi-la-trum-cuoi-nhung-khong-phai-la-ma-vuong\\/chapter-1\\/006.jpg\",\"public\\/upload\\/chapter\\/nu-phu-phan-dien-lv99-toi-la-trum-cuoi-nhung-khong-phai-la-ma-vuong\\/chapter-1\\/005.jpg\",\"public\\/upload\\/chapter\\/nu-phu-phan-dien-lv99-toi-la-trum-cuoi-nhung-khong-phai-la-ma-vuong\\/chapter-1\\/004.jpg\",\"public\\/upload\\/chapter\\/nu-phu-phan-dien-lv99-toi-la-trum-cuoi-nhung-khong-phai-la-ma-vuong\\/chapter-1\\/003.jpg\"]'),
(70, 6, 'Chapter 2', 'ts', 'ts', 0, 'chapter-2', '[\"public\\/upload\\/chapter\\/nu-phu-phan-dien-lv99-toi-la-trum-cuoi-nhung-khong-phai-la-ma-vuong\\/chapter-2\\/006.jpg\",\"public\\/upload\\/chapter\\/nu-phu-phan-dien-lv99-toi-la-trum-cuoi-nhung-khong-phai-la-ma-vuong\\/chapter-2\\/005.jpg\",\"public\\/upload\\/chapter\\/nu-phu-phan-dien-lv99-toi-la-trum-cuoi-nhung-khong-phai-la-ma-vuong\\/chapter-2\\/004.jpg\",\"public\\/upload\\/chapter\\/nu-phu-phan-dien-lv99-toi-la-trum-cuoi-nhung-khong-phai-la-ma-vuong\\/chapter-2\\/003.jpg\"]'),
(72, 8, 'Chapter 1', 'ts', 'ts', 0, 'chapter-1', '[\"public\\/upload\\/chapter\\/boku-no-kokoro-yabai-yatsu\\/chapter-1\\/017.jpg\",\"public\\/upload\\/chapter\\/boku-no-kokoro-yabai-yatsu\\/chapter-1\\/016.jpg\",\"public\\/upload\\/chapter\\/boku-no-kokoro-yabai-yatsu\\/chapter-1\\/015.jpg\",\"public\\/upload\\/chapter\\/boku-no-kokoro-yabai-yatsu\\/chapter-1\\/014.jpg\",\"public\\/upload\\/chapter\\/boku-no-kokoro-yabai-yatsu\\/chapter-1\\/013.jpg\",\"public\\/upload\\/chapter\\/boku-no-kokoro-yabai-yatsu\\/chapter-1\\/012.jpg\",\"public\\/upload\\/chapter\\/boku-no-kokoro-yabai-yatsu\\/chapter-1\\/011.jpg\",\"public\\/upload\\/chapter\\/boku-no-kokoro-yabai-yatsu\\/chapter-1\\/010.jpg\",\"public\\/upload\\/chapter\\/boku-no-kokoro-yabai-yatsu\\/chapter-1\\/009.jpg\",\"public\\/upload\\/chapter\\/boku-no-kokoro-yabai-yatsu\\/chapter-1\\/008.jpg\",\"public\\/upload\\/chapter\\/boku-no-kokoro-yabai-yatsu\\/chapter-1\\/007.jpg\",\"public\\/upload\\/chapter\\/boku-no-kokoro-yabai-yatsu\\/chapter-1\\/006.jpg\",\"public\\/upload\\/chapter\\/boku-no-kokoro-yabai-yatsu\\/chapter-1\\/005.jpg\",\"public\\/upload\\/chapter\\/boku-no-kokoro-yabai-yatsu\\/chapter-1\\/004.jpg\",\"public\\/upload\\/chapter\\/boku-no-kokoro-yabai-yatsu\\/chapter-1\\/003.jpg\",\"public\\/upload\\/chapter\\/boku-no-kokoro-yabai-yatsu\\/chapter-1\\/002.jpg\"]'),
(73, 9, 'Chapter 1', 'ts', 'ts', 0, 'chapter-1', '[\"public\\/upload\\/chapter\\/tsuka-no-ma-no-ichika\\/chapter-1\\/017.jpg\",\"public\\/upload\\/chapter\\/tsuka-no-ma-no-ichika\\/chapter-1\\/016.jpg\",\"public\\/upload\\/chapter\\/tsuka-no-ma-no-ichika\\/chapter-1\\/015.jpg\",\"public\\/upload\\/chapter\\/tsuka-no-ma-no-ichika\\/chapter-1\\/014.jpg\",\"public\\/upload\\/chapter\\/tsuka-no-ma-no-ichika\\/chapter-1\\/013.jpg\",\"public\\/upload\\/chapter\\/tsuka-no-ma-no-ichika\\/chapter-1\\/012.jpg\",\"public\\/upload\\/chapter\\/tsuka-no-ma-no-ichika\\/chapter-1\\/011.jpg\",\"public\\/upload\\/chapter\\/tsuka-no-ma-no-ichika\\/chapter-1\\/010.jpg\",\"public\\/upload\\/chapter\\/tsuka-no-ma-no-ichika\\/chapter-1\\/009.jpg\",\"public\\/upload\\/chapter\\/tsuka-no-ma-no-ichika\\/chapter-1\\/008.jpg\",\"public\\/upload\\/chapter\\/tsuka-no-ma-no-ichika\\/chapter-1\\/007.jpg\",\"public\\/upload\\/chapter\\/tsuka-no-ma-no-ichika\\/chapter-1\\/006.jpg\",\"public\\/upload\\/chapter\\/tsuka-no-ma-no-ichika\\/chapter-1\\/005.jpg\",\"public\\/upload\\/chapter\\/tsuka-no-ma-no-ichika\\/chapter-1\\/004.jpg\",\"public\\/upload\\/chapter\\/tsuka-no-ma-no-ichika\\/chapter-1\\/003.jpg\",\"public\\/upload\\/chapter\\/tsuka-no-ma-no-ichika\\/chapter-1\\/002.jpg\"]');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) UNSIGNED NOT NULL,
  `tendanhmuc` varchar(255) NOT NULL,
  `slug_` varchar(255) NOT NULL,
  `mota` varchar(255) NOT NULL,
  `kichhoat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `tendanhmuc`, `slug_`, `mota`, `kichhoat`) VALUES
(4, 'Truyện hentai', 'truyen-hentai', 'truyện 18+ của nhật bản', 1),
(5, 'Truyện lãng mạn', 'truyen-lang-man', 'Truyện tình cảm nam nữ yêu nhau', 0),
(8, 'Hành động', 'hanh-dong', 'sss', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
(5, '2014_10_12_100000_create_password_resets_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
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
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `id` int(10) UNSIGNED NOT NULL,
  `tentheloai` varchar(255) NOT NULL,
  `slug_theloai` varchar(255) NOT NULL,
  `mota` text NOT NULL,
  `kichhoat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`id`, `tentheloai`, `slug_theloai`, `mota`, `kichhoat`) VALUES
(1, 'Lãng mạn', 'lang-man', 'truyện tình cảm', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `truyen`
--

CREATE TABLE `truyen` (
  `id` int(10) UNSIGNED NOT NULL,
  `tentruyen` varchar(255) NOT NULL,
  `tac_gia` varchar(250) NOT NULL,
  `tomtat` text NOT NULL,
  `danhmuc_id` int(11) NOT NULL,
  `hinhanh` varchar(255) NOT NULL,
  `slug_truyen` varchar(255) NOT NULL,
  `kichhoat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `truyen`
--

INSERT INTO `truyen` (`id`, `tentruyen`, `tac_gia`, `tomtat`, `danhmuc_id`, `hinhanh`, `slug_truyen`, `kichhoat`) VALUES
(6, 'NỮ PHỤ PHẢN DIỆN LV99! TÔI LÀ TRÙM CUỐI NHƯNG KHÔNG PHẢI LÀ MA VƯƠNG!', 'Tanabata Satori, Nokomi, Tea', 'Yumiera Dorkness là con gái của một Bá tước, bị mọi người và cả chính cha mẹ mình ghẻ lạnh chỉ vì màu tóc, nguyên nhân là do Ma Vương tóc cũng màu đen giống hệt cô. Một hôm cô chợt nhớ ra được kí ức kiếp trước và cô đã trọng sinh vào một Otome game, cô không trọng sinh vào nữ chính mà lại là nữ phụ phản diện – người mà sau này trở thành trùm cuối của game!? Đây chính là một cuộc hành trình kể về một cô gái chống lại số phận nghiệt ngã, sống một cuộc đời yên bình và tránh trở thành trùm cuối để rồi dính bad end!', 8, 'nu-phu-phan-dien-lv99-toi-la-trum-cuoi-n-20373.jpg', 'nu-phu-phan-dien-lv99-toi-la-trum-cuoi-nhung-khong-phai-la-ma-vuong', 0),
(7, 'Hololive', 'Không biết', 'ts', 8, '2d35d1c54202402db6fd7209cca059ec17.jpg', 'hololive', 0),
(8, 'BOKU NO KOKORO YABAI YATSU', 'Sakurai Norio - Goru', 'ts', 5, 'boku-no-kokoro-yabai-yatsu-670346.jpg', 'boku-no-kokoro-yabai-yatsu', 0),
(9, 'Tsuka no Ma no Ichika', 'Khong biet', 'ts', 5, '00296.jpg', 'tsuka-no-ma-no-ichika', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
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
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Minh Tâm', 'chanhchanh145@gmail.com', NULL, '$2y$10$jSHiDPS2c.DewmjZPuLoHeSJjA05ylDXcxPOI46GHw8SPEWO/hwoW', 'gIup04hNq34SLuxr0LwCUwBDFmKscXILT7b2GVlSPHvxBa9TqjdRU40lrlHh', '2023-07-04 04:56:01', '2023-07-04 04:56:01');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `truyen_id` (`truyen_id`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

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
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `truyen`
--
ALTER TABLE `truyen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `danhmuc_id` (`danhmuc_id`);

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
-- AUTO_INCREMENT cho bảng `chapter`
--
ALTER TABLE `chapter`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `theloai`
--
ALTER TABLE `theloai`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `truyen`
--
ALTER TABLE `truyen`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
