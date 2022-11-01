<?php
namespace app\controllers;
use app\core\Application;
use app\core\Controller;
use app\middlewares\AuthMiddleWare;

class CartController extends Controller{

    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleWare(['cart']));
    }
    public function cart(){
        return $this->render('cart');
    }
}