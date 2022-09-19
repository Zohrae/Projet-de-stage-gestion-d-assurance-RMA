<?php
    session_start();
    require_once("connexion.php"); 

    $login=isset($_POST['login'])?$_POST['login']:"";
    $pwd=isset($_POST['pwd'])?$_POST['pwd']:"";

   
    $requete="select Id_Responsable , Nom, Mot_Passe, Email_Admin from responsable where Nom_Utilisateur = '$login' and Mot_Passe = md5('$pwd')";
    $result=$pdo->query($requete);

    if($responsable=$result->fetch()){
            $_SESSION['responsable']=$responsable;
            header('location:../index.php');
    }else{
        $_SESSION['errorLogin']="<strong>Erreur!</strong> l'un des champs l'email ou mot de passe incorrect.";
        header('location:../login.php');
    }
    

?>