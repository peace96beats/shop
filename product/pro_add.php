<?php
require_once('../session.php');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Add</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" />
</head>
<body>
    <div class="container">
        <h1>商品追加</h1>
        <form action="pro_add_check.php" method="post" enctype="multipart/form-data">
            <h2>商品名を入力してください</h2>
            <input type="text" name="name">
            <h2>価格を入力してください</h2>
            <input type="text" name="price"><br/>
            画像を選んでください<br/>
            <input type="file" name="gazou">
            <hr>
            <input type="button" onclick="history.back()" value="戻る">
            <input type="submit" value="OK">
        </form>
    </div>
</body>
</html>