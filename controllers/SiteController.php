<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\middlewares\AuthMiddleWare;

use app\models\LoginForm;
use app\models\Store;
use app\models\User;

class SiteController extends Controller
{
    public function __construct()
    {
        // Preprocess login with cookie
        $loginForm = new LoginForm();
        if(!Application::$app->session::exists('user')) {
            if(isset($_COOKIE["member_login"])) {
                $loginForm->userId = $_COOKIE["member_login"];
                $loginForm->login('userId');
                setcookie ("member_login", Application::$app->session->get('user'), time() + 3600 * 24 * 30);
            }
        }
        $this->registerMiddleware(new AuthMiddleWare(['profile']));
    }

    public function error() {
        $this->setLayout('auth');
        return $this->render('permission');
    }

    public function about()
    {
        return $this->render('about');
    }

    public function stores()
    {
        $stores = Store::getAll();
        $this->setLayout('main');
        return $this->render('stores', [
            'store' => $stores
        ]);
    }

    public function login(Request $request)
    {
        $loginForm = new LoginForm();
        if ($request->getMethod() === 'post') {
            $loginForm->loadData($request->getBody());
            if ($loginForm->validate() && $loginForm->login('email')) {
                $userId = Application::$app->session->get('user');
                $userModel = User::getUserInfo($userId);
                setcookie("member_login", $userId, time() + 3600 * 24 * 30);

                if ($userModel->getRole() === 'admin') {
                    $path = Application::$app->request->getPath();
                    if ($path == "admin/login") {
                        return Application::$app->response->redirect('/admin/products');
                    } else {
                        return Application::$app->router->intended('/'); 
                    }
                } else {
                    return Application::$app->router->intended('/');
                }
            }
        }

        $this->setLayout('auth');
        return $this->render('login', [
            'model' => $loginForm
        ]);
    }

    public function register(Request $request)
    {
        $registerModel = new User();
        if ($request->getMethod() === 'post') {
            $registerModel->loadData($request->getBody());
            if ($registerModel->validate() && $registerModel->save()) {
                Application::$app->session->setFlash('success', 'Thanks for registering');
                Application::$app->response->redirect('/');
                return 'Show success page';
            }
        }

        $this->setLayout('auth');
        return $this->render('register', [
            'model' => $registerModel
        ]);
    }

    public function logout()
    {
        Application::$app->logout();
        Application::$app->response->redirect('/');
    }

    public function contact()
    {
        return $this->render('contact');
    }

    public function profile()
    {
        return $this->render('profile');
    }

    public function notice()
    {
        $this->setLayout('auth');
        return $this->render('payment_success');
    }

    public function admin(Request $request) {
        if ($request->getMethod() == 'get') {
            if (isset($_COOKIE["member_login"])) {
                    $this->setLayout('admin');
                    return $this->render('admin_index', []);
            }
            return Application::$app->response->redirect('/admin/login');
        }
    }
}