<?php
    session_start();
    if(isset($_SESSION['responsable'])){
    require_once("connexion.php"); 

    $cinC=isset($_GET['cinC'])?$_GET['cinC']:"";

    $requeteAssurance="select count(*) countAssurance from assurance where CIN_Client='$cinC'";
    $resultAssurance=$pdo->query($requeteAssurance);
    $tableCountingAssurance=$resultAssurance->fetch();
    $nbrAssurance=$tableCountingAssurance['countAssurance'];

    $requeteCheque="select count(*) countCheque from cheque where CIN_Client='$cinC'";
    $resultCheque=$pdo->query($requeteCheque);
    $tableCountingCheque=$resultCheque->fetch();
    $nbrCheque=$tableCountingCheque['countCheque'];

    $requeteBordereau="select count(*) countBordereau from bordereau where CIN_Client='$cinC'";
    $resultBordereau=$pdo->query($requeteBordereau);
    $tableCountingBordereau=$resultBordereau->fetch();
    $nbrBordereau=$tableCountingBordereau['countBordereau'];

    $requeteReclamation="select count(*) countReclamation from reclamation where CIN_Client='$cinC'";
    $resultReclamation=$pdo->query($requeteReclamation);
    $tableCountingReclamation=$resultReclamation->fetch();
    $nbrReclamation=$tableCountingReclamation['countReclamation'];


    if($nbrAssurance == 0 && $nbrCheque == 0 && $nbrBordereau == 0 && $nbrReclamation == 0 ){
        $requete="delete from client where CIN_Client=?";
        $datos=array($cinC);
        $result=$pdo->prepare($requete);
        $result->execute($datos);
        header('location:client.php');
    }else{
        $msg="ACTION INCORRECTE: Vous devez d'abord supprimer toutes les activités au nom de ce client.";
        header("location:error.php?message=$msg");   
    }
    }else{
        header('location:../login.php');
    }



?>