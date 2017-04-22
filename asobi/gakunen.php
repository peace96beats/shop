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
        
        $gakunen = $_POST['gakunen'];

        switch ($gakunen){
            case '1':
                print 'あなたの校舎は南校舎です';
                break;
            case '2':
                print 'あなたの校舎は西校舎です';
                break;
            case '3':
                print 'あなたの校舎は東校舎です';
                break;
            default:
                print 'あなたの校舎は3年生と同じです';
        }

        ?>
    </div>
</body>
</html>