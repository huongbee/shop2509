<?php
include_once('controller/CartController.php');
$c = new CartController;
$action = isset($_POST['action']) ? $_POST['action'] : "add";
if($action == "update")
    return $c->updateCart();
elseif($action == "delete"){
    return $c->deleteCart();
}
//echo $action; die;
else return $c->addToCart();


?>