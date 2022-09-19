<?php
    require_once("connexion.php"); 
    require_once('session.php');


    $cinSt=isset($_POST['cinSt'])?$_POST['cinSt']:"";
    $nomS=isset($_POST['nomS'])?$_POST['nomS']:"";
    $dateD=isset($_POST['dateD'])?$_POST['dateD']:"";
    $desc=isset($_POST['desc'])?$_POST['desc']:"";



    $requete="insert into demande(cin_Stagiaire, Nom_Stagiare, Date_Demande, Description_Demande) values(?,?,?,?)";
    $datos=array($cinSt, $nomS, $dateD, $desc);
    $result=$pdo->prepare($requete);
    $result->execute($datos);

    header('location:demande.php');
?>