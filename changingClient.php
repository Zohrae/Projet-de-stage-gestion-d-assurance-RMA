<?php
    require_once("connexion.php"); 
    require_once('session.php');


    $cinC=isset($_POST['cinC'])?$_POST['cinC']:"";
    $nomC=isset($_POST['nomC'])?$_POST['nomC']:"";
    $villeC=isset($_POST['villeC'])?$_POST['villeC']:"";
    $teleC=isset($_POST['teleC'])?$_POST['teleC']:"";
    //$pwdC=isset($_POST['pwdC'])?$_POST['pwdC']:"";
    $genderC=isset($_POST['genderC'])?$_POST['genderC']:"";




    $requete="update client set Nom_Complet=?, Ville=?, Telephone=?, Gender=? where CIN_Client=?";
    $datos=array($nomC, $villeC, $teleC, $genderC, $cinC);
    $result=$pdo->prepare($requete);
    $result->execute($datos);

    header('location:client.php');
?>