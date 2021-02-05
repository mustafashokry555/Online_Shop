<?php require_once("../app.php");

if(! $session->has("adminId")){
  header("location: " . URL . "admin/login.php");
}

use Online\Classes\Models\Product;
use Online\Classes\Models\Orders;
use Online\Classes\Models\Cats;
use Online\Classes\Models\Admin;
use Online\Classes\Models\OrderDetails;

$pr = new Product;
$ord = new Orders;
$c = new Cats;
$ad = new Admin;
$ordD = new OrderDetails;



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Techstore | Dashboard</title>

    <link rel="stylesheet" href="<?=URL;?>admin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=URL;?>admin/assets/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css">
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="<?=URL;?>admin/index.php">TechStore</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul id="navList" class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item ">
                  <a class="nav-link" href="<?=URL;?>admin/products.php">Products</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?=URL;?>admin/categories.php">Categories</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?=URL;?>admin/orders.php">Orders</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto mr-5">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <?=$session->get("adminName");?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="<?=URL;?>admin/profile.php">Profile</a>
                      <a class="dropdown-item" href="<?=URL;?>admin/handel/logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>