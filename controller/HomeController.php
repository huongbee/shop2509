<?php
include_once('Controller.php');
include_once('model/HomeModel.php');
include_once('model/pager.php');

class HomeController extends Controller{

    public function getHomePage(){
    	$model = new HomeModel;

		$todayFoods = $model->getTodayFoods();
		
		// echo "<pre>";
		// print_r($todayFoods);
		// echo "</pre>";
		// die;

    	$foods = $model->getAllFoods();
    	$tongSp = count($foods);
    	if(isset($_GET['page']) && $_GET['page'] !=0 && is_numeric($_GET['page'])){
    		$trangHientai = abs($_GET['page']);
    	}
    	else
    		$trangHientai =  1;

    	$soSp1page = 9;
    	$soPageHienthi = 2;

    	$pager = new Pager($tongSp,$trangHientai,$soSp1page,$soPageHienthi);

    	$pagination = $pager->showPagination(); //là thanh phân trang

    	$vitri = ($trangHientai - 1)*$soSp1page;
    	$foods = $model->getAllFoodsPagination($vitri,$soSp1page);
    	/*echo "<pre>";
    	print_r($todayFoods);
    	echo "</pre>";
    	die;*/
    	$data = [
    		'todayFoods'=>$todayFoods,
    		'foods'=>$foods,
    		'pagination'=>$pagination
    	];

        return $this->loadView("trangchu",$data);
    }


}


?>