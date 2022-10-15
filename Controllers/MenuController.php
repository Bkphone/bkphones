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
        $products = Product::getAllProducts();
        return $this->render('home', [
            'products' => $products
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