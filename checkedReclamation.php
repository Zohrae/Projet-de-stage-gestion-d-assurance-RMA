<?php
    session_start();
    if(isset($_SESSION['responsable'])){
    require_once("connexion.php"); 


    $numR=isset($_GET['numR'])?$_GET['numR']:0;
    $etatM=isset($_GET['etatM'])?$_GET['etatM']:0;
    
    
        if($etatM == 0)
            $newEtatR = 1;
     
          
    
        $requete="update reclamation set Etat_Reclamation=? where Num_Reclamation=?";
        $datos=array($newEtatR, $numR);
        $result=$pdo->prepare($requete);
        $result->execute($datos);

        header('location:reclamation.php');
        }else{
            header('location:../login.php');
        }

?>
