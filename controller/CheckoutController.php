<?php
include_once('Controller.php');
include_once('controller/Cart.php');
include_once('model/CheckOutModel.php');
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

    public function postCheckout(){
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $phone  = $_POST['phone'];
        $message = $_POST['message'];

        $model = new CheckOutModel;
        $customer = $model->insertCustomer($fullname,$email,$address,$phone);

        var_dump($customer);

    }

    
}

?>