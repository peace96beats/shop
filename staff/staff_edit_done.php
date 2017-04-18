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
        <h1>Staff Edit Done</h1>
        <?php
            try{
                $staff_code = $_POST['code'];                
                $staff_name = $_POST['name'];
                $staff_pass = $_POST['pass'];
                
                $staff_name = h($staff_name);
                $staff_pass = h($staff_pass);            

                $sql = 'UPDATE mst_staff SET name=?,password=? WHERE code=?';
                $stmt = $dbh->prepare($sql);
                $data[] = $staff_name;
                $data[] = $staff_pass;
                $data[] = $staff_code;
                $stmt->execute($data);
                
                $dbh = null;

            } catch(Exception $e){
                print 'ダメでした～';
                exit();
            }
        
        ?>
       
       <p>修正しました</p>
       
        <a href="staff_list.php">戻る</a>
    </div>
</body>
</html>