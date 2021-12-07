<?php

function devide($num1,$num2){
    try{
        if($num2 == 0){
            throw new Exception('0で割ることはできません');
        }
    return $num1/$num2;
    } catch (Exception $e){
        echo "例外処理が発生しました.<br";
        echo $e -> getMessage();
    }
}


for ($i=10;$i--;$i<0){
    echo devide(2,$i);
    echo "<br>";
}
