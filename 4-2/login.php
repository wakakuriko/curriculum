
<?php
require_once('db_connect.php');
// セッション開始
session_start();

if(!empty($_POST)){
    if(empty($_POST['name'])){
        echo 'ユーザー名が入力されていません。';
    
    }
    
    if(empty($_POST['pass'])){
        echo 'パスワードが入力されていません。';
    
    }
}


if(!empty($_POST['name']) && !empty($_POST['pass'])){
    $name = htmlspecialchars($_POST['name'],ENT_QUOTES);
    $pass = htmlspecialchars($_POST['pass'],ENT_QUOTES);

    $pdo = db_connect();

    try{
        $sql = "SELECT * FROM USERS WHERE name = :name";
        $stmt = $pdo->prepare($sql);
        $stmt ->bindParam(':name',$name);
        $stmt ->execute();

    }catch(PDOException $e ){
        echo "Error".$e ->getMessage();
        die();
    }

    if($row = $stmt ->fetch(PDO::FETCH_ASSOC)){
        if(password_verify($pass,$row['password'])) {
            $_SESSION['user_id'] =  $row['id'];
            $_SESSION['user_name'] = $row['name'];
            header("Location: main.php");
        }else{
            echo "パスワードに誤りがあります。";
        }
    }else{
        echo "ユーザー名またはパスワードに誤りがあります。";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="login.css">
        <title>login</title>

        

    </head>
    <body>
        <header>
            <p>ログイン画面</p>
            <div class="signUp">
                <a href="signUp.php">
                    <button>新規ユーザー登録</button>
                </a>
            </div>
        </header>
        
      
        <div class="main">
            <form method="post" action="">

                <div class="nyuuryoku"><input type="text" name="name"placeholder="ユーザー名"  class="nyuuryoku"><br></div>
                <div class="nyuuryoku"><input type="pass" name="pass" placeholder="パスワード" class="nyuuryoku"><br></div>
                <input type="submit" value="ログイン" class="login" id="button">
            </form>
        </div>
    </body>
</html>