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
    public float $discount;
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

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }

    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }
    public function getCategoryId()
    {
        return $this->category_id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }

    public function getPriceShow()
    {
        return $this->price_show;
    }
    public function getPriceThrough()
    {
        return $this->price_through;
    }

    public function getDiscount()
    {
        return $this->discount;
    }
    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }
    public function getDescription()
    {
        return $this->description;
    }

    public function setImageUrl($image_url)
    {
        $this->image_url = $image_url;
    }
    public function getImageUrl()
    {
        return $this->image_url;
    }

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
            'price_through' => 'Giá niêm yết',
            'discount' => 'Giảm giá',
            'description' => 'Mô tả sản phẩm',
            'image_url' => 'Hình ảnh sản phẩm',
            'category_id' => 'Mã mục',
            'detail' => 'Chi tiết',
            'star' => 'Star',
            'rate_count' => 'Số lượt đánh giá',
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
            'name' => [self::RULE_REQUIRED],
            'description' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' >= 20], [self::RULE_MAX, 'max' <= 100]],
            'price_show' => [self::RULE_REQUIRED],
            'price_through' => [self::RULE_REQUIRED],
            'description' => [self::RULE_REQUIRED],
            'image_url' => [self::RULE_REQUIRED],
            'category_id' => [self::RULE_REQUIRED]
        ];
    }

    public function save()
    {
        $this->id = uniqid();
        return parent::save();
    }

    public static function getProductByPaging($page_idx, $num_products_per_page)
    {
        $list = [];
        $db = Database::getInstance();
        $starting_limit_number = ($page_idx - 1) * $num_products_per_page;
        $sql = "SELECT * FROM products LIMIT " . $starting_limit_number . ',' . $num_products_per_page;
        $req = $db->query($sql);
        foreach ($req->fetchAll() as $item) {
            $list[] = new Product(
                $item['id'],
                $item['category_id'],
                $item['name'],
                $item['price_show'],
                $item['price_through'],
                $item['discount'],
                $item['description'],
                $item['image_url']
            );
        }
        return $list;
    }

    public static function getSpecialProduct($discount, $company = null, $quota = 10)
    {
        $list = [];
        $db = Database::getInstance();
        if($company) {
            $req = $db->query("SELECT * FROM products WHERE discount > $discount AND company LIKE '%$company%'");
        } else {
            $req = $db->query("SELECT * FROM products WHERE discount > $discount AND category_id = 1");
        }

        foreach ($req->fetchAll() as $item) {
<<<<<<< HEAD
            // $list[] = new Product(
            //     $item['id'],
            //     $item['category_id'],
            //     $item['name'],
            //     $item['price_show'],
            //     $item['price_through'],
            //     $item['discount'],
            //     $item['description'],
            //     $item['image_url']
            // );
=======
>>>>>>> master
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
<<<<<<< HEAD
            // $list[] = new Product(
            //     $item['id'],
            //     $item['category_id'],
            //     $item['name'],
            //     $item['price_show'],
            //     $item['price_through'],
            //     $item['discount'],
            //     $item['description'],
            //     $item['image_url']
            // );
=======
>>>>>>> master
            $list[] = new Product($item['id'], $item['category_id'], $item['name'], 
                            $item['price_show'], $item['price_through'], $item['discount'], 
                            $item['description'], $item['image_url'], $item['rate_count'], $item['star'],
                            $item['screen'], $item['os'], $item['camera'], $item['camera_front'], $item['cpu'],
                            $item['ram'], $item['ram'], $item['rom'], $item['micro_usb'], $item['battery']);
        }

        return $list;
    }

    public static function getProductById($id)
    {
        $db = Database::getInstance();
        $req = $db->query("SELECT * FROM products WHERE id = '$id'");
        $item = $req->fetchAll()[0];
        $product = new Product(
            $item['id'],
            $item['category_id'],
            $item['name'],
            $item['price_show'],
            $item['price_through'],
            $item['discount'],
            $item['description'],
            $item['image_url'],
            $item["star"],
            $item["rate_count"],
            $item["screen"],
            $item["os"],
            $item["camera"],
            $item["camera_front"],
            $item["cpu"],
            $item["ram"],
            $item["rom"],
            $item["micro_usb"],
            $item["battery"]
        );
        return $product;
    }

    public static function addNewProduct()
    {
        if (self::save()) {
            return true;
        }
    }

    public static function updateProduct(Product $product)
    {
        $sql = "UPDATE products 
                SET 
                    category_id = '$product->category_id',
                    name = '$product->name',
                    price_show = $product->price_show,
                    price_through = $product->price_through,
                    discount = '$product->discount',
                    description = '$product->description',
                    image_url = '$product->image_url',
                    star = '$product->star',
                    rate_count = '$product->rate_count',
                    screen = '$product->screen',
                    os = '$product->os',
                    camera = '$product->camera',
                    camera_front = '$product->camera_front',
                    cpu = '$product->cpu',
                    ram = '$product->ram',
                    rom = '$product->rom',
                    micro_usb = '$product->micro_usb',
                    battery = '$product->battery'
                WHERE id = '$product->id'";
        $statement = self::prepare($sql);
        $statement->execute();
        return true;
    }

<<<<<<< HEAD
    public static function searchProducts($category_id, $product_name, $product_id, $price_range_s, $price_range_e) {
        
        $category_id === '0' ? $c_id = '' : $c_id = " category_id = " . $category_id;
        $product_name === '' ? $name = " name LIKE '%' " : $name = "name LIKE '" . "%" . $product_name . "%'";
        $product_id === '' ? $p_id = " id LIKE '%' " : $p_id = "id LIKE '" . $product_id . "%'";
        $price = '';
        if ($price_range_e != '' and $price_range_s != '') {
            $price .= "price_through BETWEEN " . $price_range_s . " AND " . $price_range_e;
        } else {
            if ($price_range_s != '') {
                $price .= "price_through > " .$price_range_s;
            }
            if ($price_range_e != '') {
                $price .= "price_through < " . $price_range_e;
            }
        }
        $query = "SELECT * FROM products WHERE ";
        $query .= $name . " AND " . $p_id;
        $c_id === '' ? $query .= "" : $query .= " AND " . $c_id;
        $price === '' ? $query .= "" : $query .= " AND " . $price;

        $db = Database::getInstance();
        $req = $db->query($query);
        $list = [];
        foreach ($req->fetchAll() as $item) {
            $list[] = new Product($item['id'], $item['category_id'], $item['name'], 
                            $item['price_show'], $item['price_through'], $item['discount'], 
                            $item['description'], $item['image_url'], $item['rate_count'], $item['star'],
                            $item['screen'], $item['os'], $item['camera'], $item['camera_front'], $item['cpu'],
                            $item['ram'], $item['ram'], $item['rom'], $item['micro_usb'], $item['battery']);
=======
    public static function getProductsByCategory($category_id)
    {
        $list = [];
        $db = Database::getInstance();
        $req = $db->query("SELECT * FROM products WHERE category_id = '$category_id'");

        foreach ($req->fetchAll() as $item) {
            $list[] = new Product($item['id'], $item['category_id'], $item['name'], 
                                $item['price_show'], $item['price_through'], $item['discount'], 
                                $item['description'], $item['image_url'], $item['rate_count'], $item['star'],
                                $item['screen'], $item['os'], $item['camera'], $item['camera_front'], $item['cpu'],
                                $item['ram'], $item['ram'], $item['rom'], $item['micro_usb'], $item['battery']);
>>>>>>> master
        }
        return $list;
    }

    public static function searchProductByName($name)
    {
        $list = [];
        $db = Database::getInstance();
        $sql = "SELECT * FROM products WHERE name LIKE '%$name%'";
        $req = $db->query($sql);
        foreach ($req->fetchAll() as $item) {
            $list[] = new Product(
                $item['id'],
                $item['category_id'],
                $item['name'],
                $item['price_show'],
                $item['price_through'],
                $item['discount'],
                $item['description'],
                $item['image_url']
            );
        }
        return $list;
    }

    public function deleteProduct()
    {
        $tablename = $this->tableName();
        $sql = "DELETE FROM $tablename WHERE id=?";
        $stmt = self::prepare($sql);
        $stmt->execute([$this->id]);
        return true;
    }
}
