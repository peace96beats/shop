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
                $pro_name = $_POST['name'];
                $pro_price = $_POST['price'];
                $pro_gazou_name = $_POST['gazou_name'];
                
                $pro_name = h($pro_name);
                $pro_price = h($pro_price);            

                $sql = 'INSERT INTO mst_product(name,price,gazou) VALUES(?,?,?)';
                $stmt = $dbh->prepare($sql);
                $data[] = $pro_name;
                $data[] = $pro_price;
                $data[] = $pro_gazou_name;
                $stmt->execute($data);
                
                $dbh = null;
                
                print $pro_name.'を追加しました<br/>';
                
            } catch(Exception $e){
                print 'ダメでした～';
                exit();
            }
        
        ?>
        
        <a href="pro_list.php">戻る</a>
    </div>
</body>
</html>