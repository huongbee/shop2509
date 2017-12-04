<?php
include_once('DBConnect.php');

class DetailFoodsModel extends DBConnect{
    function getDetailFood($alias){//banh-canh

        $sql = "SELECT f.* FROM foods f 
                INNER JOIN page_url p 
                    ON f.id_url = p.id
                WHERE p.url = '$alias' ";
                
        return $this->loadOneRow($sql);
    }
}