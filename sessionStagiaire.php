<?php 

    session_start();
    if(!isset($_SESSION['comptestagiaire']))
    header('location:../loginStagiaire.php');


?>