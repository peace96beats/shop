<?php
    require_once('../function.php');
    require_once('../config.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>pro Display</title>
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
          $pro_gazou_name = $rec['gazou'];
          
          $dbh = null;
          
          if($pro_gazou_name == ''){
              $disp_gazou='';
          }else{
              $disp_gazou='<img src="./gazou/'.$pro_gazou_name.'">';
          }

      } catch (Exception $e) {
          print 'damedawa-';
          exit();
      }
      
      ?>
      
      <h1>商品情報参照</h1>
      <br/>
      商品コード<br/>
      <?php
      print $pro_code;
      ?><br/>
      商品名<br/>
      <?php
      print $pro_name;
      ?><br/>
      価格<br/>
      <?php
      print $pro_price;
      ?><br/>
      <?php print $disp_gazou; ?>
      
<form>
          <input type="button" onclick="history.back()" value="戻る">

      </form>
  </div>
</body>
</html>