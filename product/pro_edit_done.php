<?php
    require_once('../function.php');
    require_once('../config.php');
    require_once('../session.php');
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
                $pro_gazou_name_old=$_POST['gazou_name_old'];
                $pro_gazou_name=$_POST['gazou_name'];

                $pro_code = h($pro_code);                
                $pro_name = h($pro_name);
                $pro_price = h($pro_price);            

                $sql = 'UPDATE mst_product SET name=?, price=?,gazou=? WHERE code=?';
                $stmt = $dbh->prepare($sql);
                $data[] = $pro_name;
                $data[] = $pro_price;
                $data[] = $pro_gazou_name;                                                
                $data[] = $pro_code;                

                $stmt->execute($data);
                
                $dbh = null;

                
if($pro_gazou_name_old != $pro_gazou_name){
    
    if($pro_gazou_name_old!=''){
        unlink('./gazou/'.$pro_gazou_name_old);        
    }

}                
                
                
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