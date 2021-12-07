<?php
require_once('db_connect.php');

if(isset($_POST['signUp'])){
    if(empty($_POST['name'])){
        echo '名前が入力されていません';
    }

    if(empty($_POST['password'])){
        echo 'パスワードが入力されていません';
    }

    if(!empty($_POST['name']) && !empty($_POST['password'])){
        $name = htmlspecialchars($_POST['name'],ENT_QUOTES);
        $pass = htmlspecialchars($_POST['password'],ENT_QUOTES);

        $pass_hash = password_hash($pass,PASSWORD_DEFAULT);
        $pdo= db_connect();
        try{
            $sql = "INSERT INTO users (name,password)VALUES(:name,:password)";
            $stmt = $pdo->prepare($sql);
            $stmt ->bindParam(':name',$name);
            $stmt ->bindParam(':password',$pass_hash);
            $stmt ->execute();
            
            echo "登録しました";

        }catch(PDOException $e){
            echo "error".$e ->getMessage();
        }
    }
}



?>












<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signUp.css">
    <title>Document</title>
</head>
<body>
    <p>ユーザー登録画面</p>

<div class="main">
    <form action="" method="post">
    <div class="nyuuryoku"><input type="text" name="name"placeholder="ユーザー名"  class="nyuuryoku"><br></div>
                <div class="nyuuryoku"><input type="pass" name="pass" placeholder="パスワード" class="nyuuryoku"><br></div>
        <input type="submit" value="送信" name ="signUp" id="button">
    </form>
</div>

</body>
</html>