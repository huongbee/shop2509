<?php
include_once('DBConnect.php');

class HomeModel extends DBConnect{

	public function getTodayFoods(){
		$sql = "SELECT * FROM foods WHERE today=1";
		return $this->loadMoreRows($sql);
	}

	public function getAllFoods(){
		$sql = "SELECT * FROM foods";
		return $this->loadMoreRows($sql);
	}

	/*limit 0,10 p=1
			10,10 p=2
			20,10 p=3

			(p-1).10
	*/

	public function getAllFoodsPagination($vitri,$soluong){
		$sql = "SELECT * FROM foods LIMIT $vitri,$soluong";
		return $this->loadMoreRows($sql);
	}
}


?>