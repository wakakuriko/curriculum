<?php
require_once('db_connect.php');

session_start();


if(!empty($_POST)){
    if(empty($_POST['name'])){
        echo "名前を入力してください";
    }elseif(empty($_POST['password'])){
        echo "パスワードを入力してください";
    }
}

if(!empty($_POST['name']) && !empty($_POST['password'])){
    $name = htmlspecialchars($_POST['name'],ENT_QUOTES);
    $password = htmlspecialchars($_POST['password'],ENT_QUOTES);

    $pdo = db_connect();
    try{
        $sql = "SELECT * FROM users WHERE NAME =:name";
        $stmt = $pdo->prepare($sql);
        $stmt ->bindParam(':name',$name);
        $stmt ->execute();
    }catch(PDOException $e){
        echo "Error",$e->getMessage();
        die();
    }

    if($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
        if(password_verify($password,$row['password'])){
            $_SESSION["user_id"] = $row['id'];
            $_SESSION["user_name"] = $row['name'];
            header('Location:main.php');
        }else{
            echo "パスワードが間違っています";
        }
    }else{
        echo "ユーザー名が間違っています";
    }



}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login Page</h1>
    <form method="post" action="">
        Username:
        <input type="text" name ="name" id ="name"><br>

        Password :
        <input type="password" name ="password" id ="password"><br>
        <input type="submit" name="login" value ="login" >
    </form>
</body>
</html>