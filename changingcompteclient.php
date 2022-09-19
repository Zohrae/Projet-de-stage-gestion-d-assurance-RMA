<?php
    require_once("connexion.php"); 
    require_once('sessionClient.php');


    $id=isset($_POST['id'])?$_POST['id']:"";
    $Username=isset($_POST['Username'])?$_POST['Username']:"";
    $Email=isset($_POST['Email'])?$_POST['Email']:"";




    $requete="update compteclient set Username=?, Email_Client=? where id_client=?";
    $datos=array($Username, $Email, $id);
    $result=$pdo->prepare($requete);
    $result->execute($datos);

    header('location:../loginClient.php');
?>