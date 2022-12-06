<?php

use app\core\Application;

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

class m0001_initial
{
    public function up()
    {
        $db = Application::$app->db;
        $sql = "
            --
            -- Table structure for table `users`
            --

            CREATE TABLE `users` (
            `id` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
            `firstname` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
            `lastname` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
            `email` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
            `phone_number` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
            `password` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
            `image_url` varchar(4000) COLLATE utf8mb4_vietnamese_ci NOT NULL,
            `address` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
            `ward_id` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
            `district_id` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
            `province_id` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
            `role` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
            `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
            `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

            -- ---------------------------------------------------------
            --
            -- Table structure for table `stores`
            --

            CREATE TABLE `stores` (
            `id` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
            `address` varchar(1000) COLLATE utf8mb4_vietnamese_ci NOT NULL,
            `status` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
            `image_url` varchar(4000) COLLATE utf8mb4_vietnamese_ci NOT NULL,
            `open_time` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
            `phone` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
            `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
            `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

            --
            -- Table structure for table `categories`
            --
            CREATE TABLE `categories` (
            `id` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
            `name` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
            `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
            `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;
            -- --------------------------------------------------------
            
            --
            -- Table structure for table `products`
            --
            CREATE TABLE `products` (
            `id` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
            `category_id` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
            `name` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
            `company` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
            `image_url` varchar(1000) COLLATE utf8mb4_vietnamese_ci NOT NULL,
            `price_show` int(12) NOT NULL,
            `price_through` int(12) NOT NULL,
            `discount` int(3) NOT NULL,
            `description` varchar(4000) COLLATE utf8mb4_vietnamese_ci NOT NULL,
            `star` int(12),
            `rate_count` int(12),
            `screen` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
            `os` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
            `camera` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
            `camera_front` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
            `cpu` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
            `ram` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
            `rom` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
            `micro_usb` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
            `battery` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
            `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
            `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

            -- ---------------------------------------------------------

            --
            -- Table structure for table `productincart`
            --
            CREATE TABLE `productincart` (
                `user_id` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
                `product_id` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
                `quantity` int(4) NOT NULL DEFAULT 1,
                `price` int(12) NOT NULL DEFAULT 1,
                `order_id` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL DEFAULT ''
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;
            -- ---------------------------------------------------------

            --
            -- Table structure for table `orders`
            --
            CREATE TABLE orders(
                `id` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
                `user_id` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
                `order_status` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL DEFAULT 'Đang chờ duyệt',
                `username` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
                `email` varchar(100) NOT NULL,
                `address` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
                `order_description` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL DEFAULT '',
                `price`int(12) DEFAULT 0,
                `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
                `payment_status` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL DEFAULT 'Chưa thanh toán'
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;
            --
            -- Indexes for table `users`
            --
            ALTER TABLE `users`
            ADD PRIMARY KEY (`id`);

            --
            -- Indexes for table `categories`
            --
            ALTER TABLE `categories`
            ADD PRIMARY KEY (`id`);

            --
            -- Indexes for table `products`
            --
            ALTER TABLE `products`
            ADD PRIMARY KEY (`id`),
            ADD KEY `category_id` (`category_id`);

            --
            -- Indexes for table `stores`
            --
            ALTER TABLE `stores`
            ADD PRIMARY KEY (`id`);

            --
            -- Indexes for table `productincart`
            --
            ALTER TABLE `productincart`
            ADD PRIMARY KEY (`user_id`,`product_id`,`order_id`);

            --
            -- Indexes for table `orders`
            --
            ALTER TABLE `orders`
            ADD PRIMARY KEY (`id`);
        ";
        $db->pdo->exec($sql);
    }

    public function down()
    {
        $db = Application::$app->db;
        $resolution = explode('dbname=', $_ENV['DB_DSN']);
		$dbname = $resolution[1];
        $sql = "DROP DATABASE $dbname;";
        $db->pdo->exec($sql);
    }
}