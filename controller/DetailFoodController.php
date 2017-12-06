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
        
        //$id_type = $food->id_type;
        $relatedFood = $model->getRelatedFood($food->id_type,$food->id);
        echo "<pre>";
		print_r($relatedFood);
		echo "</pre>";
        die;
        $data = array(
            'food'=>$food,
            'relatedFood'=>$relatedFood
        );
        return $this->loadView("chi-tiet",$data);
    }

    
}

?>