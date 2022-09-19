<?php
    require_once("connexion.php"); 


    $cinBO=isset($_POST['cinBO'])?$_POST['cinBO']:"";
    $policeBO=isset($_POST['policeBO'])?$_POST['policeBO']:"";
    $nomBO=isset($_POST['nomBO'])?$_POST['nomBO']:"";
    $usageBO=isset($_POST['usageBO'])?$_POST['usageBO']:"";
    $dureeBO=isset($_POST['dureeBO'])?$_POST['dureeBO']:"";


    $requete="insert into bordereau(CIN_Client, Num_Police, Nom_Assure, Usage_B, duree) values(?,?,?,?,?)";
    $datos=array($cinBO, $policeBO, $nomBO, $usageBO, $dureeBO);
    $result=$pdo->prepare($requete);
    $result->execute($datos);

    header('location:doneOperation.php');
?>