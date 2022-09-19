<?php
    require_once("connexion.php"); 
    require_once('sessionStagiaire.php');


    $id=isset($_GET['id'])?$_GET['id']:0;

    $requete="select * from comptestagiaire where id_stagiaire = $id";
    
    $result=$pdo->query($requete);
    $comptestagiaire=$result->fetch();
    $Username=$comptestagiaire['Username_Stagiaire'];
    $Email=$comptestagiaire['Email_Stagiaire'];

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modifier votre Compte</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/mistyle.css">
    <link rel="stylesheet" href="../theme/css/btnStyle.css">
    <!-- icon -->
    <link rel="shortcut icon" type="image/x-icon" href="../theme/images/logolion2.png" />

</head>
<body> 
<img src="../theme/images/icooons/modifi.png" class="col-md-30 col-md-offset-10" width="50">
    <a style="text-shadow: black; font-size: 130%; color:darkslateblue" href="../theme/stagiaire.php"> 
        Accueil </a>


    <div class="container">
        <div class="panel panel-p fromthetop col-md-6 col-md-offset-3">
            <div class="panel-heading col-md-8 col-md-offset-2"> &nbsp; &nbsp; &nbsp; &nbsp; Veuillez entrer vos nouvelles données</div>
            <div class="panel-body">
            <form method="post" action="changingcomptestagiaire.php" class="form">
            <div class="form-group">
                        <!-- <label for="id">ID:</label> -->
                        <input type="hidden" name="id" 
                        class="form-control" 
                        value="<?php echo $id ?>">
                    </div>
                    <div class="form-group">
                        <br>
                        <label for="Username">Nom d'Utilisateur:</label>
                        <input type="text" name="Username" 
                        class="form-control"
                        value="<?php echo $Username ?>">
                    </div>
                    <div class="form-group">
                        <label for="Email">Email:</label>
                        <input type="text" name="Email" 
                        class="form-control"
                        value="<?php echo $Email ?>">
                    </div>
                    <button type="submit" class="btn btn-ro mt-2">
                        <span class="glyphicon glyphicon-ok-sign"></span>
                        Valider
                    </button>
                    
                    <a style="color: d#069fe0;" href="editPWDstagiaire.php">&nbsp; &nbsp; 
                  
                      Changer le mot de passe
                   </a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>