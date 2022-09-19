<?php
    require_once("connexion.php");
    require_once('session.php');
 
    $cinSt=isset($_POST['cinSt'])?$_POST['cinSt']:"";
    $nomS=isset($_POST['nomS'])?$_POST['nomS']:"";
    $teleS=isset($_POST['teleS'])?$_POST['teleS']:"";
    $dateD=isset($_POST['dateD'])?$_POST['dateD']:"";
    $dateF=isset($_POST['dateF'])?$_POST['dateF']:"";
    $NDE=isset($_POST['NDE'])?$_POST['NDE']:"";



    $requete="insert into stagiaire values(?,?,?,?,?,?)";
    $datos=array($cinSt, $nomS, $teleS, $dateD, $dateF, $NDE);
    $result=$pdo->prepare($requete);
    $result->execute($datos);

    header('location:stagiaire.php');
?>