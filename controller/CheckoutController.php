<?php
include_once('Controller.php');
class CheckoutController extends Controller{

    public function getCheckout(){
        return $this->loadView("gio-hang");
    }

    
}

?>