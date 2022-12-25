<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\middlewares\AdminMiddleWare;
use app\models\Product;
use app\core\Request;
use app\models\Category;

class ProductController extends Controller
{
    public function __construct()
    {
        Application::$app->controller->registerMiddleware(new AdminMiddleWare(['index', 'create', 'delete', 'update']));
    }

    public function index() 
    {
        if ($_GET) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $num_products_per_page = 10;
        $allproducts = Product::getAllProducts();
        $category = Category::getAllCategories();
        $products = Product::getProductByPaging($page, $num_products_per_page);
        $num_products = count($allproducts);
        $page_nums = ceil($num_products/$num_products_per_page);
        $model = new Product();
        $this->setLayout('admin');
        return $this->render('products', [
            'page_product' => $products,
            'model' => $model,
            'category' => $category,
            'page' => $page,
            'page_nums' => $page_nums
        ]);
    }

    public function create(Request $request) 
    {
        $product = new Product();
        $category = Category::getAllCategories();
        if ($request->getMethod() == "post") {
            $product->loadData($request->getBody());
            if ($product->validate() && $product->save()) {
                Application::$app->response->redirect('/admin/products');
                return 'Show Success Page';
            }
        }
        $this->setLayout('admin');
        return $this->render('product_crud', [
            'model' => $product,
            'type' => 'create',
            'category' => $category
        ]);
    }

    public function update(Request $request)
    {
        $param = $request->getParam('id');
        $product = Product::getProductById($param);
        $category = Category::getAllCategories();
        if ($request->getMethod() == "post") {
            $product->loadData($request->getBody());
            if ($product->validate() && Product::updateProduct($product)) {
                Application::$app->response->redirect('/admin/products');
                return 'Show success page';
            }
        }
        $this->setLayout('admin');
        return $this->render('product_crud', [
            'model' => $product,
            'type' => 'update',
            'category' => $category
        ]);
    }

    public function delete(Request $request)
    {
        $param = $request->getParam('id');
        $product = Product::getProductById($param);
        var_dump($product);
        $product->deleteProduct();
        Application::$app->response->redirect('/admin/products');
    }
}