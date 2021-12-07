<?php
require_once('function.php');
require_once('db_connect.php');

$post_id = $_GET['post_id'];

if(empty($post_id)){
    echo "不正な画面遷移です";
}

if(!empty($_POST)){
    $name = $_POST['name'];
    $content = $_POST['content'];
    
    if(empty($_POST['name'])){
        $name ="名無し";
    }

    

    $pdo = db_connect();
    try{
        $sql ="INSERT INTO comments (post_id,name,content)values(:post_id,:name,:content)";
        $stmt = $pdo ->prepare($sql);
        $stmt ->bindParam(':post_id',$post_id);
        $stmt ->bindParam('name',$name);
        $stmt ->bindParam(':content',$content);
        $stmt -> execute();
    }catch(PDOException $e){
        echo "Error".$e->getMessage();
        die();
    }

    header("Location: detail_post.php?id=".$post_id);
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
    <h2>コメント</h2>
    <form action="" method ="post">
        投稿者名:<br>
        <input type="text" name ="name"><br>

        コメント:<br>
        <textarea name="content" id="" cols="30" rows="10"></textarea>
        <input type="submit" value="送信">
    </form>
</body>
</html>