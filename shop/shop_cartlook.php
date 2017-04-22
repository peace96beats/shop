<?php
    require_once('../function.php');
    require_once('../config.php');
    
    session_start();
    session_regenerate_id(true);
    if(isset($_SESSION['member_login'])==false)
    {
        print 'ようこそゲスト様';
        print '<a href="member_login.html">会員ログイン</a><br/>';
        print '<br/>';
    }else{
        print 'ようこそ';
        print $_SESSION['member_name'];
        print '様';
        print '<a href="member_logout.php">ログアウト</a><br/>';
        print '<br/>';
    }

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>shop Display</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" />        
</head>
<body>
    <div class="container">
      <?php
      
      try {
          
          $cart = $_SESSION['cart'];
          $kazu = $_SESSION['kazu'];
          $max = count($cart);
          
          foreach($cart as $key => $val){
              
              $sql = 'SELECT code,name,price,gazou FROM mst_product WHERE code = ?';
              $stmt = $dbh->prepare($sql);
              $data[0]=$val;
              $stmt->execute($data);
              
              $rec = $stmt->fetch(PDO::FETCH_ASSOC);
              
              $pro_name[] = $rec['name'];
              $pro_price[] = $rec['price'];
              if($rec['gazou']==""){
                  $pro_gazou[]='';
              }else{
                  $pro_gazou[] = '<img src="../product/gazou/'.$rec['gazou'].'">';
              }
          }
          
          $dbh = null;        
          

          } catch (Exception $e) {
              print 'damedawa-';
              exit();
          }
      
      ?>
      
<h3>カートの中身</h3>

<?php
          for($i=0;$i<$max;$i++){
              print $pro_name[$i];
              print $pro_gazou[$i];
              print $pro_price[$i].'円';
              print $kazu[$i];
              print '<br/>';
          }
?>
      
      
      
<form>
          <input type="button" onclick="history.back()" value="戻る">

      </form>
  </div>
</body>
</html>