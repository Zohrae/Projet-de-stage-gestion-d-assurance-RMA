<?php
    require_once("connexion.php"); 
    require_once('session.php');


    $nomCM=isset($_POST['nomCM'])?$_POST['nomCM']:"";
    $emailCM=isset($_POST['emailCM'])?$_POST['emailCM']:"";
    $teleCM=isset($_POST['teleCM'])?$_POST['teleCM']:"";
    $message=isset($_POST['message'])?$_POST['message']:"";



    $requete="insert into message(Nom_C, Email_C, Num_C, Message_C) values(?,?,?,?)";
    $datos=array($nomCM, $emailCM, $teleCM, $message);
    $result=$pdo->prepare($requete);
    $result->execute($datos);

    header('location:../theme/contact.html');
?>