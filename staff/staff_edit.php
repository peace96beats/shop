<?php
    require_once('../function.php');
    require_once('../config.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Staff Edit</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" />        
</head>
<body>
    <div class="container">
      <?php
      
      try {
          
          $staff_code = $_GET['staffcode'];
          
          $sql = 'SELECT name FROM mst_staff WHERE code=?';
          $stmt = $dbh->prepare($sql);
          $data[] =  $staff_code;
          $stmt->execute($data);
          
          $rec = $stmt->fetch(PDO::FETCH_ASSOC);
          $staff_name = $rec['name'];
          
          $dbh = null;

      } catch (Exception $e) {
          print 'damedawa-';
          exit();
      }
      
      ?>
      
      <h1>スタッフ修正</h1>
      <br/>
      スタッフコード<br/>
      <?php
      print $staff_code;
      ?>
      
      <form method="post" action="staff_edit_check.php">
          <input type="hidden" name="code" value="<?php print $staff_code;?>">
          スタッフ名
          <br/>
          <input type="text" name="name" value="<?php print $staff_name; ?>"><br/>
          パスワードを入力してください。<br/>
          <input type="password" name="pass"><br/>
          パスワードをもう一度入力してください。<br/>
          <input type="password" name="pass2"><br/>
          <br/>
          <input type="button" onclick="history.back()" value="戻る">
          <input type="submit" value="OK">
      </form>
  </div>
</body>
</html>