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
            $tsuki = $_POST['tsuki'];
            
            $yasai[] = '';
            $yasai[] = 'ブロッコリー';
            $yasai[] = 'カリフラワー';
            $yasai[] = 'レタス';
            $yasai[] = 'みつば';
            $yasai[] = 'asparagus';
            $yasai[] = 'セロリ';
            $yasai[] = '明日';
            $yasai[] = 'ピーマン';
            
            $yasai[] = 'オクラ';
            $yasai[] = 'さつまいも';
            $yasai[] = '大根';
            $yasai[] = 'ホウレンソウ';
            
            print $tsuki;
            print '月は';
            print $yasai[$tsuki];
            print 'が旬です'
        ?>
    </div>
</body>
</html>