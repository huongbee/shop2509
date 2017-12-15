<?php

function createToken(){
    $string = "1234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM";
    $length = strlen($string);
    $token = '';
    for($i=0; $i<30;$i++){
        $token .= substr($string,rand(0,$length),1);
    }
    return $token;
}

//echo createToken();

//TrEvL0EX6F8urOzAw44Gg6bPllR1Dj
?>