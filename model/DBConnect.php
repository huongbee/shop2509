<?php

class DBConnect{

	public $sql;
	public $connect = null;
	public $statement;

	public function __construct(){
		try{
		    $dbh = new PDO('mysql:host=localhost;dbname=php2509_banhang', "root", ""); 
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
	//TH2: SELECT 1 dòng
	public function loadOneRow($query,$param=array()){
		$check = $this->executeQuery($query,$param);
		if($check){
			return $this->statement->fetch(PDO::FETCH_OBJ);
		}
		else{
			return false;
		}
	}

	//TH3: SELECT nhiều dòng
	public function loadMoreRows($query,$param=array()){
		$check = $this->executeQuery($query,$param);
		if($check){
			return $this->statement->fetchAll(PDO::FETCH_OBJ);
		}
		else{
			return false;
		}
	}

	function getLastId(){
		return $this->connect->lastInsertId();
	}
}

?>