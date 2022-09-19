<?php
    session_start();
    if(isset($_SESSION['responsable'])){
    require_once("connexion.php"); 

    $numC=isset($_GET['numC'])?$_GET['numC']:"";

    $requete="delete from cheque where Num_cheque=?";
    $datos=array($numC);
    $result=$pdo->prepare($requete);
    $result->execute($datos);
    header('location:cheque1.php');
    }else{
        header('location:../login.php');
    }

?>