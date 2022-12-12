<?php
/*
    controllers/user.php
*/
namespace app\controllers;

use app\core\Controller;
use app\core\Application;
use app\middlewares\AdminMiddleWare;

class AdminController extends Controller{
    
    public function index() 
    {
       $this->setLayout('admin');
      return $this->render('adminhome');
    }
}