<?php

    require_once("connexion.php"); 
    require_once("../functions/functions.php"); 


    
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $cinCO=$_POST['cinCO'];
        $emailCO=$_POST['emailCO'];
        $pwdCO=$_POST['pwdCO'];
        $nomCO=$_POST['nomCO'];
        $usernameCO=$_POST['usernameCO'];
        $pwdCOC=$_POST['pwdCOC'];

        $validationErrors=array();

        if(isset($emailCO)){
            $filtredEmail=filter_var($emailCO, FILTER_VALIDATE_EMAIL);

                if($filtredEmail != true){
                    $validationErrors[]="Erreur! Email non valid. ";

                }
        }

        if(isset($usernameCO)){
            $filtredUsername=filter_var($usernameCO, FILTER_UNSAFE_RAW);

                if(strlen($filtredUsername)<4){
                    $validationErrors[]="Erreur! Le nom d'utilisateur doit contenir au moins 4 caractères.";

                }
        }

        if(isset($pwdCO) && isset($pwdCOC)){

                if(empty($pwdCO)){
                    $validationErrors[]="Erreur! Le mot de passe ne doit pas etre vide.";                  
                }

                if(md5($pwdCO)!==md5($pwdCOC)){
                    $validationErrors[]="Erreur! Les deux mots de passe ne sont pas identiques.";
                }
        }

        if(empty($validationErrors)){
            if(rechercherUsername($usernameCO) == 0 & rechercherEmail($emailCO) == 0){
                $requete=$pdo->prepare("insert into compteclient(CIN_C, Nom_Complet, Username, Email_Client, Password)
                                        values(:pCIN_C, :pNom_Complet, :pUsername, :pEmail_Client, :pPassword)");
            $requete->execute(array('pCIN_C'          =>$cinCO,
                                    'pNom_Complet'    =>$nomCO,
                                    'pUsername'       =>$usernameCO,
                                    'pEmail_Client'   =>$emailCO,
                                    'pPassword'       =>md5($pwdCO)));
            
            $success_msg="felicitaciones";

            }else{
                if(rechercherUsername($usernameCO)>0){
                $validationErrors[]="Désolé ce nom d'utilisateur existe déjà.";
            }
                if(rechercherEmail($emailCO)>0){
                $validationErrors[]="Désolé cet eamil existe déjà.";
                }
            }
            
        }


    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Créer un Compte</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/mistyle.css">
    <link rel="stylesheet" href="../theme/css/btnStyle.css">
    <!-- icon -->
    <link rel="shortcut icon" type="image/x-icon" href="../theme/images/logolion2.png" />

</head>
<body>
    <div class="container">
        <div class="panel panel-p fromthetop col-md-6 col-md-offset-3">
            <div class="panel-heading col-md-6 col-md-offset-3">Veuillez remplir vos informations</div>
            <div class="panel-body">
                <form method="post" class="form">
                <div class="col-md-6 pad-adjust">
                    <br>
                        <strong>N° de CIN</strong> <input type="text"  
                            name="cinCO"
                            autocomplete="off"
                            class="form-control" 
                            placeholder="HH****" required="" />

                            <br>

                        <strong>Email</strong><input type="email" 
                            name="emailCO"
                            autocomplete="off"
                            class="form-control" 
                                placeholder="email@exemple.com" required="" />
                                <br>

                        <strong>Mot de Passe</strong><input type="password" 
                            minlength="3"
                            title="Le mot de passe doit contenir au moins 4 caractères.." 
                            name="pwdCO"
                            autocomplete="new-password"
                            class="form-control" 
                            placeholder="0000" required="" />           
                </div>

                <div class="col-md-6 pad-adjust">
                    <br>
                        <strong>Nom Complet</strong><input type="text"  
                            name="nomCO"
                            autocomplete="off"
                            class="form-control" 
                            placeholder="LAMSSANE Amine" required="" />
                                    <br>
                        <strong>Nom d'Utilisateur</strong><input type="text"
                            minlength="4"
                            title="Le nom d'utilisateur doit contenir au moins 4 caractères.." 
                            name="usernameCO"
                            autocomplete="off"
                            class="form-control" 
                            placeholder="Amine123" required="" />
                </div>
                <div class="col-md-6 pad-adjust">
                    <br>
                        <strong>Confirmer le Mot de Passe</strong><input type="password" 
                            minlength="3"
                            name="pwdCOC"
                            autocomplete="new-password"
                            class="form-control" 
                            placeholder="0000" required="" />  
                </div>
                <div class="col-md-6 pad-adjust">
                                </div>
                <div class="col-md-6 pad-adjust">
                    <br>
                </div>
                <div>
                    &nbsp;                    &nbsp;
                    <button type="submit" class="btn btn-ro mt-2">
                                Valider
                    </button>
                </div>      
            </form>
<br>
            <?php

                if(isset($validationErrors) && !empty($validationErrors)){
                    foreach($validationErrors as $error){
                            echo '<div class="alert alert-danger">' .$error .'</div>';
                }

                }

            ?>

            </div>
        </div>
    </div>
</body>
</html>