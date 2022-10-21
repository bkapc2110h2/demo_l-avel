
INSERT INTO `categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Túi xách', 1, '2022-10-17 20:34:43', '2022-10-17 20:34:43'),
(2, 'Ví da cao cấp', 1, '2022-10-17 20:34:59', '2022-10-17 20:34:59'),
(3, 'Đồng hồ', 1, '2022-10-17 20:35:07', '2022-10-17 20:35:07'),
(4, 'Aos quaanf', 1, '2022-10-17 20:58:32', '2022-10-17 20:58:32');


INSERT INTO `products` (`id`, `name`, `image`, `price`, `sale_price`, `content`, `status`, `category_id`, `created_at`, `updated_at`, `deleted_at`, `short_description`) VALUES
(1, 'Áo sơ mi nam', 'sample-3.jpg', 500000.000, 400000.000, 'Đây là sản phẩm mode mới', 0, 3, '2022-10-17 20:51:51', '2022-10-17 20:57:29', '2022-10-18', NULL),
(2, 'Bộ áo sơ mi mode 2022', 'ao-3.jpg', 350000.000, 200000.000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur facere possimus quam, sit ullam fuga quisquam cum? Deserunt molestiae vitae rem quos rerum cum ratione reiciendis, ipsa reprehenderit, ipsam molestias?', 0, 4, '2022-10-17 21:00:42', '2022-10-17 21:19:46', NULL, NULL),
(3, 'Áo thun muuaf hè 2022', 'ao-2.jpeg', 350000.000, 250000.000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur facere possimus quam, sit ullam fuga quisquam cum? Deserunt molestiae vitae rem quos rerum cum ratione reiciendis, ipsa reprehenderit, ipsam molestias?', 0, 4, '2022-10-17 21:12:20', '2022-10-17 21:19:37', NULL, NULL);

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Manager', 'admin@gmail.com', NULL, '$2y$10$zgJyAoj9W2YIOFSIicuGbuTARUvvPEdVSURkikaQsg6jE421zdvPG', NULL, NULL, NULL);
