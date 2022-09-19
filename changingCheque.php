<?php
    require_once("connexion.php"); 
    require_once('session.php');


    $numC=isset($_POST['numC'])?$_POST['numC']:"";
    $cinC=isset($_POST['cinC'])?$_POST['cinC']:"";
    $nomC=isset($_POST['nomC'])?$_POST['nomC']:"";
    $prixC=isset($_POST['prixC'])?$_POST['prixC']:"";
    $dateC=isset($_POST['dateC'])?$_POST['dateC']:"";
    $typeC=isset($_POST['typeC'])?$_POST['typeC']:"";

    $requete="update cheque set CIN_Client=?, Nom_Assure=?, Prix=?, Date_Cheque=?, Type_Cheque=? where Num_Cheque=?";
    $datos=array($cinC, $nomC, $prixC, $dateC, $typeC, $numC);
    $result=$pdo->prepare($requete);
    $result->execute($datos);

    header('location:cheque1.php');
?>