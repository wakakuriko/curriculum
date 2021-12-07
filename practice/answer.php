<?php 
  //[question.php]から送られてきた名前の変数、選択した回答、問題の答えの変数を作成
  $my_name = $_POST['my_name']; //フォームに入力した名前
  $portnumber = $_POST['portnumber']; //選択した問題①の選択肢
  $language = $_POST['language']; //選択した問題②の選択肢
  $command = $_POST['command']; //選択した問題③の選択肢
  $a_portnumber = $_POST['a_portnumber']; //問題①の正解
  $a_language = $_POST['a_language']; //問題②の正解
  $a_command = $_POST['a_command']; //問題③の正解

  //選択した回答と正解が一致していれば「正解！」、一致していなければ「残念・・・」と出力される処理を組んだ関数を作成する
  if($portnumber == $a_portnumber){
    $result1 = "正解！";
  } else {
    $result1 = "残念・・・";
  }
  
  if($language == $a_language){
    $result2 = "正解！";
  } else {
    $result2 = "残念・・・";
  }
  
  if($command == $a_command){
    $result3 = "正解！";
  } else {
    $result3 = "残念・・・";
  }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>2章のチェックテスト課題</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<p><?php echo $my_name; ?>さんの結果は・・・</p>
    <p>①の答え</p>
    <!--作成した関数を呼び出して結果を表示-->
    <p><?php echo $result1; ?></p>

    <p>②の答え</p>
    <!--作成した関数を呼び出して結果を表示-->
    <p><?php echo $result2; ?></p>

    <p>③の答え</p>
    <!--作成した関数を呼び出して結果を表示-->
    <p><?php echo $result3; ?></p>
</body>
</html>