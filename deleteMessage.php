<?php
    session_start();
    if(isset($_SESSION['responsable'])){
    require_once("connexion.php"); 

    $idM=isset($_GET['idM'])?$_GET['idM']:"";

    $requete="delete from message where ID_message=?";
    $datos=array($idM);
    $result=$pdo->prepare($requete);
    $result->execute($datos);
    header('location:message.php');
    }else{
        header('location:../login.php');
    }

?>