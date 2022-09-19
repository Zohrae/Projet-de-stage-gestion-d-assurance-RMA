<?php
    session_start();
    if(isset($_SESSION['responsable'])){
    require_once("connexion.php"); 
    require_once('session.php');

    $numR=isset($_GET['numR'])?$_GET['numR']:"";

    $requete="delete from reclamation where Num_reclamation=?";
    $datos=array($numR);
    $result=$pdo->prepare($requete);
    $result->execute($datos);
    header('location:reclamation.php');
    }else{
        header('location:../login.php');
    }

?>