<?php
    session_start();
    if(isset($_SESSION['responsable'])){
    require_once("connexion.php"); 


    $idD=isset($_GET['idD'])?$_GET['idD']:0;
    $etatD=isset($_GET['etatD'])?$_GET['etatD']:0;
    
    
        if($etatD == 0)
            $newetatD = 1;
     
          
    
        $requete="update demande set Etat_Demande=? where Id_Demande=?";
        $datos=array($newetatD, $idD);
        $result=$pdo->prepare($requete);
        $result->execute($datos);

        header('location:demande.php');
        }else{
            header('location:../login.php');
        }

?>
