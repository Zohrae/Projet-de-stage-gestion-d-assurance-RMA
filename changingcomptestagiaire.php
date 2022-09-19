<?php
    require_once("connexion.php"); 
    require_once('sessionStagiaire.php');


    $id=isset($_POST['id'])?$_POST['id']:"";
    $Username=isset($_POST['Username'])?$_POST['Username']:"";
    $Email=isset($_POST['Email'])?$_POST['Email']:"";




    $requete="update comptestagiaire set Username_Stagiaire=?, Email_Stagiaire=? where id_stagiaire=?";
    $datos=array($Username, $Email, $id);
    $result=$pdo->prepare($requete);
    $result->execute($datos);

    header('location:../loginStagiaire.php');
?>