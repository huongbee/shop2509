<?php
include_once('DBConnect.php');

class CartModel extends DBConnect{

    function findFood($id){
        $sql = "SELECT * FROM foods WHERE id=$id";
        return $this->loadOneRow($sql);
    }

}

?>