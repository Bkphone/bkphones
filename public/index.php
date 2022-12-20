<?php

use app\controllers\CategoryController;
use app\controllers\SiteController;
use app\core\Application;
use app\controllers\ProfileController;
use app\controllers\ProductController;
use app\controllers\AdminController;
use app\controllers\MenuController;
use app\controllers\UserController;
use app\controllers\StoreController;
use app\controllers\CartController;
use app\controllers\OrderController;

require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = [
    'userClass' => \app\models\User::class,
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];

$app = new Application(dirname(__DIR__), $config);

$app->router->get('/', [MenuController::class, 'home']);
$app->router->get('/register', [SiteController::class, 'register']);
$app->router->post('/register', [SiteController::class, 'register']);
$app->router->get('/login', [SiteController::class, 'login']);
$app->router->post('/login', [SiteController::class, 'login']);
$app->router->get('/logout', [SiteController::class, 'logout']);
$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->get('/about', [SiteController::class, 'about']);
$app->router->get('/profile', [ProfileController::class, 'profile']);
$app->router->post('/profile', [ProfileController::class, 'profile']);
$app->router->get('/stores', [SiteController::class, 'stores']);
$app->router->get('/menu', [MenuController::class, 'menu']);
$app->router->post('/menu', [MenuController::class, 'search']);
//cart
$app->router->get('/cart', [CartController::class, 'cart']);
$app->router->post('/cart', [CartController::class, 'cart']);

//order
$app->router->get('/lookup-orders', [OrderController::class, 'order']);
$app->router->post('/lookup-orders', [OrderController::class, 'order']);

// admin general
$app->router->get('/admin', [SiteController::class, 'admin']);
$app->router->post('/admin/login', [SiteController::class, 'login']);
$app->router->get('/admin/login', [SiteController::class, 'login']);
$app->router->get('/admin/users', [UserController::class, 'index']);
$app->router->get('/admin/products', [ProductController::class, 'index']);
$app->router->get('/admin/category', [CategoryController::class, 'index']);
$app->router->get('/admin/orders', [OrderController::class, 'index']);

// store
$app->router->get('/admin/stores/delete', [StoreController::class, 'delete']);
$app->router->get('/admin/stores/edit', [StoreController::class, 'update']);
$app->router->get('/admin/stores/add', [StoreController::class, 'add']);
$app->router->get('/admin/stores/details', [StoreController::class, 'details']);

$app->router->post('/admin/stores/delete', [StoreController::class, 'delete']);
$app->router->post('/admin/stores/edit', [StoreController::class, 'update']);
$app->router->post('/admin/stores/add', [StoreController::class, 'add']);
$app->router->post('/admin/stores/details', [StoreController::class, 'details']);

// user
$app->router->get('/admin/users/delete', [UserController::class, 'delete']);
$app->router->get('/admin/users/edit', [UserController::class, 'update']);
$app->router->get('/admin/users/create', [UserController::class, 'create']);
$app->router->get('/admin/users/details', [UserController::class, 'details']);
$app->router->get('/admin/users/edit/password', [UserController::class, 'password']);

$app->router->post('/admin/users/delete', [UserController::class, 'delete']);
$app->router->post('/admin/users/edit', [UserController::class, 'update']);
$app->router->post('/admin/users/create', [UserController::class, 'create']);
$app->router->post('/admin/users/details', [UserController::class, 'details']);
$app->router->post('/admin/users/edit/password', [UserController::class, 'password']);

// product
$app->router->get('/admin/products/delete', [ProductController::class, 'delete']);
$app->router->get('/admin/products/edit', [ProductController::class, 'update']);
$app->router->get('/admin/products/create', [ProductController::class, 'create']);

$app->router->post('/admin/products/edit', [ProductController::class, 'update']);
$app->router->post('/admin/products/create', [ProductController::class, 'create']);

// category
$app->router->post('/admin/category', [CategoryController::class, 'create']);
$app->router->post('/admin/category/edit', [CategoryController::class, 'update']);
$app->router->get('/admin/category/delete', [CategoryController::class, 'delete']);
$app->router->get('/product', [MenuController::class, 'detail']);
$app->router->post('/product', [MenuController::class, 'detail']);

// manage oders
$app->router->get('/admin/orders/delete', [OrderController::class, 'delete']);
$app->router->get('/admin/orders/confirm', [OrderController::class, 'confirm']);
$app->router->get('/admin/orders/details', [OrderController::class, 'details']);


$app->router->post('/admin/orders/delete', [OrderController::class, 'delete']);
$app->router->post('/admin/orders/confirm', [OrderController::class, 'confirm']);
$app->router->post('/admin/orders/details', [OrderController::class, 'details']);

// admin profile AdminController
$app->router->post('/admin/profile', [AdminController::class, 'profile']);
$app->router->get('/admin/profile', [AdminController::class, 'profile']);

// run
$app->run();