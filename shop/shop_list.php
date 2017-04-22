<?php
    require_once('../function.php');
    require_once('../config.php');
    
    session_start();
    session_regenerate_id(true);
    if(isset($_SESSION['member_login']) == false){
        print 'ようこそゲスト様';
        print '<a href="member_login.html">会員ログイン</a><br/>';
        print '<br/>';
    }else{
        print 'ようこそ'.$_SESSION['member_name'].'様'.'<a href="member_logout.php">ログアウト</a><br/>';
        print '<br/>';
    }
    

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>staff_list</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" />    
</head>
<body>
    <div class="container">
        <?php      
            try{
                
                $sql = 'SELECT code,name,price FROM mst_product WHERE 1';
                $stmt = $dbh->prepare($sql);
                $stmt->execute();
                
                $dbh = null;
                
                print '<h1>商品一覧</h1><br/>';
                
                while(true)
                {
                    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
                    if($rec==false){
                        break;
                    }

                    print '<a href="shop_product.php?procode='.$rec['code'].'">';
                    print $rec['name'].'---';
                    print $rec['price'].'円';
                    print '</a>';
                    print '<br/>';
                }

            }
            catch(Exception $e){
                print 'ダメでした～';
                exit();
            }

                    print '<br/>';
                    print '<a href="shop_cartlook.php">カートを見る</a><br/>';

        ?>
        
    </div>
</body>
</html>