<?php
$drinks = ["aquarius","cola","ayataka","irohas"];
$drinksPrice =["160","160","160","120"];
$images=["aquarius.jpg","cola.jpg","ayataka.jpg","irohas.jpg"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

        <form action="result.php" method="post">
<div class="container">
    <div class="header">
    <div class="title">
        <h2>2章自動販売機ロジック構築</h2>
        </div>
    </div>

    <div class="main">
        <div class="1danme"></div>
                <div class="wrapper">
                    <img src=" <?php echo $images[0]?> "><br>
                    <input type="radio" name="drinksPrice" value="<?php echo $drinksPrice[0] ?>" />
                <?php echo $drinksPrice[0].'円'; ?>
                </div>
       
                <div class="wrapper1">
                    <img src=" <?php echo $images[1]?> "><br>
                    <input type="radio" name="drinksPrice" value="<?php echo $drinksPrice[1] ?>" />
                    <?php echo $drinksPrice[1].'円'; ?>
                </div>

                <div class="wrapper2">
                    <img src=" <?php echo $images[2]?> "><br>
                    <input type="radio" name="drinksPrice" value="<?php echo $drinksPrice[2]; ?>" />
                    <?php echo $drinksPrice[2].'円'; ?>
                </div>
        
                <div class="wrapper3">
                    <img src=" <?php echo $images[3]?> "><br>
                    <input type="radio" name="drinksPrice" value="<?php echo $drinksPrice[3]; ?>" />
                    <?php echo $drinksPrice[3].'円'; ?>
                </div>
        
    </div>

    <div class="footer">
    
        <input type="text-box" name="price" placeholder ="お金をいれてください"><br>
        <input type="submit" value="購入する">
      
    </div>
</div>
        </form>
</body>
</html>