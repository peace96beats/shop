<?php
require_once('../session.php');
$staff_code = $_POST['staffcode'];

if(isset($_POST['disp'])==true){
    
    if(isset($_POST['staffcode'])==false){
        header('Location:staff_ng.php');
        exit();
    }

    header('Location: staff_disp.php?staffcode='.$staff_code);
    exit();
}

if(isset($_POST['add'])==true){

        header('Location:staff_add.php');
        exit();

}

if(isset($_POST['edit'])==true){
    
    if(isset($_POST['staffcode'])==false){
        header('Location:staff_ng.php');
        exit();
    }

    header('Location: staff_edit.php?staffcode='.$staff_code);
    exit();
}

if(isset($_POST['delete'])==true){

    if(isset($_POST['staffcode'])==false){
        header('Location:staff_ng.php');
        exit();
    }

    header('Location: staff_delete.php?staffcode='.$staff_code);
    exit();
}