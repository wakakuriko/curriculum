<?php
require_once('db_connect.php');
session_start();

if(!empty($_POST['back'])){
    header("Location:main.php");
}

if(!empty($_POST)){

    $title = $_POST['title'];
    $date = $_POST['date'];
    $stock = $_POST['stock'];


    if(empty($_POST['title'])){
        echo "タイトルが入力されてません。";
    }

    if(empty($_POST['date'])){
        echo "発売日が入力されてません";
    }

    if(empty($_POST['stock'])){
        echo "在庫数が入力されてません";
    }

    if(!empty($_POST['title']) && !empty($_POST['date']) && !empty($_POST['stock'])){

        $pdo = db_connect();

        $sql ="INSERT INTO books(title,date,stock)values(:title,:date,:stock)";
        try{
            $stmt = $pdo->prepare($sql);
            $stmt ->bindParam(':title',$title);
            $stmt ->bindParam(':date',$date);
            $stmt ->bindParam(':stock',$stock);
            $stmt ->execute();

        }catch(PDOException $e){
            echo "Error".$e ->getMessage();
        }

        header('Location:main.php');
    }
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="registar.css">
    <title>Document</title>
</head>
<body>
    <header>
        <p>本 登録画面</p>
    </header>

    <main>
        <form action="" method="post">
            <input class="nyuuryoku" type="text" name="title" placeholder="タイトル"><br>
            <input class="nyuuryoku" type="date" name="date" placeholder="発売日"><br>
            在庫数<br>
            <input class="nyuuryoku" type="number" name = "stock" placeholder ="選択してください"><br>
            <input class="submit" type="submit" value="送信" name ="submit"> <input class="reset" type="reset" value="リセット"><br>
            <input class="back" type="submit" value="戻る" name ="back">
        </form>
    </main>
   
</body>
</html>