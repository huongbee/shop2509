<?php

class DBConnect{

	public $sql;
	public $connect = null;
	public $statement;

	public function __construct(){
		try{
		    $dbh = new PDO('mysql:host=localhost;dbname=php2509_banhang', "root", "123456"); 
		    $dbh->exec("set names utf8"); 
		    $this->connect = $dbh;
		}
		catch(PDOException $e){
		    echo "Lỗi";
		    echo $e->getMessage();
		}
	}

	public function setStatement($query,$param=array()){
		$stmt = $this->connect->prepare($query);
		if(!empty($param)){
			$number = count($param); 
			for($i=1; $i <= $number; $i++){
				$stmt->bindParam($i,$param[$i-1]);
			}
		}		
		$this->statement = $stmt;
	}

	//TH1: insert/update/delete
	public function executeQuery($query,$param=array()){
		$this->setStatement($query,$param);
		return $this->statement->execute();

	}
	//TH2: SELECT 1
	public function loadOneRow($query,$param=array()){
		$check = $this->executeQuery($query,$param);
		if($check){
			return $this->statement->fetch(PDO::FETCH_OBJ);
		}
		else{
			return false;
		}
	}

	public function loadMoreRows($query,$param=array()){
		$check = $this->executeQuery($query,$param);
		if($check){
			return $this->statement->fetchAll(PDO::FETCH_OBJ);
		}
		else{
			return false;
		}
	}





}


$db = new DBConnect; 
//$sql = "INSERT INTO bill_detail(id_bill,id_food,quantity, price) VALUES(10,52,5000,89)";
//$p = array(10,52,5,89);
//$sql = "UPDATE bill_detail SET quantity=8 WHERE id=24";
//$p = array(12,24);
//$r = $db->executeQuery($sql);
// $sql = "SELECT * FROM food_type WHERE id=5";
// $r = $db->loadOneRow($sql);
$sql = "SELECT * FROM food_type WHERE id>=5";
$r = $db->loadMoreRows($sql);
print_r($r);
?>