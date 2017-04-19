<?php
    require_once('../function.php');
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
            $pro_code = $_POST['code'];        
            $pro_name = $_POST['name'];
            $pro_price = $_POST['price'];

            $pro_code = h($pro_code);
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
            
            if($pro_name=='' || preg_match('/^[0-9]+$/',$pro_price)==0){
                print '<form>';
                print '<input type="button" onclick="history.back() value="戻る">';
                print '</form>';
            }else{
                print '上記のように変更します。';
                print '<form method="post" action="pro_edit_done.php">';
                print '<input type="hidden" name="code" value="'.$pro_code.'">';                
                print '<input type="hidden" name="name" value="'.$pro_name.'">';
                print '<input type="hidden" name="price" value="'.$pro_price.'"><br/>';
                print '<input type="button" onclick="history.back()" value="戻る">';
                print '<input type="submit" value="OK">';
                print '</form>';
                
            }

    
        ?>
    </div>
</body>
</html>