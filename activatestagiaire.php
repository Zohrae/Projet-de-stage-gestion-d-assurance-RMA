<?php
    require_once("connexion.php"); 


    $cinSt=isset($_GET['cinSt'])?$_GET['cinSt']:"";
    $EtatS=isset($_GET['EtatS'])?$_GET['EtatS']:"";
    
    
        if($EtatS != '0')
            $newEtat = '0';
        else if ($EtatS != '0')
            $newEtat = '1'; 
        
     
          
    
        $requete="update stagiaire set EtatS=? where cin_Stagiaire=?";
        $datos=array($newEtat, $cinSt);
        $result=$pdo->prepare($requete);
        $result->execute($datos);

        header('location:stagiaire.php');
    

    

?>
