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
    public function index() 
    {
        $orders = Order::getAllCurrentOrder();
        $this->setLayout('admin');
        return $this->render('orders', [
            'orders' => $orders
        ]);
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
    public function confirm ()
    {     
          $id = $_GET["id"];
          $order = Order::getOrderInfo($id);
          $order->updateOrderStatus($id);
         Application::$app->session->setFlash('confirmOrder', 'You have confirm success');
         Application::$app->response->redirect('/admin/orders');  

    }

    public function details ()
    {     
          $id = $_GET["id"];
          $order = Order::getOrderDetails($id);
          $this->setLayout('admin');
          return $this->render('orderDetails', [
              'order' => $order
          ]);

    }

   public function delete()
    {     $id = $_GET["id"];
          $order = Order::getOrderInfo($id);
          $order->delete();
          Application::$app->session->setFlash('success', 'You have deleted success');
          Application::$app->response->redirect('/admin/orders');  
       
     }
     
}