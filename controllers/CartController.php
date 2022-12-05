<?php
namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\middlewares\AuthMiddleWare;
use app\models\ProductInCart;

class CartController extends Controller{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleWare(['cart']));
    }


    public function cart(){
        $userID = Application::$app->session->get('user');
        $productInCarts = ProductInCart::getProductInCart($userID);
        $productDetails = ProductInCart::getProductDetail($userID);

        return $this->render('cart',[
            'userID' => $userID,
            'ProductInCarts' => $productInCarts,
            'ProductDetails' => $productDetails,
        ]);
    }
}