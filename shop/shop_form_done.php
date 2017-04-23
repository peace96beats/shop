<?php
        session_start();
        session_regenerate_id(true);
        require_once('../config.php');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>注文完了</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" />    
</head>
<body>
    <div class="container">
        <?php
        
       try{ 
            require_once('../common/common.php');
            
            $post= sanitize($_POST);
            
            $onamae=$post['onamae'];
            $email=$post['email'];
            $postal1=$post['postal1'];
            $postal2=$post['postal2'];
            $address=$post['address'];
            $tel=$post['tel'];
            
            print $onamae.'様<br/>';
            print 'Thank you!!!!! send Email. check this out!!!!!!<br/><br/>';
            print '商品は以下の住所に発送します。';
            print $postal1.'-'.$postal2.' '.$address.'<br/><br/>'.$tel.'<br/><br/>'.$email;
            
            $honbun = '';
            $honbun .= $onamae."様 \n\n このたびはありがとう。\n ご注文商品 \n------------------------\n";
            
            $cart = $_SESSION['cart'];
            $kazu = $_SESSION['kazu'];
            $max = count($cart);
            
            for($i=0; $i<$max; $i++){
                $sql = 'SELECT name,price FROM mst_product WHERE code=?';
                $stmt = $dbh->prepare($sql);
                $data[0]=$cart[$i];
                $stmt->execute($data);
                
                $rec = $stmt->fetch(PDO::FETCH_ASSOC);
                
                $name = $rec['name'];
                $price = $rec['price'];
                $suryo = $kazu[$i];
                $shokei = $price*$suryo;
                
                $honbun.=$name.'';
                $honbun.=$price.'円 x';
                $honbun.=$suryo.'個';
                $honbun.=$shokei."円 \n";

                
            }
                            
                $dbh = null;
                
                $honbun.="送料は無料です。\n";
                $honbun.="--------------------\n";
                $honbun.="\n";
                $honbun.="代金は以下の口座にお振込ください。\n";
                $honbun.="ろくまる銀行 やさい支店 普通口座 １２３４５６７\n";
                $honbun.="入金確認が取れ次第、梱包、発送させていただきます。\n";
                $honbun.="\n";
                $honbun.="□□□□□□□□□□□□□□\n";
                $honbun.="　～安心野菜のろくまる農園～\n";
                $honbun.="\n";
                $honbun.="○○県六丸郡六丸村123-4\n";
                $honbun.="電話 090-6060-xxxx\n";
                $honbun.="メール info@rokumarunouen.co.jp\n";
                $honbun.="□□□□□□□□□□□□□□\n";
                
                //print nl2br($honbun);

       }catch(Exception $e){
           print 'oh no.';
           exit();
       } 
        ?>
    </div>
</body>
</html>