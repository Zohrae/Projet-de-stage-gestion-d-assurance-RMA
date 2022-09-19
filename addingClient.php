<?php
    require_once("connexion.php"); 
    require_once('session.php');


    $cinC=isset($_POST['cinC'])?$_POST['cinC']:"";
    $nomC=isset($_POST['nomC'])?$_POST['nomC']:"";
    $villeC=isset($_POST['villeC'])?$_POST['villeC']:"";
    $teleC=isset($_POST['teleC'])?$_POST['teleC']:"";
    $genderC=isset($_POST['genderC'])?$_POST['genderC']:"";



    $requete="insert into client values(?,?,?,?,?)";
    $datos=array($cinC, $nomC, $villeC, $teleC, $genderC,);
    $result=$pdo->prepare($requete);
    $result->execute($datos);

    header('location:client.php');
?>