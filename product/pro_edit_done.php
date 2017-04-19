<?php
    require_once('../function.php');
    require_once('../config.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Add Done</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" />
</head>
<body>
    <div class="container">
        <?php
            try{
                $pro_code = $_POST['code'];
                $pro_name = $_POST['name'];
                $pro_price = $_POST['price'];

                $pro_code = h($pro_code);                
                $pro_name = h($pro_name);
                $pro_price = h($pro_price);            

                $sql = 'UPDATE mst_product SET name=?, price=? WHERE code=?';
                $stmt = $dbh->prepare($sql);
                $data[] = $pro_name;
                $data[] = $pro_price;
                $data[] = $pro_code;                
                $stmt->execute($data);
                
                $dbh = null;
                
                print '修正しました<br/>';
                
            } catch(Exception $e){
                print 'ダメでした～';
                exit();
            }
        
        ?>
        
        <a href="pro_list.php">戻る</a>
    </div>
</body>
</html>