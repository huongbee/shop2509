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
        $sql = "INSERT INTO bills(id_customer,date_order,total,note,token,token_date)
                VALUES('$id_customer','$date_order','$total','$note','$token','$token_date')";
        //echo $sql; die;
        $r = $this->executeQuery($sql);
        if($r){
            return $this->getLastId();
        }
        return false;
    }

    function insertBillDetail($id_bill,$id_food,$qty,$price){
        $sql = "INSERT INTO bill_detail(id_bill,id_food,quatity,price)
                VALUES($id_bill,$id_food,$qty,$price)";
        $r = $this->executeQuery($sql);
        if($r){
            return $this->getLastId();
        }
        return false;
    }

}

?>