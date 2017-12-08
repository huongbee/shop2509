<?php
include_once('model/CartModel.php');
include_once('Cart.php');
session_start();

class CartController{
    public function addToCart(){
        //nhan tu ajax view chi tiet
        $qty = $_POST['soluong'];
        $id = $_POST['idSanpham'];

        //lay thong tin sp chuan bi them vao gio hang
        $model  = new CartModel;
        $food = $model->findFood($id);

        //them vao gio hang
        //lay thong tin gio hanh truoc do
        $oldCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : NULL;
        $cart = new Cart;

        
    }
}

?>