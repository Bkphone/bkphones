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
    }
}