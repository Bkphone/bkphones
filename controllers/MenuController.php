<?php

namespace app\controllers;

use app\core\Controller;
use app\models\Product;
use app\middlewares\AuthMiddleWare;
use app\core\Application;
use app\core\Request;
use app\models\Category;
use app\models\ProductInCart;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleWare(['detail']));
    }

    public function home()
    {
        $samsungs = Product::getSpecialProduct(5, 'SamSung', 4);
        $xiaomis = Product::getSpecialProduct(5, 'Xiaomi', 4);
        $iphones = Product::getSpecialProduct(5, 'Apple iphone', 4);

        return $this->render('home', [
            'samsungs' => $samsungs,
            'iphones' => $iphones,
            'xiaomis' =>  $xiaomis
        ]);
    }

    public function menu()
    {
        $category = Application::$app->request->getParam('category');
        if ($category == '') {
            $products = Product::getAllProducts();
        } else {
            $products = Product::getProductsByCategory($category);
        }
        $categories = Category::getAllCategories();

        return $this->render('menu', [
            'products' => $products, 
            'categories' => $categories
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
        if ($request->getMethod() === 'post'){
            $this->registerMiddleware(new AuthMiddleWare(['cart']));
            $userID = Application::$app->session->get('user');
            $id = Application::$app->request->getParam('id');
            $productModel = Product::getProductDetail($id);
            ProductInCart::addToCart($userID, $id);

            return $this->render('product_detail', [
                'productModel' => $productModel
            ]);
        }
    }

    public function search()
    {
        $categories = Category::getAllCategories();
        $keyword = Application::$app->request->getBody('keyword');
        $products = Product::searchProductByName($keyword['keyword']);
        $categories = Category::getAllCategories();

        return $this->render('menu', [
            'products' => $products, 
            'categories' => $categories
        ]);
    }
}