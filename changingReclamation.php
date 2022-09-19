<?php
    require_once("connexion.php"); 
    require_once('session.php');


    $numR=isset($_POST['numR'])?$_POST['numR']:"0";
    $cinR=isset($_POST['cinR'])?$_POST['cinR']:"";
    $nomR=isset($_POST['nomR'])?$_POST['nomR']:"";
    $dateR=isset($_POST['dateR'])?$_POST['dateR']:"";
    $descriptionR=isset($_POST['descriptionR'])?$_POST['descriptionR']:"";



    $requete="update reclamation set CIN_Client=?, Nom_Client=?, Date_Reclamation=?, Description_Rec=? where Num_Reclamation=?";
    $datos=array($cinR, $nomR,  $dateR, $descriptionR, $numR);
    $result=$pdo->prepare($requete);
    $result->execute($datos);

    header('location:reclamation.php');
?>