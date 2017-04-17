<?php
    require_once('../function.php');
    require_once('../config.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Staff Add Done</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" />
</head>
<body>
    <div class="container">
        <?php
            try{
                $staff_name = $_POST['name'];
                $staff_pass = $_POST['pass'];
                
                $staff_name = h($staff_name);
                $staff_pass = h($staff_pass);            

                $sql = 'INSERT INTO mst_staff(name,password) VALUES(?,?)';
                $stmt = $dbh->prepare($sql);
                $data[] = $staff_name;
                $data[] = $staff_pass;
                $stmt->execute($data);
                
                $dbh = null;
                
                print $staff_name.'さんを追加しました<br/>';
                
            } catch(Exception $e){
                print 'ダメでした～';
                exit();
            }
        
        ?>
        
        <a href="staff_list.php">戻る</a>
    </div>
</body>
</html>