<?php
    require_once("connexion.php"); 
    require_once('session.php');


    $cinSt=isset($_POST['cinSt'])?$_POST['cinSt']:"";
    $nomS=isset($_POST['nomS'])?$_POST['nomS']:"";
    $teleS=isset($_POST['teleS'])?$_POST['teleS']:"";
    $dateD=isset($_POST['dateD'])?$_POST['dateD']:"";
    $dateF=isset($_POST['dateF'])?$_POST['dateF']:"";
    $NDE=isset($_POST['NDE'])?$_POST['NDE']:"";





    $requete="update stagiaire set Nom_Complet=?, Telephone=?, Date_DebutS=?, Date_FinS=?, NiveauDomaine_Etude=? where cin_Stagiaire=?";
    $datos=array($nomS, $teleS, $dateD,  $dateF, $NDE, $cinSt);
    $result=$pdo->prepare($requete);
    $result->execute($datos);

    header('location:stagiaire.php');
?>