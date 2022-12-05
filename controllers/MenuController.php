<?php

namespace app\controllers;

use app\core\Controller;
use app\models\Product;
use app\middlewares\AuthMiddleWare;
use app\core\Application;
use app\core\Request;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleWare(['menu']));
    }

    public function home()
    {
        $samsungs = Product::getSpecialProduct(8, 2, 4);
        $iphones = Product::getSpecialProduct(8, 1, 4);
        $watchs = Product::getSpecialProduct(9, null, 4);

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

    public function detail(Request $request)
    {
        if ($request->getMethod() === 'get') {
            $id = Application::$app->request->getParam('id');
            $productModel = Product::getProductDetail($id);
            return $this->render('product_detail', [
                'productModel' => $productModel
            ]);
        }
    }
}