<?php
    session_start();
    if(isset($_SESSION['responsable'])){
    require_once("connexion.php"); 

    $idA=isset($_GET['idA'])?$_GET['idA']:0;

    $requete="delete from responsable where Id_Responsable=?";
    $datos=array($idA);
    $result=$pdo->prepare($requete);
    $result->execute($datos);
    header('location:responsable.php');
    }else{
        header('location:../login.php');
    }

?>