<?php
    require_once("connexion.php"); 
    require_once('session.php');


    $cinB=isset($_POST['cinB'])?$_POST['cinB']:"";
    $policeB=isset($_POST['policeB'])?$_POST['policeB']:"";
    $nomB=isset($_POST['nomB'])?$_POST['nomB']:"";
    $usageB=isset($_POST['usageB'])?$_POST['usageB']:"";
    $duree=isset($_POST['duree'])?$_POST['duree']:"";


    $requete="insert into bordereau(CIN_Client, Num_Police, Nom_Assure, Usage_B, Duree) values(?,?,?,?,?)";
    $datos=array($cinB, $policeB, $nomB, $usageB, $duree);
    $result=$pdo->prepare($requete);
    $result->execute($datos);

    header('location:bordereau.php');
?>