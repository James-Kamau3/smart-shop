<?php


require 'database/DBController.php';
require 'database/Product.php';
require 'database/Cart.php';


//DBController object(instace of class)
$db = new DBController();

//product object
$product = new Product($db);
$product_shuffle = $product->getData();


//cart object
$Cart = new Cart($db);
