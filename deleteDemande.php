<?php
    session_start();
    if(isset($_SESSION['responsable'])){
    require_once("connexion.php"); 

    $idD=isset($_GET['idD'])?$_GET['idD']:"";

    $requete="delete from demande where Id_Demande=?";
    $datos=array($idD);
    $result=$pdo->prepare($requete);
    $result->execute($datos);
    header('location:demande.php');
    }else{
        header('location:../login.php');
    }

?>