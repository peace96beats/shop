<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Staff Add</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" />
</head>
<body>
    <div class="container">
        <form action="staff_add_check.php" method="post">
            <h2>スタッフ名を入力してください</h2>
            <input type="text" name="name">
            <h2>パスワードを入力してください</h2>
            <input type="password" name="pass">
            <h2>パスワードをもう一度入力してください</h2>
            <input type="password" name="pass2">
            <hr>
            <input type="button" onclick="history.back()" value="戻る">
            <input type="submit" value="OK">
        </form>
    </div>
</body>
</html>