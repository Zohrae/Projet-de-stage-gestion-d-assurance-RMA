<?php
    require_once("connexion.php"); 
    require_once('session.php');


    $idD=isset($_POST['idD'])?$_POST['idD']:0;
    $cinSt=isset($_POST['cinSt'])?$_POST['cinSt']:"";
    $nomD=isset($_POST['nomD'])?$_POST['nomD']:"";
    $dateD=isset($_POST['dateD'])?$_POST['dateD']:"";
    $descrp=isset($_POST['descrp'])?$_POST['descrp']:"";



    $requete="update demande set cin_Stagiaire=?, Nom_Stagiare=?, Date_Demande=?, Description_Demande=? where Id_Demande=?";
    $datos=array($cinSt, $nomD, $dateD, $descrp, $idD);
    $result=$pdo->prepare($requete);
    $result->execute($datos);

    header('location:demande.php');
?>