<?php
    require_once("connexion.php"); 
    require_once('session.php');


    $numB=isset($_POST['numB'])?$_POST['numB']:"";
    $policeB=isset($_POST['policeB'])?$_POST['policeB']:"";
    $cinB=isset($_POST['cinB'])?$_POST['cinB']:"";
    $nomB=isset($_POST['nomB'])?$_POST['nomB']:"";
    $usageB=isset($_POST['usageB'])?$_POST['usageB']:"";
    $duree=isset($_POST['duree'])?$_POST['duree']:"";


    $requete="update bordereau set CIN_Client=?, Num_Police=?, Nom_Assure=?, Usage_B=?, Duree=? where Num_bordereau=?";
    $datos=array($cinB, $policeB, $nomB, $usageB, $duree, $numB);
    $result=$pdo->prepare($requete);
    $result->execute($datos);

    header('location:bordereau.php');
?>