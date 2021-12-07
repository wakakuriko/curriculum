<?php
require_once('db_connect.php');
session_start();

$id = $_GET['id'];
$pdo = db_connect();

try{
    $sql = "DELETE FROM books where ID = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);;
    $stmt ->execute();

    header("Location:main.php");
}catch(PDOException $e){
    echo "error",$e ->getMessage();
    die();
}

?>