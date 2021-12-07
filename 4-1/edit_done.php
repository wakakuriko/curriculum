<?php
require_once('function.php');
check_user_login();

require_once('db_connect.php');

$id = $_POST['id'];

$pdo = db_connect();
try{
    $sql = "select * from posts where id = :id";
    $stmt = $pdo ->prepare($sql);
    $stmt -> bindParam(':id',$id);
    $stmt -> execute();
}catch(PDOException $e){
    echo "Error".$e->getMessage();
    die();
} 

if($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
    $title = $row['title'];
    $content = $row['content'];
}else{
    echo "無効なデータです";
}

if(!empty($_POST['back'])){
    header('Location:main.php');
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
    <h3>この内容で訂正しますか？</h3>
    タイトル:<?php echo $title; ?><br>
    内容:<?php echo $content; ?>

    <form action="" method="post">
        <input type="submit" name="back" value="編集完了">
    </form>

    <form action="edit_post.php" metod="get">
        <input type="hidden" name="id" value="<?php echo $row['id'];?>">
        <input type="submit" name ="reEdit" value="再編集する">
    </form>

</body>
</html>