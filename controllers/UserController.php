<?php
/*
    controllers/user.php
*/
namespace app\controllers;

use app\core\Controller;
use app\core\Application;
use app\middlewares\AdminMiddleWare;
use app\models\User;
use app\core\Request;

class UserController extends Controller{
    public function __construct() {
        Application::$app->controller->registerMiddleware(new AdminMiddleWare(['index', 'create', 'delete', 'update', 'details']));
    }

    public function index() 
    {
        $users = User::getAllUsers();
        $this->setLayout('admin');
        return $this->render('users', [
            'users' => $users
        ]);
    }

    public function create(Request $request)
    {
        $usermodel = new User();
        if ($request->getMethod() === 'post') {
            $usermodel->loadData($request->getBody());
            $role = $usermodel->role;
            if ($usermodel->validate() && $usermodel->saveAdmin($role)) {
                Application::$app->session->setFlash('success', 'You have added a new user');
                Application::$app->response->redirect('create');
                return 'Show success page';
            }
        }

        $this->setLayout('admin');
        return $this->render('create', [
            'model' => $usermodel
        ]);
    }
   
    public function update(Request $request)
    {     
        $id = $_GET["id"];
        $usermodel = User::getUserInfo($id);
        if ($request->getMethod() === 'post') {
            $usermodel->loadData($request->getBody());
            if ($usermodel->updateProfile($usermodel)) {
                Application::$app->session->setFlash('success', 'You have edited success');
                Application::$app->response->redirect('/admin/users');
                return 'Show success page';
            }
        }

        $this->setLayout('admin');
        return $this->render('edit', [

            'model' => $usermodel
        ]);
    }

    public function password(Request $request)
    {     
        $id = $_GET["id"];
        $usermodel = User::getUserInfo($id);
        if ($request->getMethod() === 'post') {
            $usermodel->loadData($request->getBody());
            if ($usermodel->update($usermodel)) {
                Application::$app->session->setFlash('success', 'You have edited success');
                Application::$app->response->redirect('/admin/users');
                return 'Show success page';
            }
        }

        $this->setLayout('admin');
        return $this->render('password', [
            'model' => $usermodel
        ]);
    }
    
    public function delete()
    {     
        $id = $_GET["id"];
        $usermodel = User::getUserInfo($id);
        $usermodel->delete();
        Application::$app->session->setFlash('success', 'You have deleted success');
        Application::$app->response->redirect('/admin/users');  
    }
}
