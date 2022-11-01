<?php

namespace app\models;

use app\core\Database;
use app\core\DBModel;

class Cart extends DBModel{
    public string $id;
    public string $user_id;
    public string $product_id;
    public int $quantity;

    public function __construct(
        $id ='',
        $user_id = '',
        $product_id = '',
        $quantity = 0
    ){
        $this->id = $id;
        $this->user_id = $user_id;
        $this->product_id = $product_id;
        $this->quantity = $quantity;
    }

    public function setId($id) { $this->id = $id; }
    public function getId() { return $this->id; }

    public function setUserId($id) { $this->user_id = $id; }
    public function getUserId() { return $this->user_id; }

    public function setProductId($id) { $this->product_id = $id; }
    public function getProductId() { return $this->product_id; }

    public function setQuantity($quantity) { $this->quantity = $quantity; }
    public function getQuantity() { return $this->quantity; }

    public static function tableName(): string
    {
        return 'carts';
    }

    public function attributes(): array
    {
        return ['id','user_id','product_id','quantity'];
    }

    public function labels():array{
        return[
            'id' => 'Mã giỏ hàng',
            'user_id' => 'Mã khách hàng',
            'product_id' => 'Mã sản phẩm',
            'quantity' => 'Số lượng sản phẩm',
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
            'quantity_id' => [[self::RULE_REQUIRED],[self::RULE_NUMBER]],
        ];
    }

    public function save()
    {
        $this->id = uniqid();
        return parent::save();
    }

    public static function getUserQuantity($id){
        $result = 0;
        $db =  Database::getInstance();
        $req = $db->query("SELECT SUM(Quantity) FROM Cart WHERE Cart.user_id = '$id'");
        $item = $req->fetchALL()[0];
        $result = $item[0];
        return $result;
    }

    public static function getUserPrice($id){
        $result = 0;
        $db = Database::getInstance();
        $req = $db->query("SELECT SUM(Price) FROM cart WHERE cart.user_id = '$id'");
    }

    public static function getCartProduct(){
        $list = [];
        $db = Database::getInstance();
        $req = $db->query('SELECT * FROM products carts WHERE carts.id = products.id');
        
        foreach($req->fetchAll() as $item){
            $list[] =  new Product($item['id'], $item['category_id'], $item['name'], 
            $item['price_show'], $item['price_through'], $item['discount'], 
            $item['description'], $item['image_url']);
        }
        return $list;
    }
}