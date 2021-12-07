<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>2章のチェックテスト課題</title>

  <!--CSSファイルの読み込み-->
  <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>2章チェックテスト</h1>
    
    <!--名前を入力してquestion.phpに移動するフォームを作成-->
    <!--GETメソッドは値をURLの後ろにつけて送信する（?以降）POSTメソッドは目に見えないところで値を送信する-->
    <!--POSTメソッドの方が送信できる値の量が多い。POSTメソッドは値が履歴として残らないため安全-->
    <form action="question.php" method="post">

    <!--placeholder：入力欄の中に文字を入力する-->
    <!--name属性は要素の名前を指定するもの-->
    <input type="text" name="my_name" placeholder="名前を入力してください" />
    <!--submit：ページ上にボタンを表示させる-->
    <input type="submit" value="テスト開始" />
    </form>
</body>
</html>