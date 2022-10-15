<?php

namespace app\controllers;

use app\controllers\SiteController;
use app\models\Category;
use app\models\Product;
use app\middlewares\AuthMiddleware;

class MenuController extends SiteController
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['menu']));
    }

    public function menu()
    {
        $products = Product::getAllProducts();

        return $this->render('menu', [
            'products' => $products
        ]);
    }
}