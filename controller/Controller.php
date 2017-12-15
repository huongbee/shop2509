<?php

class Controller{

    public function __construct(){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    }

    public function loadView($view, $data = array()){
        //$view = trangchu.php
        include_once("view/layout.php");
    }
}


?>