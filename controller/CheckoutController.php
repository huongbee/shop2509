<?php
include_once('Controller.php');
include_once('controller/Cart.php');
session_start();

class CheckoutController extends Controller{

    public function getCheckout(){

        $oldCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : NULL;
        $cart = new Cart($oldCart);
        // echo "<pre>";
        // print_r($cart);
        // echo "</pre>";
        // die;
        return $this->loadView("gio-hang",$cart);
    }

    
}

?>