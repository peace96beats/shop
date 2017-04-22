<?php

session_start();
session_regenerate_id(true);
if(isset($_SESSION['login']) == false){
    print 'not login <br/>';
    print '<a href="../staff_login/staff_login.html">go to login page</a>';
    exit();
}

?>