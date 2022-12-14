<?php
namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\middlewares\AuthMiddleWare;
use app\models\Order;

class OrderController extends Controller{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleWare(['order']));
    }

    public function order(){
        $userID = Application::$app->session->get('user');
        $orders = Order::getAllOrder($userID);
        $this->setLayout('main');

        return $this->render('order',[
            'userID' => $userID,
            'orders' => $orders,
        ]);

    }
}