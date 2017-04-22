<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" />    
</head>
<body>
    <div class="container">
        <?php
        
        $mbango = $_POST['mbango'];
        
        $hoshi['M1'] = 'カニ製粉';
        $hoshi['M31'] = 'アンドロメダ製粉';
        $hoshi['M42'] = 'オリオン製粉';
        $hoshi['M45'] = 'すばる製粉';
        $hoshi['M57'] = 'ドーナッツ製粉';
        
        foreach($hoshi as $key => $val){
            print $key. 'は' .$val;
            print '<br/>';
        }
        
        
        
        print 'あなたが選んだ星は';
        print $hoshi[$mbango];
        
        ?>
    </div>
</body>
</html>