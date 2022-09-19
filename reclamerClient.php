<?php
    require_once("connexion.php"); 
    require_once('sessionClient.php');


    $numR=isset($_POST['numR'])?$_POST['numR']:"";
    $cinCR=isset($_POST['cinCR'])?$_POST['cinCR']:"";
    $NOMcr=isset($_POST['NOMcr'])?$_POST['NOMcr']:"";
    $dateCR=isset($_POST['dateCR'])?$_POST['dateCR']:"";
    $msgRC=isset($_POST['msgRC'])?$_POST['msgRC']:"";



    $requete="insert into reclamation(CIN_Client, Nom_Client, Date_Reclamation, Description_Rec) values(?,?,?,?)";
    $datos=array($cinCR, $NOMcr,  $dateCR, $msgRC);
    $result=$pdo->prepare($requete);
    $result->execute($datos);

    header('location:../theme/client.php');
?>