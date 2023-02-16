<?php
session_start();

if(!isset($_SESSION['level_id'])){
    header('location:main.php');
}

?>