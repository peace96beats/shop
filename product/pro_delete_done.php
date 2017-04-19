<?php
    require_once('../function.php');
    require_once('../config.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>pro Delete Done</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" />
</head>
<body>
    <div class="container">
        <h1>pro Delte Done</h1>
        <?php
            try{
                $pro_code = $_POST['code'];                


                $sql = 'DELETE FROM mst_product WHERE code=?';
                $stmt = $dbh->prepare($sql);
                $data[] = $pro_code;
                $stmt->execute($data);
                
                $dbh = null;

            } catch(Exception $e){
                print 'ダメでした～';
                exit();
            }
        
        ?>
       
       <p>削除しました</p>
       
        <a href="pro_list.php">戻る</a>
    </div>
</body>
</html>