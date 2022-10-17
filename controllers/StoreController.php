<?php
/*
    controllers/store.php
*/

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\models\Store;

class StoreController extends Controller
{
    public function __construct() {}

    public function index()
    {
        $stores = Store::getAll();
        $this->setLayout('admin');
        return $this->render('/admin/stores/stores', [
            'store' => $stores
        ]);
    }
}