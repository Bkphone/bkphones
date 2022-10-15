<?php

use app\controllers\SiteController;
use app\core\Application;
use app\controllers\ProfileController;
use app\controllers\AdminController;
use app\controllers\MenuController;
use app\controllers\UserController;
use app\controllers\StoreController;

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

// admin general
$app->router->get('/admin', [AdminController::class, 'index']);
$app->router->get('/admin/users', [UserController::class, 'index']);

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

// run
$app->run();