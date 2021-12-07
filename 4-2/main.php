<?php
require_once('db_connect.php');
session_start();

if(!empty($_POST['logout'])){
    header('Location:login.php');

}

if(!empty($_POST['registar'])){
    header('Location:registar.php');
}

if(!empty($_POST['delete'])){
    $id = 
    $pdo = db_connect();
    $sql ="DELETE * FROM  books where id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt ->bindParam(':id',$id);
}



$sql = "SELECT * FROM books ORDER BY ID ASC";
$pdo = db_connect();

try{
    $stmt = $pdo->prepare($sql);
    $stmt -> execute();

}catch(PDOException $e){
    echo "Error".$e->getMessage();
    die();
}

if(empty($_SESSION['user_name'])){
    header("Location:login.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Document</title>
</head>
<body>
    
    <h2>在庫一覧画面</h2>  
    <form action="" method= "post">
        <input type="submit" value="新規登録" name ="registar" id="registar">
        <input type="submit" value="ログアウト" name ="logout" id="logout">
    </form>

    <table>
        <tr>
            <th>タイトル</th>
            <th>発売日</th>
            <th>在庫数</th>
            <th></th>
        </tr>

    <?php while ($row = $stmt ->fetch(PDO::FETCH_ASSOC)){?>
        <tr>
            <td><?php echo $row['title'];?></td>
            <td><?php echo $row['date'];?></td>
            <td><?php echo $row['stock'];?></td>
            <div class="delete"><td><a href="delete.php?id=<?php echo $row['id'];?>>"><button>削除</button></a></td></div>     
        </tr>
    <?php }?>
    </table>
</body>
</html>