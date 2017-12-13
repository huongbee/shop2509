<?php
include_once('DBConnect.php');

class CheckOutModel extends DBConnect{

    function insertCustomer($name,$email,$address,$phone){
        $sql = "INSERT INTO customers(name,email,address,phone)
                VALUES('$name','$email','$address','$phone')";
        $r = $this->executeQuery($sql);
        if($r){
            return $this->getLastId();
        }
        return false;
    }
}

?>