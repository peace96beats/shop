<?php

$dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
$user = 'atsushisss';
$password = '';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

?>