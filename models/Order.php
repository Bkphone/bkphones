<?php 

namespace app\models;

use app\core\Database;
use app\core\DBModel;
use app\models\ProductInCart;

class Order extends DBModel{
    public string $id;
    public string $user_id;
    public string $order_status;
    public string $username;
    public string $email;
    public string $address;
    public string $order_description;
    public string $price;
    public string $created_at;
    public string $payment_status;

    public function __construct(
        $id = '',
        $user_id = '',
        $order_status = '',
        $username= '',
        $email = '',
        $address = '',
        $order_description = '',
        $price = '',
        $created_at = '',
        $payment_status = ''
    )
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->order_status = $order_status;
        $this->username = $username;
        $this->email = $email;
        $this->address = $address;
        $this->order_description = $order_description;
        $this->price = $price;
        $this->created_at = $created_at;
        $this->payment_status = $payment_status;
    }
    public function setId($id) { $this->id = $id; }
    public function getId() { return $this->id; }

    public function setUserId($user_id) { $this->user_id = $user_id; }
    public function getUserId() { return $this->user_id; }

    public function setOrder_status($order_status) { $this->order_status= $order_status; }
    public function getOrder_status() { return $this->order_status; }

    public function setUsername($username) { $this->username = $username; }
    public function getUsername() { return $this->username; }

    public function setEmail($email) { $this->email = $email; }
    public function getEmail() { return $this->email; }

    public function setAddress($address) { $this->address = $address; }
    public function getAddress() { return $this->address; }

    public function setOrder_description($order_description) { $this->order_description = $order_description; }
    public function getOrder_description() { return $this->order_description; }

    public function setPrice($price) { $this->price = $price; }
    public function getPrice() { return $this->price; }

    public function setCreated_at($created_at) { $this->created_at = $created_at; }
    public function getCreated_at() { return $this->created_at; }

    public function setPayment_status($payment_status) { $this->payment_status = $payment_status; }
    public function getPayment_status() { return $this->payment_status; }

    public static function tableName(): string
    {
        return 'orders';
    }

    public function attributes(): array
    {
        return ['id', 'user_id', 'order_status', 'username', 'email', 'address', 'order_description','price', 'created_at','payment_status'];
    }

    public function labels(): array
    {
        return [
            'id' => 'Mã đơn hàng',
            'user_id' => 'Mã người dùng',
            'order_status' => 'Tình trạng đơn hàng',
            'username' => 'Tên khách hàng',
            'email' => 'Email',
            'address' => 'Địa chỉ',
            'order_description' => 'Thông tin chi tiết',
            'price' => 'Số tiền phải trả',
            'created_at' => 'Ngày tạo đơn',
            'payment_status' => 'Tình trạng thanh toán', 
        ];
    }

    public function getLabel($attribute)
    {
        return $this->labels()[$attribute];
    }

    public function rules(): array
    {
        return [
            'username' => [self::RULE_REQUIRED],
            'address' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
        ];
    }

    public function create()
    {   
        $this->id = uniqid();
        $this->order_status = 'Đang chờ duyệt';
        $this->created_at = date_format(date_create(),"Y-m-d H:i:s"); 
        $this->payment_status = 'Chưa thanh toán';

        $db = Database::getInstance();
        $this->price = $db->query("SELECT sum(quantity*price) FROM product_in_cart WHERE user_id='$this->user_id' AND order_id ='';")->fetch()[0];
        //Delete products from cart;
        $db->query("UPDATE product_in_cart SET order_id = '$this->id' WHERE user_id='$this->user_id' AND order_id ='';");

        //Update price of product at the time of purchase
        $req = $db->query("SELECT * FROM product_in_cart WHERE order_id = '$this->id';");
        foreach ($req->fetchAll() as $item) {
            $id = $item['product_id'];
            $product = $db->query("SELECT * FROM products WHERE id = '$id';")->fetchAll()[0];
            $price = $product['price_through'];
            $db->query("UPDATE product_in_cart SET price = '$price' WHERE product_id = '$id';");
        }

        $db->query("INSERT INTO orders VALUES (
            '$this->id',
            '$this->user_id',
            '$this->order_status',
            '$this->username',
            '$this->email',
            '$this->address',
            '$this->order_description',
            $this->price,
            '$this->created_at',
            '$this->payment_status'
        );");
    }

    public static function getOrderInfo($id)
    {
        $db = Database::getInstance();
        $req = $db->query("SELECT * FROM orders WHERE id = '$id';");
        $item = $req->fetchAll()[0];
        $order = new Order();
        $order->id = $item['id'];
        $order->user_id = $item['user_id'];
        $order->order_status = $item['order_status'];
        $order->username = $item['username'];
        $order->email = $item['email'];
        $order->address = $item['address'];
        $order->order_description = $item['order_description'];
        $order->created_at = $item['created_at'];
        return $order;
    }

    public static function getAllOrder($id){
        $db = Database::getInstance();
        $req = $db->query("SELECT * FROM orders WHERE user_id = '$id' ORDER BY created_at;");
        $list = [];
        if($id){
            foreach($req->fetchAll() as $item){
                $list[] = new Order($item['id'], $item['user_id'], $item['order_status'], $item['username'],
                                    $item['email'],$item['address'],$item['order_description'],$item['price'],$item['created_at'],$item['payment_status']);
            }
        }
        return $list;
    }

    public static function countOrder($id){
        $db = Database::getInstance();
        $req = $db->query("SELECT COUNT(*) FROM orders WHERE user_id = '$id';");
        $count = $req->fetch();
        return $count[0];
    }

    // manage order

    public function load($params)
    {
        $this->id = $params[0];
        $this->user_id = $params[1];
        $this->order_status = $params[2];
        $this->username = $params[3];
        $this->email = $params[4];
        $this->address = $params[5];
        $this->order_description = $params[6];
        $this->price = $params[7];
        $this->created_at = $params[8];
        $this->payment_status = $params[9];
    }
    public static function getAllCurrentOrder()
    {
        $list = [];
        $db = Database::getInstance();
        $req = $db->query("SELECT * FROM orders");

        foreach ($req->fetchAll() as $item) {
            $currentOrders = new Order();
            $params = array($item['id'], $item['user_id'], $item['order_status'], $item['username'],
            $item['email'],$item['address'],$item['order_description'],$item['price'],$item['created_at'],$item['payment_status']);
            $currentOrders->load($params);
            array_push($list, $currentOrders);
        }

        return $list;
    }

    public function updateOrderStatus($id)
    {   $status = "Đã được duyệt";
        $statement = self::prepare(
            "UPDATE orders 
            SET 
                order_status = '$status'
            WHERE id = '$id';
            "
        );
        $statement->execute();
        return true;
    }
   
    public static function getOrderDetails($id)
    {
        $db = Database::getInstance();
        $req = $db->query("SELECT * FROM orders WHERE id = '$id';");
        $item = $req->fetchAll()[0];
        $order = new Order();
        $order->id = $item['id'];
        $order->user_id = $item['user_id'];
        $order->order_status = $item['order_status'];
        $order->username = $item['username'];
        $order->email = $item['email'];
        $order->address = $item['address'];
        $order->order_description = $item['order_description'];
        $order->created_at = $item['created_at'];
        $order->price = $item['price'];
        $order->payment_status = $item['payment_status'];
        return $order;
    }

    public function delete()
    {
        $tablename = $this->tableName();
        $sql = "DELETE FROM $tablename WHERE id=?";
        $stmt= self::prepare($sql);
        $stmt->execute([$this->id]);
        return true;     
    }   
}
