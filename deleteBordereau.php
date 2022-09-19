<?php
    session_start();
    if(isset($_SESSION['responsable'])){
    require_once("connexion.php"); 

    $numB=isset($_GET['numB'])?$_GET['numB']:"";

    $requete="delete from bordereau where Num_bordereau=?";
    $datos=array($numB);
    $result=$pdo->prepare($requete);
    $result->execute($datos);
    header('location:bordereau.php');
    }else{
            header('location:../login.php');
    }
?>