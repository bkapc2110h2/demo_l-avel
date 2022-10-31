DROP DATABASE IF EXISTS `phpbkap`;

CREATE DATABASE `phpbkap` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

use phpbkap;

CREATE TABLE IF NOT EXISTS `categories` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL UNIQUE,
  `status` TINYINT DEFAULT '1',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATE NULL
) ENGINE = InnoDB;

INSERT INTO `categories` (`name`, `status`, `created_at`, `updated_at`) VALUES
('Túi xách', 1, '2022-10-17 20:34:43', '2022-10-17 20:34:43'),
( 'Ví da cao cấp', 1, '2022-10-17 20:34:59', '2022-10-17 20:34:59'),
('Đồng hồ', 1, '2022-10-17 20:35:07', '2022-10-17 20:35:07'),
('Aos quaanf', 1, '2022-10-17 20:58:32', '2022-10-17 20:58:32');

CREATE TABLE IF NOT EXISTS `products` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `IMAGE` VARCHAR(100) NOT NULL,
  `price` float(10,3) NOT NULL,
  `sale_price` float(10,3) DEFAULT '0',
  `content` TEXT,
  `status` TINYINT DEFAULT '1',
  `category_id` INT NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATE NULL,
  FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE = InnoDB;