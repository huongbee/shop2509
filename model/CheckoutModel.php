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

    function insertBill($id_customer,$date_order,$total,$note,$token,$token_date){
        $sql = "INSERT INTO bills(id_customer,date_order,note,token,token_date)
                VALUES('$id_customer','$date_order','$total','$note','$token','$token_date')";
        $r = $this->executeQuery($sql);
        if($r){
            return $this->getLastId();
        }
        return false;
    }
    
}

?>