<?php
include_once('Controller.php');
include_once('model/DetailFoodModel.php');
class DetailFoodController extends Controller{

    public function getDetailFood(){
        $alias = $_GET['url'];
        $model = new DetailFoodsModel;

        $food = $model->getDetailFood($alias);

        if(!$food){
            header("Location:404.php");
        }
        // echo "<pre>";
		// print_r($food);
		// echo "</pre>";
        // die;
        $data = array(
            'food'=>$food
        );
        return $this->loadView("chi-tiet",$data);
    }

    
}

?>