<?php
    require_once("connexion.php"); 
    require_once('sessionStagiaire.php');


    $id=$_SESSION['comptestagiaire']['id_stagiaire'];

    $oldpwd=isset($_POST['oldpwd'])?$_POST['oldpwd']:"";
    $newpwd=isset($_POST['newpwd'])?$_POST['newpwd']:"";

    $requete="select * from comptestagiaire where id_stagiaire = $id and Password_Stagiaire = md5('$oldpwd')";
    
    $result=$pdo->prepare($requete);

    $result->execute();

    $msg="";

    if($result->fetch()){
        
        $requete="update comptestagiaire set Password_Stagiaire=md5(?) where id_stagiaire=?";

        $params=array($newpwd, $id);
        $result=$pdo->prepare($requete);
        $result->execute($params);
        $msg="<strong>Félicitations!</strong> Votre mot de passe est modifié avec succés.";
    }else{
        $msg= "<strong>Erreur!</strong> L'ancien mot de passe est incorrect.";
        }

        echo $msg;
    
?>
