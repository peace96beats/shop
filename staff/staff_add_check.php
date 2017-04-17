<?php
    require_once('../function.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Staff Add Check</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" />
</head>
<body>
    <div class="container">
        <?php
            $staff_name = $_POST['name'];
            $staff_pass = $_POST['pass'];
            $staff_pass2 = $_POST['pass2'];
            
            $staff_name = h($staff_name);
            $staff_pass = h($staff_pass);
            $staff_pass2 = h($staff_pass2);
            
            if($staff_name == ''){
                print 'スタッフ名が入力されていません。<br/>';
            } else {
                print 'スタッフ名:'.$staff_name.'<br/>';
            }

            if($staff_pass == ''){
                print 'パスワードが入力されていません。<br/>';
            }

            if($staff_pass != $staff_pass2){
                print 'パスワードが一致しません<br/>';
            }
            
            if($staff_name == '' ||$staff_pass == ''||$staff_pass != $staff_pass2){
                print '<form><input type="button" onclick="history.back()" value="戻る">';
            } else {
                $staff_pass = md5($staff_pass);
                print '<form method="post" action="staff_add_done.php">';
                print '<input type="hidden" name="name" value="'.$staff_name.'">';
                print '<input type="hidden" name="pass" value="'.$staff_pass.'"><br/>';
                print '<input type="button" onclick="history.back()" value="戻る">';
                print '<input type="submit" value="OK">';
                print '</form>';
            }

    
        ?>
    </div>
</body>
</html>