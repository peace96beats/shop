<?php

    
    

    require_once('../function.php');
    require_once('../config.php');
    
    try{
        $staff_code = $_POST['code'];
        $staff_pass = $_POST['pass'];
        
        $staff_code = h($staff_code);
        $staff_pass = h($staff_pass);
        
        $staff_pass = md5($staff_pass);
        
        $sql = 'SELECT name FROM mst_staff WHERE code=? AND password=?';
        $stmt = $dbh->prepare($sql);
        $data[] = $staff_code;
        $data[] = $staff_pass;
        $stmt->execute($data);
        
        $dbh = null;
        
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if($rec == false){
            print 'スタッフコードかパスワードが間違っています';
            print '<a href="staff_login.thml">戻る</a>';
        }else{
            
            session_start();
            $_SESSION['login'] = 1;
            $_SESSION['staff_code'] = $staff_code;
            $_SESSION['staff_name'] = $rec['name'];
            
            header('Location:staff_top.php');
            exit();
        }
    }catch(Exception $e){
        print 'だめだわ～';
        exit();
    }
    
    
?>