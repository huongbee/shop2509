<?php
include_once('Controller.php');
include_once('controller/Cart.php');
include_once('model/CheckOutModel.php');
include_once('include/function.php');
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
        if($customer>0){
            //luu bill
            $date_order = date('Y-m-d',time());

            $oldCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : NULL;
            $cart = new Cart($oldCart);

            // echo "<pre>";
            // print_r($cart); 
            // echo "</pre>"; die;
            $total = $cart->totalPrice;
            //token
            $token = createToken();
            $token_date = date('Y-m-d H:i:s');
             
            $bill = $model->insertBill($customer,$date_order,$total,$message,$token,$token_date);
            var_dump($bill);
        }
        

    }

    
}

?>