<?php


require_once('function.php');
check_user_login();

require_once('db_connect.php');

$id = $_GET['id'];
if(empty($id)){
    header('Location:main.php');
    exit;
}

$pdo =db_connect();
try{
$sql ="SELECT * FROM posts WHERE id =:id";
$stmt = $pdo->prepare($sql);
$stmt ->bindParam(':id',$id);
$stmt ->execute();
}catch(PDOException $e){
    echo "Error".$e->getMessage();
    die();
}

if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $id      = $row['id'];
    $title   = $row['title'];
    $content = $row['content'];
}else{
    echo "対象のデータがありません";
}

//編集ボタンが押されたときの処理
if(!empty($_POST['update'])){
    $title2   = htmlspecialchars($_POST['title'],ENT_QUOTES);
    $content2 = htmlspecialchars($_POST['content'],ENT_QUOTES);
    $pdo2 = db_connect();
    try{
        $sql2  = "UPDATE posts SET title =:title2, content = :content2 where id =:id";
        $stmt2 =$pdo2->prepare($sql2);
        $stmt2 ->bindParam(':title2',$title2);
        $stmt2 ->bindParam(':content2',$content2);
        $stmt2 ->bindParam(':id',$id);
        $stmt2 ->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        header('Location:main.php');
    
    }catch(PDOException $e){
        echo "Error".$e->getMessage();
        die();
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
    <form action="" method="post">
        タイトル<br>
        <input type="text" value ="<?php echo $row['title'] ?>" name ="title"><br>
        
        内容<br>
        <textarea name="content" id="" cols="30" rows="10"><?php echo $row['content']; ?></textarea><br>
        <input type="hidden" value ="<?php echo $row['id']; ?>" name ="id">
        <input type="submit" value="編集" name ="update">
    </form>
</body>
</html>