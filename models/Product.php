<?php

namespace app\models;

use app\core\Database;
use app\core\DBModel;


class Product extends DBModel
{
    public string $id;
    public string $category_id;
    public string $name;
    public float $price_show;
    public float $price_through;
    public string $description;
    public string $image_url;
    public string $detail;
    public string $rate_count;
    public string $star;
    public string $screen;
    public string $os;
    public string $camera;
    public string $camera_front;
    public string $cpu;
    public string $ram;
    public string $rom;
    public string $micro_usb;
    public string $battery;

    public function __construct(
        $id = '',
        $category_id = '',
        $name = '',
        $price_show = 0,
        $price_through = 0,
        $discount = 0,
        $description = '',
        $image_url = '',
        $rate_count = '',
        $star = '',
        $screen = '',
        $os = '',
        $camera = '',
        $camera_front = '',
        $cpu = '',
        $ram = '',
        $rom = '',
        $micro_usb = '',
        $battery = ''
    ) {
        $this->id = $id;
        $this->category_id = $category_id;
        $this->name = $name;
        $this->price_show = $price_show;
        $this->price_through = $price_through;
        $this->discount = $discount;
        $this->description = $description;
        $this->image_url = $image_url;
        $this->rate_count = $rate_count;
        $this->star = $star;
        $this->screen = $screen;
        $this->os = $os;
        $this->camera = $camera;
        $this->camera_front = $camera_front;
        $this->cpu = $cpu;
        $this->ram = $ram;
        $this->rom = $rom;
        $this->micro_usb = $micro_usb;
        $this->battery = $battery;
    }

    public function setId($id) { $this->id = $id; }
    public function getId() { return $this->id; }

    public function setCategoryId($category_id) { $this->category_id = $category_id; }
    public function getCategoryId() { return $this->category_id; }

    public function setName($name) { $this->name = $name; }
    public function getName() { return $this->name; }

    public function getPriceShow() { return $this->price_show; }
    public function getPriceThrough() { return $this->price_through; }

    public function setDescription($description) { $this->description = $description; }
    public function getDescription() { return $this->description; }

    public function setImageUrl($image_url) { $this->image_url = $image_url; }
    public function getImageUrl() { return $this->image_url; }

    public function getCategory()
    {
        $categoryModel = Category::get($this->category_id);
        return $categoryModel->getDisplayName();
    }
    
    public function getDisplayInfo(): string
    {
        return $this->id . ' ' . $this->category_id . ' ' . $this->name . ' ' . $this->price_show . ' ' . $this->description;
    }

    public static function tableName(): string
    {
        return 'products';
    }

    public function attributes(): array
    {
        return ['id', 'category_id', 'name', 'price_show', 'price_through', 'discount', 
                'description', 'image_url', 'rate_count', 'star', 'screen', 'os', 'camera',
                'camera_front', 'cpu', 'ram', 'rom', 'micro_usb', 'battery'];
    }
   
    public function labels(): array
    {
        return [
            'id' => 'Mã sản phẩm',
            'name' => 'Tên sản phẩm',
            'price_show' => 'Giá',
            'description' => 'Mô tả sản phẩm',
            'image_url' => 'Hình ảnh sản phẩm',
            'category_id' => 'Mã mục',
            'detail' => 'Chi tiết',
            'star' => 'Star',
            'rate_count' => 'Số lượt đánh giá',
            'star' => 'Star',
            'screen' => 'Màn hình',
            'os' => 'Hệ điều hành',
            'camera' => 'Camera sau',
            'camera_front' => 'Camera trước',
            'cpu' => 'Cpu',
            'ram' => 'Ram',
            'rom' => 'Bộ nhớ trong',
            'micro_usb' => 'Bộ nhớ mở rộng',
            'battery' => 'Pin'
        ];
    }
    
    public function getLabel($attribute)
    {
        return $this->labels()[$attribute];
    }

    public function rules(): array
    {
        return [
            'name' => [self::RULE_REQUIRED, [self::RULE_MAX, 'max' <= 50]],
            'description' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' >= 20], [self::RULE_MAX, 'max' <= 100]],
            'price_show' => [self::RULE_REQUIRED],
        ];
    }

    public function save()
    {
        $this->id = uniqid();
        return parent::save();
    }

    public static function getSpecialProduct($discount, $category_id = null, $quota = 10)
    {
        $list = [];
        $db = Database::getInstance();
        if($category_id) {
            $req = $db->query("SELECT * FROM products WHERE discount > $discount AND category_id = $category_id");
        } else {
            $req = $db->query("SELECT * FROM products WHERE discount > $discount AND category_id >= 3");
        }

        foreach ($req->fetchAll() as $item) {
            $list[] = new Product($item['id'], $item['category_id'], $item['name'], 
                            $item['price_show'], $item['price_through'], $item['discount'], 
                            $item['description'], $item['image_url'], $item['rate_count'], $item['star'],
                            $item['screen'], $item['os'], $item['camera'], $item['camera_front'], $item['cpu'],
                            $item['ram'], $item['ram'], $item['rom'], $item['micro_usb'], $item['battery']);
        }
        
        if (count($list) > $quota) {
            $result = array_slice($list, 0, $quota);
        } else {
            $result = $list;
        }
        
        return $result;
    }

    public static function getProductDetail($id)
    {
        $db = Database::getInstance();
        $req = $db->query("SELECT * FROM products WHERE id = '$id'");
        $item = $req->fetchAll()[0];
        $product = new Product($item['id'], $item['category_id'], $item['name'], 
                        $item['price_show'], $item['price_through'], $item['discount'], 
                        $item['description'], $item['image_url'], $item['rate_count'], $item['star'],
                        $item['screen'], $item['os'], $item['camera'], $item['camera_front'], $item['cpu'],
                        $item['ram'], $item['ram'], $item['rom'], $item['micro_usb'], $item['battery']);
        return $product;
    }

    public static function getAllProducts()
    {
        $list = [];
        $db = Database::getInstance();
        $req = $db->query('SELECT * FROM products');

        foreach ($req->fetchAll() as $item) {
            $list[] = new Product($item['id'], $item['category_id'], $item['name'], 
                            $item['price_show'], $item['price_through'], $item['discount'], 
                            $item['description'], $item['image_url'], $item['rate_count'], $item['star'],
                            $item['screen'], $item['os'], $item['camera'], $item['camera_front'], $item['cpu'],
                            $item['ram'], $item['ram'], $item['rom'], $item['micro_usb'], $item['battery']);
        }

        return $list;
    }
}