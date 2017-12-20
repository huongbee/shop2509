<?php
include_once('Controller.php');
include_once('controller/Cart.php');
include_once('model/CheckOutModel.php');
include_once('include/function.php');
include_once('include/Mailer.php');
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
            
            if($bill){
                //insertBillDetail($id_bill,$id_food,$qty,$price)
                foreach($cart->items as $id=>$food){
                    $qty = $food['qty'];
                    $price = $food['price'];
                    $result = $model->insertBillDetail($bill,$id,$qty,$price);
                    if(!$result){
                        $model->deleteBillDetail($bill);
                        $model->deleteBill($customer);
                        $model->deleteCustomer($customer);
                        setcookie('error',"Có lỗi xảy ra, vui lòng thử lại",time()+1);
                        header('Location:checkout.php');
                    }
                }
                //
                $subject = "Xác nhận đơn hàng DH-000".$bill;

                $token_date = strtotime($token_date);
                $link = "http://localhost/shop2509/order-confirm.php?token=$token&t=$token_date";

                $content = "Chào bạn $fullname,
                <br/>Cám ơn bạn đã mua hàng......
                <br/>Bạn vui lòng chọn vào link sau để xác nhận đơn hàng: $link
                <br/>Nếu bạn không đặt hàng, vui lòng bỏ qua email này....";
                $check = Mailer($fullname,$email,$subject,$content);
                if($check){
                    unset($cart);
                    unset($_SESSION['cart']);
                    $_SESSION['thanhcong'] = "Dat hang thanh cong. Vui lòng kiểm tra email để xác nhận đơn hàng.";
                    header('Location:checkout.php');
                }
                else{
                    setcookie('error',"Có lỗi xảy ra, vui lòng thử lại",time()+1);
                    header('Location:checkout.php');
                }
            }
            else{
                $model->deleteCustomer($customer);
                setcookie('error',"Có lỗi xảy ra, vui lòng thử lại",time()+1);
                header('Location:checkout.php');
            }
        }
        else{
            setcookie('error',"Có lỗi xảy ra, vui lòng thử lại",time()+1);
            header('Location:checkout.php');
        }

        

    }

    public function getOrderConfirm(){
        $token = isset($_GET['token']) ? $_GET['token'] : '';//KBImYM9isFuiAwhlcUqzmpCrAR7KXf
        $time = isset($_GET['t']) ? $_GET['t'] : 0;
        $now = strtotime(date('Y/m/d H:i:s'));
        if($now - $time <= 86400){
            //
            if(strlen($token)==30){
                $model = new  CheckOutModel;
                $bill = $model->checkBill($token);
                if($bill){
                    $model->acceptBill($bill->id);
                    $_SESSION['thanhcong'] =  "Xác nhận đon hàng thành công";
                }
                else{
                    $_SESSION['error'] =  "Không tin thấy đơn hàng, Vui lòng kiểm tra lại.";
                }
            }
            else{
                $_SESSION['error'] =  "Token không đúng, Vui lòng kiểm tra lại.";
            }
        }
        else
            $_SESSION['error'] = "Token Hết hạn";
            header("Location:checkout.php");

           // header("location:index.php");
    }
    
}

