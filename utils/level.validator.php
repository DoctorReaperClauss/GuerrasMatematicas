<?php
session_start();

if(!isset($_SESSION['level'])){
    header('location:./main.php');
}

?>