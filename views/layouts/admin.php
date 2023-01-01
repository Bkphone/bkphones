<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Bảng điều khiển</title>
  <link data-n-head="ssr" rel="icon" type="image/x-icon" href="/images/favicon.png">
  <link rel="stylesheet" href="/css/admin/dataTables.bootstrap.css">
  <link rel="stylesheet" href="/css/admin/dt-sidebar.css">
  <link rel="stylesheet" href="/css/admin/dt-gradients.css">
  <link rel="stylesheet" href="/css/admin/dt-theme.css">
  <link rel="stylesheet" href="/css/admin/dt-styles.css">
  <link rel="stylesheet" href="/css/error.css">
  <link rel="stylesheet" href="/css/admin/profile.css">
  <link rel="stylesheet" href="/css/admin/dashboard.css">
  <link rel="stylesheet" href="/css/admin/create_user.css">
  <link rel="stylesheet" href="/css/admin/dt-home.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <script src="/js/admin/jquery-3.2.1.js"></script>
  <script src="/js/admin/bootstrap.min.js"></script>
  <script src="/js/admin/jquery.dataTables.js"></script>
  <script src="/js/admin/dataTables.bootstrap.js"></script>
  <script src="/js/admin/underscore.js"></script>
</head>
<?php

use app\core\Application;
use app\models\User;

$userID = Application::$app->session->get('user');
$userModel = User::getUserInfo($userID);
?>

<body>
  <div id="wrapper" class="toggled">
    <div id="sidebar-wrapper" class="harmonic">
      <ul class="sidebar-nav">
        <li class="sidebar-brand">
          <a style="font-size: 1.5rem;">
            Hello, <?= $userModel->getDisplayName() ?>
          </a>
        </li>
        <li>
          <a href="/admin" ?>
            <i class="fas fa-home" aria-hidden="true"></i> &nbsp;Trang chính
          </a>
        </li>
        <li>
          <a href="/admin/products?page=1">
            <i class="fab fa-product-hunt" aria-hidden="true"></i> &nbsp;Quản lý sản phẩm
          </a>
        </li>
        <li>
          <a href="/admin/category">
            <i class="fa fa-building" aria-hidden="true"></i> &nbsp;Quản lý các mục
          </a>
        </li>
        <li>
          <a href="/admin/users">
            <i class="fa fa-users" aria-hidden="true"></i> &nbsp;Quản lý người dùng
          </a>
        </li>
        <li>
          <a href="/admin/orders">
            <i class="fas fa-hand-pointer" aria-hidden="true"></i>&nbsp; Xử lý đơn hàng
          </a>
        </li>
        <li>
          <a href="/admin/profile">
            <i class="fas fa-user-cog" aria-hidden="true"></i>&nbsp;Tài khoản của tôi
          </a>
        </li>
      </ul>
    </div>
    <div id="page-content-wrapper">
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button 
            type="button" 
            class="navbar-toggle collapsed" 
            data-toggle="collapse" 
            data-target="#bs-example-navbar-collapse-1"
            aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#menu-toggle" id="menu-toggle">
              <i class="fa fa-arrow-left" aria-hidden="true"></i>
            </a>
            <a class="navbar-brand" href="/">Back to Buy me store</a>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="/logout"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Đăng xuất</a></li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            {{content}}
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="/js/admin/simple-sidebar.js"></script>
  <script src="/js/admin/plugins.js"></script>

</body>

</html>