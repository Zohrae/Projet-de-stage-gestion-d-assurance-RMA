<?php
    require_once("connexion.php"); 
    require_once('session.php');


    $idA=isset($_GET['idA'])?$_GET['idA']:0;
    $etat=isset($_GET['etat'])?$_GET['etat']:0;
    
    
        if($etat == 1)
            $newEtat = 0;
        else{
            $newEtat = 1; 
        }
     
          
    
        $requete="update responsable set etat=? where Id_Responsable=?";
        $datos=array($newEtat, $idA);
        $result=$pdo->prepare($requete);
        $result->execute($datos);

        header('location:responsable.php');
    

    

?>
