<?php 

    session_start();
    if(!isset($_SESSION['responsable']))
    header('location:../login.php');


?>