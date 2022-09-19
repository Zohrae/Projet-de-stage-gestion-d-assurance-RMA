<?php
    require_once("connexion.php"); 
    require_once('session.php');


    $cinCO=isset($_POST['cinCO'])?$_POST['cinCO']:"";
    $nomCO=isset($_POST['nomCO'])?$_POST['nomCO']:"";
    $villeCO=isset($_POST['villeCO'])?$_POST['villeCO']:"";
    $emailCO=isset($_POST['emailCO'])?$_POST['emailCO']:"";
    $teleCO=isset($_POST['teleCO'])?$_POST['teleCO']:"";
    $MOCO=isset($_POST['MOCO'])?$_POST['MOCO']:"";
    $genderCO=isset($_POST['genderCO'])?$_POST['genderCO']:"";



    $requete="insert into client (CIN_Client, Nom_Complet, Ville, Email, Telephone, PasswordC, Gender) values(?,?,?,?,?,?,?)";
    $datos=array($cinCO, $nomCO, $villeCO, $emailCO, $teleCO, $MOCO, $genderCO);
    $result=$pdo->prepare($requete);
    $result->execute($datos);

    header('location:AccCreatedSuccessfully.php');
?>