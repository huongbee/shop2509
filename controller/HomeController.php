<?php
include_once('Controller.php');
class HomeController extends Controller{

    public function getHomePage(){
        $this->loadView("trangchu.php");
    }
}


?>