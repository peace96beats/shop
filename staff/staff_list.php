<?php
    require_once('../function.php');
    require_once('../config.php');
    require_once('../session.php');    
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
                
                print '<h1>スタッフ一覧</h1><br/>';
                
                print '<form method="post" action="staff_branch.php">';
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
       
       <p>
           <a href="../staff_login/staff_top.php">トップメニューへ</a>
       </p> 
    </div>
</body>
</html>