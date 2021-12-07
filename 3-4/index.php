<?php

require_once('getData.php');

$get = new getData();
$shuturyoku = $get ->getUserData();

$output = $get->getPostData();

$category_no = ["その他","食事","旅行","その他",];

?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class =header>
        <div class= header-left>
            <img src="image.png" alt="">
        </div>
        <div class= header-right>
            <div class = name>ようこそ<?php echo $shuturyoku['last_name'].$shuturyoku['first_name']; ?>さん <br></div>
            <div class = login>最終ログイン日<?php echo $shuturyoku['last_login']; ?>
</div>
            
    
        </div>
    </div>

    <div class ="main">
        <table>
            <tr>
                <th>記事ID</th>
                <th>タイトル</th>
                <th>カテゴリ</th>
                <th>本文</th>
                <th>投稿日</th>
                
            </tr>
            
            
                
             <?php  foreach($output as $raw){
                echo 
                    '<tr>
                        <td>'.$raw['id'].'</td>'
                        .'<td>'.$raw['title'].'</td>'
                        .'<td>'.$category_no[$raw['category_no']].'</td>'
                        .'<td>'.$raw['comment'].'</td>'
                        .'<td>'.$raw['created'].'</td>
                    </tr>'; 
            }?> <br>
                
               
            
         
        </table>
        
        
        
        
        
    </div>
</body>
<footer>
    Y&I group inc.
</footer>

</html>