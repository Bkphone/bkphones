<?php
namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\middlewares\AuthMiddleWare;
use app\models\ProductInCart;
use app\models\Order;
use app\models\User;
use app\core\Request;

class CartController extends Controller{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleWare(['cart']));
    }

    public function cart(Request $request){
        $userID = Application::$app->session->get('user');
        $productInCarts = ProductInCart::getProductInCart($userID);
        $productDetails = ProductInCart::getProductDetail($userID);
        $user = User::getUserInfo($userID);

        $orderModel = new Order();
        if (isset($_POST['order'])) {
            $orderModel->loadData($request->getBody());
            
            $orderModel->user_id = $userID;
            $orderModel->username = $_POST['username'];
            $orderModel->email = $_POST['email'];
            $orderModel->address = $_POST['address'];
            $orderModel->order_description = (isset($_POST['order_description']))?$_POST['order_description']:'';

            $orderModel->create(); 
            Application::$app->response->redirect('/cart/notice');      
        }
        
        return $this->render('cart',[
            'userID' => $userID,
            'ProductInCarts' => $productInCarts,
            'ProductDetails' => $productDetails,
            'model' => $orderModel,
            'user' => $user
        ]);
    }

    public static function update($param){
        // Loop through the post data so we can update the quantities for every product in cart
        foreach ($param as $k => $v) {
            if (strpos($k, 'quantity') !== false && is_numeric($v)) {
                $id = str_replace('quantity-', '', $k);
                $quantity = (int)$v;
                ProductInCart::changeQuantity($id,$quantity);
            }
        }
        header('location: cart');
    }

    public static function remove($value){
        ProductInCart::removeFromCart($value);
        header('location: cart');
    }

    public function notice()
    {
        $this->setLayout('auth');
        return $this->render('payment_success');
    }
}