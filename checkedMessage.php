<?php
    session_start();
    if(isset($_SESSION['responsable'])){
    require_once("connexion.php"); 


    $idM=isset($_GET['idM'])?$_GET['idM']:0;
    $etatM=isset($_GET['etatM'])?$_GET['etatM']:0;
    
    
        if($etatM == 0)
            $newetatM = 1;
     
          
    
        $requete="update message set Etat_Message=? where ID_message=?";
        $datos=array($newetatM, $idM);
        $result=$pdo->prepare($requete);
        $result->execute($datos);

        header('location:message.php');
        }else{
            header('location:../login.php');
        }

?>
