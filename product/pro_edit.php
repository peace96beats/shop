<?php
    require_once('../function.php');
    require_once('../config.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>pro Edit</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" />        
</head>
<body>
    <div class="container">
      <?php
      
      try {
          
          $pro_code = $_GET['procode'];
          
          $sql = 'SELECT name,price,gazou FROM mst_product WHERE code=?';
          $stmt = $dbh->prepare($sql);
          $data[] =  $pro_code;
          $stmt->execute($data);
          
          $rec = $stmt->fetch(PDO::FETCH_ASSOC);
          $pro_name = $rec['name'];
          $pro_price = $rec['price'];
          $pro_gazou_name_old = $rec['gazou'];
          
          $dbh = null;
          
          if($pro_gazou_name_old == ''){
              $disp_gazou = '';
          }else{
              $disp_gzou = '<img src="./gazou/'.$pro_gazou_name_old.'">';
          }

      } catch (Exception $e) {
          print 'damedawa-';
          exit();
      }
      
      ?>
      
      <h1>商品修正</h1>
      <br/>
      商品コード<br/>
      <?php
      print $pro_code;
      ?>
      
      <form method="post" action="pro_edit_check.php" enctype="multipart/form-data">
          <input type="hidden" name="code" value="<?php print $pro_code;?>">
          <input type="hidden" name="gazou_name_old" value="<?php print $pro_gazou_name_old; ?>">
          商品名
          <br/>
          <input type="text" name="name" value="<?php print $pro_name; ?>"><br/>
          価格<br/>
          <input type="text" name="price" value="<?php print $pro_price; ?>"><br/>
          <br/>
          <?php print $disp_gazou; ?>
          <br/>
          画像を選んでください。<br/>
          <input type="file" name="gazou" ><br/><br/>
          <input type="button" onclick="history.back()" value="戻る">
          <input type="submit" value="OK">
      </form>
  </div>
</body>
</html>