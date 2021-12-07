<?php
// 作成したdb_connect.phpを読み込む
require_once('db_connect.php');
// 変数を用意
$id = 1;
// 実行したいSQL文を準備（今回は指定したidの行を取得したい）
$sql = "DELETE FROM users WHERE id = :id";
// 関数db_connect()からPDOを取得する
$pdo = db_connect();
try {
    $stmt = $pdo->prepare($sql);
    // :idに$idをバインドする
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    echo '削除完了です';
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    die();
}