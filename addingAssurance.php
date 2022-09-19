<?php
    require_once("connexion.php"); 
    require_once('session.php');


    $policeA=isset($_POST['policeA'])?$_POST['policeA']:"";
    $cinA=isset($_POST['cinA'])?$_POST['cinA']:"";
    $nomA=isset($_POST['nomA'])?$_POST['nomA']:"";
    $tarifA=isset($_POST['tarifA'])?$_POST['tarifA']:"";
    $Etat=isset($_POST['Etat'])?$_POST['Etat']:"";
    $dateD=isset($_POST['dateD'])?$_POST['dateD']:"";
    $dateF=isset($_POST['dateF'])?$_POST['dateF']:"";


    $requete="insert into assurance values(?,?,?,?,?,?,?)";
    $datos=array($policeA, $cinA, $nomA,  $tarifA, $Etat, $dateD, $dateF);
    $result=$pdo->prepare($requete);
    $result->execute($datos);

    header('location:assurance.php');
?>