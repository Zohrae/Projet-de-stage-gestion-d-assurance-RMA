<?php
    session_start();
    require_once("connexion.php"); 

    $login=isset($_POST['login'])?$_POST['login']:"";
    $pwd=isset($_POST['pwd'])?$_POST['pwd']:"";

   
    $requete="select id_client, CIN_C, Nom_Complet, Username, Email_Client from compteclient where Username = '$login' and Password = md5('$pwd')";
    $result=$pdo->query($requete);

    if($client=$result->fetch()){
            $_SESSION['compteclient']=$client;
            header('location:../theme/client.php');
    }else{
        $_SESSION['errorLogin']="<strong>Erreur!!</strong> l'un des champs login ou mot de passe incorrect.";
        header('location:../loginClient.php');
    }
    

?>