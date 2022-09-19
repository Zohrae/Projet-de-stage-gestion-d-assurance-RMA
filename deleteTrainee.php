<?php
    session_start();
    if(isset($_SESSION['responsable'])){
    require_once("connexion.php"); 


    $cinSt=isset($_GET['cinSt'])?$_GET['cinSt']:0;

    $requetedemande="select count(*) countDemande from demande where cin_Stagiaire='$cinSt'";
    $resultdemande=$pdo->query($requetedemande);
    $tableCountingdemande=$resultdemande->fetch();
    $nbrdemande=$tableCountingdemande['countDemande'];


    if($nbrdemande == 0){
        $requete="delete from stagiaire where cin_Stagiaire=?";
        $datos=array($cinSt);
        $result=$pdo->prepare($requete);
        $result->execute($datos);
        header('location:stagiaire.php');
    }else{
        $msg="ACTION INCORRECTE: Vous devez d'abord supprimer toutes les demandes de ce stagiaire.";
        header("location:errorTrainee.php?message=$msg");   
    }
    }else{
        header('location:../login.php');
    }
    
?>