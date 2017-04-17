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
                
                $sql = 'SELECT code,name FROM mst_staff WHERE 1';
                $stmt = $dbh->prepare($sql);
                $stmt->execute();
                
                $dbh = null;
                
                print 'スタッフ一覧<br/><br/>';
                
                print '<form method="post" action="staff_edit.php">';
                while(true)
                {
                    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
                    if($rec==false){
                        break;
                    }
                    print '<label><input type="radio" name="staffcode" value="'.$rec['code'].'">';
                    print $rec['name'].'</label>';
                    print '<br/>';
                }
                
                print '<input type="submit" value="修正"></form>';
                
                
                
            }
            catch(Exception $e){
                print 'ダメでした～';
                exit();
            }

        ?>
        
    </div>
</body>
</html>