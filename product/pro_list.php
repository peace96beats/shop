<?php
    require_once('../function.php');
    require_once('../config.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>staff_list</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" />    
</head>
<body>
    <div class="container">
        <?php      
            try{
                
                $sql = 'SELECT code,name,price FROM mst_product WHERE 1';
                $stmt = $dbh->prepare($sql);
                $stmt->execute();
                
                $dbh = null;
                
                print '<h1>商品一覧</h1><br/>';
                
                print '<form method="post" action="pro_branch.php">';
                while(true)
                {
                    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
                    if($rec==false){
                        break;
                    }
                    print '<label><input type="radio" name="procode" value="'.$rec['code'].'">';
                    print $rec['name'].'---</label><br/>';
                    print $rec['price'].'円</label><br/>';
                    print '<br/>';
                }

                print '<input type="submit" name="disp" value="参照">';                
                print '<input type="submit" name="add" value="追加">';
                print '<input type="submit" name="edit" value="修正">';
                print '<input type="submit" name="delete" value="削除"></form>';                
                
                
            }
            catch(Exception $e){
                print 'ダメでした～';
                exit();
            }

        ?>
        
    </div>
</body>
</html>