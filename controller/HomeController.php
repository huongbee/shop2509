<?php
include_once('Controller.php');
include_once('model/HomeModel.php');

class HomeController extends Controller{

    public function getHomePage(){
    	$model = new HomeModel;

    	$todayFoods = $model->getTodayFoods();

    	$foods = $model->getAllFoods();
    	/*echo "<pre>";
    	print_r($todayFoods);
    	echo "</pre>";
    	die;*/
    	$data = [
    		'todayFoods'=>$todayFoods,
    		'foods'=>$foods
    	];

        return $this->loadView("trangchu",$data);
    }


}


?>