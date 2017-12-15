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
        $sql = "INSERT INTO bill_detail(id_bill,id_food,quantity,price)
                VALUES($id_bill,$id_food,$qty,$price)";
        //echo $sql;die;
        $r = $this->executeQuery($sql);
        if($r){
            return $this->getLastId();
        }
        return false;
    }

    function deleteBillDetail($id_bill){
        $sql = "DELETE FROM bill_detail WHERE id_bill=$id_bill";
        return $this->executeQuery($sql);
    }

    function deleteBill($id_customer){
        $sql = "DELETE FROM bills WHERE id_customer=$id_customer";
        return $this->executeQuery($sql);
    }
    function deleteCustomer($id){
        $sql = "DELETE FROM customers WHERE id=$id";
        return $this->executeQuery($sql);
    }

}

?>