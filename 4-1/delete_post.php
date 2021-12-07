<?php


require_once('function.php');
check_user_login();

require_once('db_connect.php');

$id = $_GET['id'];
if(empty($id)){
    hedaer('Location:main.php');
}

$pdo = db_connect();
try{
    $sql ="DELETE FROM posts where id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt -> bindParam(':id',$id);
    $stmt -> execute();

}catch(PDOException $e){
    echo "Error".$e->getMessage();
    die();
}
header('Location:main.php');

?>