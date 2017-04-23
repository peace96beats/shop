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
          
          
          if(isset($_SESSION['cart'])==true){
          $cart = $_SESSION['cart'];
          $kazu = $_SESSION['kazu'];
          $max = count($cart);
              
          }else{
              $max = 0;
          }
          
          if($max==0){
              print 'カートに商品が入っていません。<br/>';
              print '<br/>';
              print '<a href="shop_list.php">商品一覧に戻る</a>';
              exit();
          }
          
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
                  $pro_gazou[] = '<img width="150px" src="../product/gazou/'.$rec['gazou'].'">';
              }
          }
          
          $dbh = null;        
          

          } catch (Exception $e) {
              print 'damedawa-';
              exit();
          }
      
      ?>
      
<h3>カートの中身</h3>

<table class="table">
    <tr>
        <td>商品</td>
        <td>商品画像</td>
        <td>価格</td>
        <td>数量</td>
        <td>小計</td>
        <td>削除</td>
    </tr>


<form method="post" action="kazu_change.php">
<tr>
<?php for($i=0;$i<$max;$i++){ ?>
<td><?php print $pro_name[$i]; ?></td>
<td><?php print $pro_gazou[$i]; ?></td>
<td><?php print $pro_price[$i].'円'; ?></td>
<td><input type="text" name="kazu<?php print $i; ?>" value="<?php print $kazu[$i];?>"></td>
<td><?php print $pro_price[$i] * $kazu[$i]; ?>円</td>
<td><input type="checkbox" name="sakujo<?php print $i; ?>"></td>
<br/>
</tr>
<?php
}
?>
</table>
<input type="hidden" name="max" value="<?php print $max; ?>">
<input type="submit" value="数量変更" calss="btn btn-primary"><br/>

          <input type="button" onclick="history.back()" value="戻る" calss="btn btn-primary">

      </form>
      
      <br>
      <a href="shop_form.html">ご購入手続きへ進む</a>
      
  </div>
  
</body>
</html>