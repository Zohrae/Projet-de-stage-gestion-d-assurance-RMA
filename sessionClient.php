<?php 

    session_start();
    if(!isset($_SESSION['compteclient']))
    header('location:../loginClient.php');


?>