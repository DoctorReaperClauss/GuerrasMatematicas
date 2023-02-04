<?php
session_start();

if(isset($_SESSION['user'])){
    echo 'hay un usuario';
}
else{
    header('location:../index.php');
}
?>