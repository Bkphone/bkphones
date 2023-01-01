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
        $products = [];
        $_GET['page'] ? $page = $_GET['page'] : $page = 1;
        $_GET['category_id'] ? $category_id = $_GET['category_id'] : $category_id = '0';
        $_GET['name'] ? $name = $_GET['name'] : $name = '';
        $_GET['id'] ? $p_id = $_GET['id'] : $p_id = '';
        $_GET['start'] ? $p_price_start = $_GET['start'] : $p_price_start = '';
        $_GET['end'] ? $p_price_end = $_GET['end'] : $p_price_end = '';
            
        $num_products_per_page = 10;
        ($_GET['category_id'] or $_GET['name'] or
        $_GET['name'] or $_GET['id'] or 
        $_GET['start'] or
        $_GET['end']) ? $allproducts = Product::searchProducts($category_id, $name, $p_id, $p_price_start, $p_price_end) : $allproducts = Product::getAllProducts();
        // $allproducts = Product::getAllProducts();
        $category = Category::getAllCategories();
        // if ($request)
        // $products = Product::getProductByPaging($page, $num_products_per_page);
        $num_products = count($allproducts);
        $page_nums = ceil($num_products/$num_products_per_page);
        if ($num_products < $num_products_per_page) {
            for ($i = 0; $i < $num_products; $i++) {
                array_push($products, $allproducts[$i]);
            }
        } else if ($num_products - ($page - 1)*$num_products_per_page < $num_products_per_page) {
            for ($i = ($page - 1) * $num_products_per_page; $i < $num_products; $i++) {
                array_push($products, $allproducts[$i]);
            }
        } else {
            for ($i = ($page - 1) * $num_products_per_page; $i < $page * $num_products_per_page; $i++) {
                array_push($products, $allproducts[$i]);
            }

        }
        $model = new Product();
        $this->setLayout('admin');
        return $this->render('products', [
            'page_product' => $products,
            'model' => $model,
            'category' => $category,
            'page' => $page,
            'page_nums' => $page_nums,
            'name' => $_GET['category_id']
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
        return $this->render('productCRUD', [
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
        return $this->render('productCRUD', [
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