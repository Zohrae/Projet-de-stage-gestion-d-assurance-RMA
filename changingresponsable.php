<?php
    require_once("connexion.php"); 
    require_once('session.php');


    $id=isset($_POST['id'])?$_POST['id']:"";
    $Username=isset($_POST['Username'])?$_POST['Username']:"";
    $Email=isset($_POST['Email'])?$_POST['Email']:"";




    $requete="update responsable set Nom_Utilisateur=?, Email_Admin=? where Id_Responsable=?";
    $datos=array($Username, $Email, $id);
    $result=$pdo->prepare($requete);
    $result->execute($datos);

    header('location:../login.php');
?>