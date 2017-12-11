<?php
include_once('controller/CartController.php');
$c = new CartController;
$action = isset($_POST['action']) ? $_POST['action'] : "add";
if($action == "update")
    return $c->updateCart();
if($action == "detete")
   // return $c->deleteCart();
return $c->addToCart();


?>