<?php
    require_once("connexion.php"); 
    require_once('session.php');


    $numR=isset($_POST['numR'])?$_POST['numR']:"";
    $cinR=isset($_POST['cinR'])?$_POST['cinR']:"";
    $nomR=isset($_POST['nomR'])?$_POST['nomR']:"";
    $dateR=isset($_POST['dateR'])?$_POST['dateR']:"";
    $descriptionR=isset($_POST['descriptionR'])?$_POST['descriptionR']:"";



    $requete="insert into reclamation(CIN_Client, Nom_Client, Date_Reclamation, Description_Rec) values(?,?,?,?)";
    $datos=array($cinR, $nomR,  $dateR, $descriptionR);
    $result=$pdo->prepare($requete);
    $result->execute($datos);

    header('location:reclamation.php');
?>