<?php
session_start();
// unset($_SESSION['username']);
// echo 'ok';die;
if (empty($_SESSION['username'])) {
    header('location: ../authadmin/');
}else{
    if ($_SESSION['level'] == 'admin') {
        header('location: ./dashboard.php');
    }else{
        header('location: ../home/index.php');
    }
}
?>