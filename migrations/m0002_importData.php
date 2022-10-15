<?php

use app\core\Application;

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

class m0002_importData
{
    public function up()
    {
        $db = Application::$app->db;
		$resolution = explode('dbname=', $_ENV['DB_DSN']);
		$dbname = $resolution[1];
        $sql = "INSERT INTO $dbname.stores (id,address,status,image_url,created_at,updated_at,open_time,phone) VALUES
        ('117','114 Đường 9A Khu Dân cư Trung Sơn','hoạt động','/images/store/store-1.jpeg','2022-09-30 03:15:23','2021-10-30 03:15:23','7:00 - 22:00','02871087088'),
        ('129','93/5 Nguyễn Ảnh Thủ','hoạt động','/images/store/store-2.jpeg','2022-09-30 03:15:23','2021-10-30 03:15:23','7:00 - 22:00','02871087088'),
        ('18','141 Nguyễn Thái Bình','hoạt động','/images/store/store-3.jpeg','2023-09-30 03:15:23','2021-10-30 03:15:23','7:00 - 22:00','02871087088');";
        $db->pdo->exec($sql);

		$db = Application::$app->db;
        $sql = "INSERT INTO $dbname.users (id,firstname,lastname,email,phone_number,password,image_url,address,ward_id,district_id,province_id,role,created_at,updated_at) VALUES 
        ('6191e42fe4e3f','Volodymyr','Zelensky','admin@bkphones.com','19006969','" . password_hash('12345678', PASSWORD_DEFAULT) . "','','HCM City','','','','admin','2021-11-15 11:38:07','2021-11-15 11:38:07');";
        $db->pdo->exec($sql);
        
        $db = Application::$app->db;
        $sql = "INSERT INTO $dbname.products (id,category_id,name,image_url,price_show,price_through,discount,description,created_at,updated_at) VALUES
        ('5b03966a1acd4d5bbd672373','1','iPhone 14 Pro Max 128GB | Chính hãng VN/A','https://cdn2.cellphones.com.vn/358x/media/catalog/product/t/_/t_m_18.png','33990000','34990000','1','[HOT] Thu cũ lên đời giá cao - Thủ tục nhanh - Trợ giá lên tới 1.000.000đ','2022-10-10 02:31:49','2021-11-11 15:09:29'),
	    ('5b03966a1acd4d5bbd672374','1','iPhone 11 64GB I Chính hãng VN/A','https://cdn2.cellphones.com.vn/358x/media/catalog/product/3/_/3_225.jpg','14990000','15990000','1','[HOT] Thu cũ lên đời giá cao - Thủ tục nhanh - Trợ giá lên tới 1.000.000đ','2022-10-10 02:31:49','2022-10-10 02:31:49'),
	    ('5b03966a1acd4d5bbd672375','1','iPhone 13 Pro Max 128GB | Chính hãng VN/A','https://cdn2.cellphones.com.vn/358x/media/catalog/product/3/_/3_51_1_7.jpg','36990000','37990000','1','[HOT] Thu cũ lên đời giá cao - Thủ tục nhanh - Trợ giá lên tới 1.000.000đ','2022-10-10 02:56:12','2022-10-10 02:56:12'),
	    ('5b03966a1acd4d5bbd672377','1','iPhone 14 Pro Max 256GB | Chính hãng VN/A','https://cdn2.cellphones.com.vn/358x/media/catalog/product/v/_/v_ng_20.png','28990000','29990000','1','[HOT] Thu cũ lên đời giá cao - Thủ tục nhanh - Trợ giá lên tới 1.000.000đ','2022-10-10 02:31:49','2022-10-10 02:31:49'),
	    ('5b03966a1acd4d5bbd672378','1','iPhone 12 Pro Max 128GB I Chính hãng VN/A','https://cdn2.cellphones.com.vn/358x/media/catalog/product/1/_/1_251_1.jpg','24990000','25990000','1','[HOT] Thu cũ lên đời giá cao - Thủ tục nhanh - Trợ giá lên tới 1.000.000đ','2022-10-10 02:31:49','2022-10-10 02:31:49'),
	    ('5b03966a1acd4d5bbd67237a','1','iPhone 13 128GB | Chính hãng VN/A','https://cdn2.cellphones.com.vn/358x/media/catalog/product/1/4/14_1_9_2_9.jpg','27990000','26990000','1','[HOT] Thu cũ lên đời giá cao - Thủ tục nhanh - Trợ giá lên tới 1.000.000đ','2022-10-10 02:31:49','2022-10-10 02:31:49'),
	    ('5b03966a1acd4d5bbd67237b','1','iPhone 14 Pro 256GB | Chính hãng VN/A','https://cdn2.cellphones.com.vn/358x/media/catalog/product/t/_/t_m_13.png','30990000','31990000','1','[HOT] Thu cũ lên đời giá cao - Thủ tục nhanh - Trợ giá lên tới 1.000.000đ','2022-10-10 02:31:49','2022-10-10 02:31:49'),
	    ('5b03966a1acd4d5bbd67237c','1','iPhone 12 64GB I Chính hãng VN/A','https://cdn2.cellphones.com.vn/358x/media/catalog/product/1/_/1_252.jpg','19990000','20990000','1','[HOT] Thu cũ lên đời giá cao - Thủ tục nhanh - Trợ giá lên tới 1.000.000đ','2022-10-10 02:54:53','2022-10-10 02:54:53'),
	    ('5b03966a1acd4d5bbd67237e','1','iPhone 11 128GB I Chính hãng VN/A','https://cdn2.cellphones.com.vn/358x/media/catalog/product/4/_/4_187_1.jpg','36900000','37900000','1','[HOT] Thu cũ lên đời giá cao - Thủ tục nhanh - Trợ giá lên tới 1.000.000đ','2022-10-10 02:54:16','2022-10-10 02:54:16'),
	    ('5b03966a1acd4d5bbd67237f','1','iPhone 13 Pro 128GB | Chính hãng VN/A','https://cdn2.cellphones.com.vn/358x/media/catalog/product/3/_/3_51_1_3.jpg','16990000','17990000','1','[HOT] Thu cũ lên đời giá cao - Thủ tục nhanh - Trợ giá lên tới 1.000.000đ','2022-10-10 02:31:49','2022-10-10 02:31:49'),
	    ('5b03966a1acd4d5bbd672380','1','iPhone 13 Pro Max 512GB I Chính hãng VN/A','https://cdn2.cellphones.com.vn/358x/media/catalog/product/3/_/3_51_1_9.jpg','31990000','32990000','1','[HOT] Thu cũ lên đời giá cao - Thủ tục nhanh - Trợ giá lên tới 1.000.000đ','2022-10-10 02:31:49','2022-10-10 02:31:49'),
	    ('5b03966a1acd4d5bbd672390','1','iPhone SE 2022 | Chính hãng VN/A','https://cdn2.cellphones.com.vn/358x/media/catalog/product/1/_/1_359_1.png','43990000','44990000','1','[HOT] Thu cũ lên đời giá cao - Thủ tục nhanh - Trợ giá lên tới 1.000.000đ','2022-10-10 02:31:49','2022-10-10 02:31:49')";
        
        $db->pdo->exec($sql);
    }
}