<?php
/*
    controllers/user.php
*/
namespace app\controllers;

use app\core\Controller;
use app\core\Application;
use app\core\Request;
use app\middlewares\AdminMiddleWare;
use app\models\User;

class UserController extends Controller{
    public function __construct() {
        Application::$app->controller->registerMiddleware(new AdminMiddleWare(['index', 'create', 'delete', 'update', 'details']));
    }

    public function index() 
    {
        $users = User::getAllUsers();
        $this->setLayout('admin');
        return $this->render('/admin/users/users', [
            'users' => $users
        ]);
    }
}