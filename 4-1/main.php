<?php
require_once('function.php');

//sessionが保存されていない場合はログインページへリダイレクト
check_user_login();

require_once('db_connect.php');

$pdo = db_connect();
try{
    $sql ="SELECT * FROM posts ORDER BY id ASC";
    $stmt = $pdo->prepare($sql);
    $stmt -> execute();

}catch(PDOException $e){
    echo "Error".$e->getMessage();
    die();
}

if(!empty($_POST['create_post'])){
    header('Location:create_post.php');
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
    <h2>メインページ</h2>
    <p>ようこそ<?php echo $_SESSION["user_name"];?>さん</p>
    <br><a href="login.php">ログアウト</a>

    <section name ="articles">
        <table>
            <tr>
                <th>ID</th>
                <th>タイトル</th>
                <th>本文</th>
                <th>投稿日</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>

            <?php while($row =$stmt->fetch(PDO::FETCH_ASSOC)){ ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['content']; ?></td>
                    <td><?php echo $row['time']; ?></td>
                    <td><a href="edit_post.php?id=<?php echo $row['id'];?>">編集</a></td>
                    <td><a href="delete_post.php?id=<?php echo $row['id'];?>">削除</a></td>
                    <td><a href="detail_post.php?id=<?php echo $row['id'];?>">詳細</a></td>
                </tr>
            <?php } ?>
        </table>
    </section>

    <form action="" method="post">
        <input type="submit" name="create_post" value="新規作成">
    </form>


</body>
</html>
