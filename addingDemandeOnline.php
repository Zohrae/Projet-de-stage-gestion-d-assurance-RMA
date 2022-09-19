<?php
    require_once("connexion.php"); 
    require_once('session.php');


    $cinDO=isset($_POST['cinDO'])?$_POST['cinDO']:"";
    $nomDO=isset($_POST['nomDO'])?$_POST['nomDO']:"";
    $dateDO=isset($_POST['dateDO'])?$_POST['dateDO']:"";
    $message=isset($_POST['message'])?$_POST['message']:"";



    $requete="insert into demande(cin_Stagiaire, Nom_Stagiare, Date_Demande, Description_Demande) values(?,?,?,?)";
    $datos=array($cinDO, $nomDO, $dateDO, $message);
    $result=$pdo->prepare($requete);
    $result->execute($datos);

    header('location:operationDoneDemande.php');
?>