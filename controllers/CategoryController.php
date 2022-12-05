<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\middlewares\AdminMiddleWare;
use app\models\Category;
use app\core\Request;

class CategoryController extends Controller {
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
        $num_cate_per_page = 10;
        $allCategories = Category::getAllCategories();
        $num_cate = count($allCategories);
        $page_nums = ceil($num_cate/$num_cate_per_page);
        $categories = Category::getCategoryByPaging($page, $num_cate_per_page);
        $model = new Category();
        $this->setLayout('admin');
        return $this->render('category', [
            'model' => $model,
            'categories' => $categories,
            'page' => $page,
            'page_nums' => $page_nums
        ]);
    }

    public function create(Request $request) 
    {  
        if ($request->getMethod() == "post") {
            $category = new Category();
            $category->loadData($request->getBody());
            if ($category->validate() && $category->save()) {
                Application::$app->response->redirect('/admin/category');
                return 'Show Success Page';
            }
        }
        return $this->index();
    }

    public function delete(Request $request)
    {
        $param = $request->getParam('id');
        Category::delete($param);
        Application::$app->response->redirect('/admin/category');
    }
}
