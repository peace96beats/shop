<?php
    require_once('../function.php');
    require_once('../session.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Add Check</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" />
</head>
<body>
    <div class="container">
        <?php
            $pro_name = $_POST['name'];
            $pro_price = $_POST['price'];
            $pro_gazou = $_FILES['gazou'];

            $pro_name = h($pro_name);
            $pro_price = h($pro_price);

            if($pro_name == ''){
                print '商品名が入力されていません。<br/>';
            } else {
                print '商品名:'.$pro_name.'<br/>';
            }
            
            if(preg_match('/^[0-9]+$/',$pro_price)==0) { 
                print '価格をきちんと入力してください。';
            }else{
                print '価格:'.$pro_price.'円';
            }
            
            if($pro_gazou['size'] > 0){
                if($pro_gazou['size'] > 10000000){
                    print 'too large!!!!!';
                }else{
                    move_uploaded_file($pro_gazou['tmp_name'],'./gazou/'.$pro_gazou['name']);
                    print '<img src="./gazou/'.$pro_gazou['name'].'">';
                    print '<br/>';
                }
            }
            
            
            
            if($pro_name=='' || preg_match('/^[0-9]+$/',$pro_price)==0 || $pro_gazou['size'] > 10000000){
                print '<form>';
                print '<input type="button" onclick="history.back() value="戻る">';
                print '</form>';
            }else{
                print '上記の商品を追加します。';
                print '<form method="post" action="pro_add_done.php">';
                print '<input type="hidden" name="name" value="'.$pro_name.'">';
                print '<input type="hidden" name="price" value="'.$pro_price.'"><br/>';
                print '<input type="hidden" name="gazou_name" value="'.$pro_gazou['name'].'"><br/>';
                print '<input type="button" onclick="history.back()" value="戻る">';
                print '<input type="submit" value="OK">';
                print '</form>';
                
            }

    
        ?>
    </div>
</body>
</html>