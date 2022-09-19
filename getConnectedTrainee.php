<?php
    session_start();
    require_once("connexion.php"); 

    $login=isset($_POST['login'])?$_POST['login']:"";
    $pwd=isset($_POST['pwd'])?$_POST['pwd']:"";

   
    $requete="select * from comptestagiaire where Username_Stagiaire = '$login' and Password_Stagiaire = md5('$pwd')";
    $result=$pdo->query($requete);

    if($comptestagiaire=$result->fetch()){
            $_SESSION['comptestagiaire']=$comptestagiaire;
            header('location:../theme/stagiaire.php');
    }else{
        $_SESSION['errorLogin']="<strong>Erreur!!</strong> l'un des champs l'email ou mot de passe incorrect.";
        header('location:../loginStagiaire.php');
    }
    

?>