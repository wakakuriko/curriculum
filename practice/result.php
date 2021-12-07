<?php
$drinks = $_POST['drinks'];
$drinksPrice = $_POST['drinksPrice'];
$price = $_POST['price'];

if($price == ''){
    echo '金額を投入してください';
}elseif($drinksPrice == ''){
    echo '商品を選択してください';
}elseif($drinksPrice == $price){
    echo '飲み物を購入しました。おつりはありません';
}elseif($drinksPrice <$price){
    echo '飲み物を購入しました<br>';
    echo $price -$drinksPrice.'円のお釣りが返ってきました';
}elseif($drinksPrice > $price){
    echo '投入金額が不足しています。.<br>';
    echo '再度お金を入れなおしてください';
}

]


var_dump($price);


?>