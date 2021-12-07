<?php
//POST送信で送られてきた名前を受け取って変数を作成
$my_name = $_POST['my_name'];

//①画像を参考に問題文の選択肢の配列を作成してください。
$portnumber = ['80', '20', '21', '22'];
$language = ['PHP', 'Python', 'JAVA', 'HTML'];
$command = ['join', 'select', 'insert', 'update'];
    
//② ①で作成した、配列から正解の選択肢の変数を作成してください
$a_portnumber = $portnumber[0]; //80が正解
$a_language = $language[0]; //PHPが正解
$a_command = $command[1]; //selectが正解
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
        <!--index.phpで取得した名前を受け取る-->
        <p>お疲れ様です<?php echo $my_name; ?>さん</p>

        <!--フォームの作成 通信はPOST通信で-->
        <!--フォームの内容をPOST通信でanswer.phpに送信する-->
        <form action="answer.php" method="post">

            <h2>①HTTPプロトコルで使用されるポート番号は何番？</h2>
            <!--③ 問題のradioボタンを「foreach」を使って作成する-->
            <!--foreach:配列の中の値分、処理を繰り返し実行する。$valueは配列に入っている要素。-->
            <!--配列内の要素分のラジオボタンを作成する-->
            <?php foreach($portnumber as $value){ ?>
                <input type="radio" name="portnumber" value="<?php echo $value; ?>" /> <?php echo $value; ?>
                <?php } ?>

            <h2>②動的Webページを作成するための言語は？</h2>
            <!--③ 問題のradioボタンを「foreach」を使って作成する-->
            <?php foreach($language as $value){ ?>
                <input type="radio" name="language" value="<?php echo $value; ?>" /> <?php echo $value; ?>
                <?php } ?>

            <h2>③MySQLで情報を取得するためのコマンドは？</h2>
            <!--③ 問題のradioボタンを「foreach」を使って作成する-->
            <?php foreach($command as $value){ ?>
                <input type="radio" name="command" value="<?php echo $value; ?>" /> <?php echo $value; ?>
                <?php } ?>
        
            <!--問題の正解の変数と名前の変数を[answer.php]に送る-->
            <p></p>
            <!--hiddenを使う事でフォームには入力させずに値を送信する事が可能-->
            <input type="hidden" name="my_name" value="<?php echo $my_name ?>">
            <input type="hidden" name="a_portnumber" value="<?php echo $a_portnumber ?>">
            <input type="hidden" name="a_language" value="<?php echo $a_language ?>">
            <input type="hidden" name="a_command" value="<?php echo $a_command ?>">
            <!--submit：ボタンを表示させる-->
            <input type="submit" value="回答する" />
        </form>
    </body>
</html>

