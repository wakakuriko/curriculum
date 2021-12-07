<?php
$fruits = ["apple" =>"りんご", "orange" => "みかん", "peach" => "もも"];

$fruits1 = ["りんご", "みかん", "もも"];


foreach ($fruits as $key =>$value) {
    echo $key.'は';
    echo $value,'です<br>';
}