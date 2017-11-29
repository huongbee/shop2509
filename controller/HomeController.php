<?php
include_once('Controller.php');
class HomeController extends Controller{

    public function getHomePage(){
        return $this->loadView("trangchu.php");
    }

    
}


?>