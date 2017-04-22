<?php
    require_once('../function.php');
    require_once('../config.php');
    require_once('../session.php');
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
          
          $sql = 'SELECT name,gazou FROM mst_product WHERE code=?';
          $stmt = $dbh->prepare($sql);
          $data[] =  $pro_code;
          $stmt->execute($data);
          
          $rec = $stmt->fetch(PDO::FETCH_ASSOC);
          $pro_name = $rec['name'];
          $pro_gazou_name = $rec['gazou'];
          
          $dbh = null;
          
          if($pro_gazou_name==''){
            $disp_gazou='';
          }else{
            $disp_gazou='<img src="./gazou/'.$pro_gazou_name.'">';
          }

      } catch (Exception $e) {
          print 'damedawa-';
          exit();
      }
      
      ?>
      
      <h1>商品削除</h1>
      <br/>
      商品コード<br/>
      <?php print $pro_code; ?><br/>
      商品名<br/>
      <?php print $pro_name; ?><br/>
      <?php print $disp_gazou; ?><br/>
      <p>この商品を削除してもよいのか？</p>

        <form method="post" action="pro_delete_done.php">
        
          <input type="hidden" name="code" value="<?php print $pro_code ?>">    
          <input type="hidden" name="gazou_name" value="<?php print $pro_gazou_name;?>"/>

          <input type="button" onclick="history.back()" value="戻る">
          <input type="submit" value="OK">
      </form>
  </div>
</body>
</html>