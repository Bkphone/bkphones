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
        isset($_GET['page']) ? $page = $_GET['page'] : $page = 1;
        isset($_GET['category_id']) ? $category_id = $_GET['category_id'] : $category_id = '0';
        isset($_GET['name']) ? $name = $_GET['name'] : $name = '';
        isset($_GET['id']) ? $p_id = $_GET['id'] : $p_id = '';
        isset($_GET['start']) ? $p_price_start = $_GET['start'] : $p_price_start = '';
        isset($_GET['end']) ? $p_price_end = $_GET['end'] : $p_price_end = '';
            
        $num_products_per_page = 10;
        $allproducts = (isset($_GET['category_id']) || isset($_GET['name']) ||
                isset($_GET['id']) || isset($_GET['start']) ||
                isset($_GET['end']))
              ? Product::searchProducts($category_id, $name, $p_id, $p_price_start, $p_price_end)
              : Product::getAllProducts();
        $category = Category::getAllCategories();
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
            'name' => $category_id
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