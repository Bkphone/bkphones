<?php

namespace app\models;

use app\core\Database;
use app\core\DBModel;

class ProductInCart extends DBModel{
    public string $user_id; 
    public string $product_id;
    public int $quantity;
    public int $price;
    public string $order_id;

    public function __construct(
        $user_id = '',
        $product_id = '',
        $quantity = 0,
        $price = 0,
        $order_id = null
    ){
        $this->user_id = $user_id;
        $this->product_id = $product_id;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->order_id = $order_id;
    }

    public function setUserId($id) { $this->user_id = $id; }
    public function getUserId() { return $this->user_id; }

    public function setProductId($id) { $this->product_id = $id; }
    public function getProductId() { return $this->product_id; }

    public function setQuantity($quantity) { $this->quantity = $quantity; }
    public function getQuantity() { return $this->quantity; }

    public function setPrice($price) { $this->price = $price; }
    public function getPrice() { return $this->price; }

    public function setOrderId($order_id) { $this->order_id = $order_id; }
    public function getOrderId() { return $this->order_id; }

    public static function tableName(): string
    {
        return 'product_in_cart';
    }

    public function attributes(): array
    {
        return ['user_id','product_id','quantity','price','order_id'];
    }

    public function labels(): array{
        return[
            'user_id' => 'Mã khách hàng',
            'product_id' => 'Mã sản phẩm',
            'quantity' => 'Số lượng sản phẩm',
            'price' => 'Giá sản phẩm',
            'order_id' => 'Mã giỏ hàng'
        ];
    }

    public function getLabel($attribute) 
    {
        return $this->labels()[$attribute];
    }

    public function rules(): array
    {
        return[
            'user_id' => [self::RULE_REQUIRED],
            'product_id' => [self::RULE_REQUIRED],
            'quantity' => [[self::RULE_REQUIRED],[self::RULE_NUMBER]],
            'price' => [[self::RULE_REQUIRED],[self::RULE_NUMBER]],
        ];
    }

    public static function getTotalQuantity($userId){
        $db = Database::getInstance();
        $result = $db->query("SELECT SUM(quantity) FROM product_in_cart WHERE user_id = '$userId' AND order_id='';");
        $value = $result->fetch();
        return $value[0]; 
    }

    public static function addToCart($user_id, $product_id){
        $db = Database::getInstance();
        $req = $db->query("SELECT * FROM product_in_cart WHERE product_id = '$product_id' AND user_id = '$user_id' and order_id='';");
        if($req->fetchALL()[0] !== NULL){
            $db->query("UPDATE product_in_cart SET quantity = quantity +1 WHERE product_id = '$product_id' AND user_id = '$user_id' and order_id='';");
        }else{
            $req = $db->query("SELECT * FROM products WHERE id = '$product_id';");
            $item = $req->fetchALL()[0];
            $price = $item['price_through'];
            $db->query("INSERT INTO product_in_cart VALUES ('$user_id','$product_id',1,$price,'');");
        }
    }

    public static function removeFromCart($key){
        if($key){
            $db = Database::getInstance();
            $db->query("DELETE FROM product_in_cart WHERE product_id = '$key' AND order_id='';");
        }
    }

    public static function changeQuantity($key, $value){
        $db = Database::getInstance();
        if($key){
            $db->query("UPDATE product_in_cart SET quantity = $value WHERE product_id = '$key' AND order_id='';");
        }
    }

    public static function getProductInCart($id){
        $list = [];
        $db = Database::getInstance();
        if($id){
            $req = $db->query("SELECT * FROM product_in_cart  WHERE user_id='$id' AND order_id='';");
            foreach($req->fetchAll() as $item){
                $list[] = new ProductInCart($item['user_id'], $item['product_id'], $item['quantity'], $item['price'], $item['order_id']);
            }
        }
        return $list;
    }

    public static function getProductDetail($id){
        $list = [];
        $db = Database::getInstance();    
        if($id){
            $req = $db->query("SELECT * FROM products WHERE id IN (SELECT product_id FROM product_in_cart WHERE user_id='$id' AND order_id='');");
            foreach($req->fetchAll() as $item){
                $list[] = new Product($item['id'], $item['category_id'], $item['name'], 
                $item['price_show'], $item['price_through'], $item['discount'], 
                $item['description'], $item['image_url']);
            }
        }
        return $list;
    }
}