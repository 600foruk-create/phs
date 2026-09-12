-- phpMyAdmin SQL Dump
-- Hostinger Database Schema for Bismillah Pak Darbar

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- --------------------------------------------------------

-- Table structure for table `users`
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `role` enum('Admin','Staff','Kitchen') NOT NULL DEFAULT 'Staff',
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  
  -- Permissions
  `p_dashboard` tinyint(1) NOT NULL DEFAULT 0,
  `p_view_orders` tinyint(1) NOT NULL DEFAULT 0,
  `p_take_orders` tinyint(1) NOT NULL DEFAULT 0,
  `p_menu_manage` tinyint(1) NOT NULL DEFAULT 0,
  `p_tables_manage` tinyint(1) NOT NULL DEFAULT 0,
  `p_staff_manage` tinyint(1) NOT NULL DEFAULT 0,
  
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert default admin user (Password: admin123)
-- Note: In a real scenario, use password_hash() in PHP. This is a plain MD5 for simple setup, or we'll handle it in PHP.
INSERT INTO `users` (`username`, `password_hash`, `role`, `p_dashboard`, `p_menu_manage`, `p_tables_manage`, `p_staff_manage`) VALUES
('admin', '0192023a7bbd73250516f069df18b500', 'Admin', 1, 1, 1, 1);

-- --------------------------------------------------------

-- Table structure for table `categories`
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

-- Table structure for table `menu_items`
CREATE TABLE `menu_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `image_url` varchar(255) DEFAULT NULL,
  `offer_price` decimal(10,2) DEFAULT NULL,
  `offer_start` datetime DEFAULT NULL,
  `offer_end` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`category_id`) REFERENCES `categories`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

-- Table structure for table `restaurant_tables`
CREATE TABLE `restaurant_tables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table_number` int(11) NOT NULL,
  `capacity` int(11) NOT NULL DEFAULT 4,
  `status` enum('Available','Occupied','Disabled') NOT NULL DEFAULT 'Available',
  `qr_code_hash` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `table_number` (`table_number`),
  UNIQUE KEY `qr_code_hash` (`qr_code_hash`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

-- Table structure for table `orders`
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table_id` int(11) NOT NULL,
  `status` enum('Pending','Preparing','Ready','Served','Cancelled','Completed') NOT NULL DEFAULT 'Pending',
  
  `subtotal` decimal(10,2) NOT NULL DEFAULT 0.00,
  `service_charge` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  
  `payment_status` enum('Unpaid','Paid') NOT NULL DEFAULT 'Unpaid',
  `payment_method` varchar(50) DEFAULT NULL,
  
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`table_id`) REFERENCES `restaurant_tables`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

-- Table structure for table `order_items`
CREATE TABLE `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `menu_item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price_at_time` decimal(10,2) NOT NULL,
  `notes` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`order_id`) REFERENCES `orders`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`menu_item_id`) REFERENCES `menu_items`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

COMMIT;
