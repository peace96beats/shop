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
          
          $pro_code = $_GET['procode'];

            if(isset($_SESSION['cart'])==true){          
                      $cart = $_SESSION['cart'];
                      $kazu = $_SESSION['kazu'];
                      
            }
            
          $cart[] =$pro_code;
          $kazu[] = 1;
          $_SESSION['cart']= $cart;
          $_SESSION['kazu']= $kazu;
          

      } catch (Exception $e) {
          print 'damedawa-';
          exit();
      }
      
      ?>
      
      カートに追加しました。<br/>
      <br/>
      <a href="shop_list.php">商品一覧に戻る</a>
      
      
  </div>
</body>
</html>