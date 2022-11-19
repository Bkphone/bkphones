<?php

namespace app\models;

use app\core\Application;
use app\core\Model;
use app\core\Database;
use app\core\DBModel;


class CartForm extends Model
{
    public $list = [];
    public string $name = '';
    public string $phone_number = '';
    public string $email = '';
    public string $address = '';
    public string $other_requirement = '';

    public function rules(): array
    {
        return[
            'name' => [self::RULE_REQUIRED],
            'phone_number' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED],
            'address' => [self::RULE_REQUIRED],
        ];
    }

    public function labels()
    {
        return [
            'name' => 'Tên khách hàng',
            'phone_number' => 'Số điện thoại',
            'email' => 'Email',
            'address' => 'Địa chỉ giao hàng',
            'other_requirement' => 'Yêu cầu khác'
        ];
    }

    public function update_quantity($user_id, $product_id, $quantity){
        $db = Database::getInstance();  
        if($user_id && $product_id){
            $req = $db->query("UPDATE productincart SET quantity = $quantity WHERE user_id = 'user_id' AND product_id = '$product_id');");
        }
    }

    public function order_infor(){
        
    }

}