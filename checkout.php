<?php
include_once('controller/CheckoutController.php');
$c = new CheckoutController;
if(isset($_POST['btnCheckout'])){
    return $c->postCheckout();
}
return $c->getCheckout();

?>