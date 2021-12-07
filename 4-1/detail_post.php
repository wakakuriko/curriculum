<?php
require_once('function.php');
require_once('db_connect.php');
check_user_login();

$id = $_GET['id'];

if(empty($id)){
    header('Location:main.php');
}

// 記事内容の取得に関する箇所
$pdo_content = db_connect();
try{
    $sql_content = "SELECT * FROM posts where id = :id";
    $stmt_content = $pdo_content -> prepare($sql_content);
    $stmt_content -> bindParam(':id',$id);
    $stmt_content -> execute();

}catch(PDOException $e ){
    echo "Error".$e ->getMessage();
    die();
}

if($row_content = $stmt_content ->fetch(PDO::FETCH_ASSOC)){
    $id      = $row_content['id'];
    $title   = $row_content['title'];
    $content = $row_content['content'];
}else{
    echo "対象のデータがありません";
}


// コメントの取得に関する箇所
$pdo_comments = db_connect();

try{
    $sql_comments = "SELECT * FROM comments WHERE post_id = :id";
    $stmt_comments = $pdo_comments -> prepare($sql_comments);
    $stmt_comments -> bindParam(':id',$id);
    $stmt_comments -> execute();

}catch(PDOException $e){
    echo "Error".$e -> getMessage();
    die();
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
    <h2>タイトル</h2>
    <?php echo $title;?><br>

    <h2>本文</h2>
    <?php echo $content; ?>
    <form action="create_comment.php?post_id=<?php echo $id;?>" method="post">
        <input type="submit" value="この記事にコメントする">
    </form>

    <form action="main.php">
        <input type="submit" value="メインページへ戻る">
    </form>

    <?php while($row_comments = $stmt_comments ->fetch(PDO::FETCH_ASSOC)){ 
        echo '<hr>';
        echo $row_comments['name'];
        echo '<br/>';
        echo $row_comments['content'];



    }?>

</body>
</html>