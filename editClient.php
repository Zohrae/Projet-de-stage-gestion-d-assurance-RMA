<?php
    require_once("connexion.php"); 
    require_once('session.php');


    $cinC=isset($_GET['cinC'])?$_GET['cinC']:"";
    $requete="select * from client where CIN_Client = '$cinC'";
    $result=$pdo->query($requete);
    $client=$result->fetch();
    $nomC=$client['Nom_Complet'];
    $villeC=$client['Ville'];
    $teleC=$client['Telephone'];
    $genderC=$client['Gender'];
    //$pwdC=$client['PasswordC'];

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mise à Jour d'un Client</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/mistyle.css">
    <link rel="stylesheet" href="../theme/css/btnStyle.css">
    <!-- icon -->
    <link rel="shortcut icon" type="image/x-icon" href="../theme/images/logolion2.png" />

</head>
<body>
    <?php include("menu.php"); ?>

    <div class="container">
        <div class="panel panel-p fromthetop">
            <div class="panel-heading">Veuillez entrer les nouvelles données du client</div>
            <div class="panel-body">
            <form method="post" action="changingClient.php" class="form">
                    <div class="form-group">
                        <label for="cinC">N° de CIN: <?php echo $cinC ?></label>
                        <input type="hidden" name="cinC" 
                        class="form-control" 
                        value="<?php echo $cinC ?>">
                    </div>
                    <div class="form-group">
                        <label for="nomC">Nom Complet:</label>
                        <input type="text" name="nomC" 
                        class="form-control"
                        value="<?php echo $nomC ?>">
                    </div>
                    <div class="form-group">
                        <label for="villeC">Ville:</label>
                        <input type="text" name="villeC" 
                        class="form-control"
                        value="<?php echo $villeC ?>">
                    </div>
                    <div class="form-group">
                        <label for="teleC">N° DE Téléphone:</label>
                        <input type="text" name="teleC" 
                        class="form-control"
                        value="<?php echo $teleC ?>" >
                    </div>
                    <div class="form-group">
                        <label for="genderC">Gender:</label>
                            <select name="genderC" class="form-control" id="genderC">
                            <option value= "Monsieur"  <?php if($genderC == "Monsieur") echo "selected" ?>>Monsieur</option>
                            <option value= "Madame" <?php if($genderC == "Madame") echo "selected" ?>>Madame</option>     
                        </select>
                    </div>
                    <button type="submit" class="btn btn-ro mt-2">
                        <span class="glyphicon glyphicon-ok-sign"></span>
                        Valider
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>