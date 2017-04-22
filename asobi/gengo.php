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
        
            require_once('../common/common.php');
        
            $seireki = $_POST['seireki'];
            
            $wareki = gengo($seireki);
            print $wareki;

        ?>
    </div>
</body>
</html>