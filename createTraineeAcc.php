<?php

    require_once("connexion.php"); 
    require_once("../functions/functionsStagiaire.php"); 


    
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $cinSO=$_POST['cinSO'];
        $emailSO=$_POST['emailSO'];
        $pwdSO=$_POST['pwdSO'];
        $nomSO=$_POST['nomSO'];
        $usernameSO=$_POST['usernameSO'];
        $pwdSOC=$_POST['pwdSOC'];

        $validationErrors=array();

        if(isset($emailSO)){
            $filtredEmail=filter_var($emailSO, FILTER_VALIDATE_EMAIL);

                if($filtredEmail != true){
                    $validationErrors[]="Erreur! Email non valid. ";

                }
        }

        if(isset($usernameSO)){
            $filtredUsername=filter_var($usernameSO, FILTER_UNSAFE_RAW);

                if(strlen($filtredUsername)<4){
                    $validationErrors[]="Erreur! Le nom d'utilisateur doit contenir au moins 4 caractères.";

                }
        }

        if(isset($pwdSO) && isset($pwdSOC)){

                if(empty($pwdSO)){
                    $validationErrors[]="Erreur! Le mot de passe ne doit pas etre vide.";                  
                }

                if(md5($pwdSO)!==md5($pwdSOC)){
                    $validationErrors[]="Erreur! Les deux mots de passe ne sont pas identiques.";
                }
        }

        if(empty($validationErrors)){
            if(rechercherUsername($usernameSO) == 0 & rechercherEmail($emailSO) == 0){
                $requete=$pdo->prepare("insert into comptestagiaire(CIN_S, Nom_Complet, Username_Stagiaire, Password_Stagiaire, Email_Stagiaire)
                                        values(:pCIN_S, :pNom_Complet, :pUsername_Stagiaire, :pPassword_Stagiaire, :pEmail_Stagiaire)");
            $requete->execute(array('pCIN_S'                    =>$cinSO,
                                    'pNom_Complet'              =>$nomSO,
                                    'pUsername_Stagiaire'       =>$usernameSO,
                                    'pEmail_Stagiaire'          =>$emailSO,
                                    'pPassword_Stagiaire'       =>md5($pwdSO)));
            
            $success_msg="felicitaciones";

            }else{
                if(rechercherUsername($usernameSO)>0){
                $validationErrors[]="Désolé ce nom d'utilisateur existe déjà.";
            }
                if(rechercherEmail($emailSO)>0){
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
                            name="cinSO"
                            autocomplete="off"
                            class="form-control" 
                            placeholder="HH****" required="" />

                            <br>

                        <strong>Email</strong><input type="email" 
                            name="emailSO"
                            autocomplete="off"
                            class="form-control" 
                                placeholder="email@exemple.com" required="" />
                                <br>

                        <strong>Mot de Passe</strong><input type="password" 
                            minlength="3"
                            title="Le mot de passe doit contenir au moins 4 caractères.." 
                            name="pwdSO"
                            autocomplete="new-password"
                            class="form-control" 
                            placeholder="0000" required="" />           
                </div>

                <div class="col-md-6 pad-adjust">
                    <br>
                        <strong>Nom Complet</strong><input type="text"  
                            name="nomSO"
                            autocomplete="off"
                            class="form-control" 
                            placeholder="LAMSSANE Amine" required="" />
                                    <br>
                        <strong>Nom d'Utilisateur</strong><input type="text"
                            minlength="4"
                            title="Le nom d'utilisateur doit contenir au moins 4 caractères.." 
                            name="usernameSO"
                            autocomplete="off"
                            class="form-control" 
                            placeholder="Amine123" required="" />
                </div>
                <div class="col-md-6 pad-adjust">
                    <br>
                        <strong>Confirmer le Mot de Passe</strong><input type="password" 
                            minlength="3"
                            name="pwdSOC"
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