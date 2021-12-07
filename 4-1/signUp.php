<?php
require_once('db_connect.php');
if(isset($_POST['signUp'])){

    $name = $_POST['name'];
    $password = $_POST['password'];
    
    if( !empty($name) && !empty($password)){
        $password_hash = password_hash($password,PASSWORD_DEFAULT);
        $sql = "INSERT INTO users  (name,password)values(:name,:password_hash)";
        $pdo = db_connect();
        try{
            $stmt = $pdo->prepare($sql);
            $stmt -> bindParam(':name',$name);
            $stmt -> bindParam(':password_hash',$password_hash);
            $stmt -> execute();
            echo 'name,password inserted';



        }catch(PDOException $e){
            echo "error",$e->getMessage();
            die();
        }


    }else{
        echo "Please fill out the blanks";
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
    <h1>Registar</h1>
    <form method="post" action="">
        User name:<br>
        <input type="text" name ="name" id ="name"><br>

        Password:<br>
        <input type="password" name ="password" id ="password"><br>
        <input type="submit" value="submit" id ="signUp" name ="signUp">
        </form>

</body>
</html>

