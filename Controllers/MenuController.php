<?php

namespace app\controllers;

use app\core\Controller;
use app\models\Product;
use app\middlewares\AuthMiddleware;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['menu']));
    }

    public function home()
    {
        $samsungs = Product::getSpecialProduct(9, 2);
        $iphones = Product::getSpecialProduct(8, 1);
        $watchs = Product::getSpecialProduct(9);

        return $this->render('home', [
            'samsungs' => $samsungs,
            'iphones' => $iphones,
            'watchs' =>  $watchs
        ]);
    }

    public function menu()
    {
        $products = Product::getAllProducts();
        return $this->render('menu', [
            'products' => $products
        ]);
    }
}