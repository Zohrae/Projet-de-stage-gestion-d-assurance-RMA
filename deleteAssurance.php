<?php
    session_start();
    if(isset($_SESSION['responsable'])){
    require_once("connexion.php"); 


    $policeA=isset($_GET['policeA'])?$_GET['policeA']:"";

    $requeteBordereau="select count(*) countBordereau from bordereau where Num_Police='$policeA'";
    $resultBordereau=$pdo->query($requeteBordereau);
    $tableCountingBordereau=$resultBordereau->fetch();
    $nbrBordereau=$tableCountingBordereau['countBordereau'];



    if($nbrBordereau == 0){
        $requete="delete from assurance where Num_Police=?";
        $datos=array($policeA);
        $result=$pdo->prepare($requete);
        $result->execute($datos);
        header('location:assurance.php');
    }else{
        $msg="ACTION INCORRECTE: Vous devez d'abord supprimer tous les bordereaux de cette assurance.";
        header("location:errorAssurance.php?message=$msg");   
    }
    }else{
        header('location:../login.php');
    }




?>