<?php
    require_once("connexion.php"); 
    require_once('session.php');


    $numR=isset($_GET['numR'])?$_GET['numR']:"";
    $requete="select * from reclamation where Num_Reclamation = '$numR'";
    $result=$pdo->query($requete);
    $reclamation=$result->fetch();
    $cinR=$reclamation['CIN_Client'];
    $nomR=$reclamation['Nom_Client'];
    $dateR=$reclamation['Date_Reclamation'];
    $descriptionR=$reclamation['Description_Rec'];
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mise à Jour d'une Réclamation</title>
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
            <div class="panel-heading">Veuillez entrer les nouvelles données du réclamation</div>
            <div class="panel-body">
                <form method="post" action="changingReclamation.php" class="form">
                    <div class="form-group">
                        <label for="numR">N° de Réclamation: <?php echo $numR ?></label>
                        <input type="hidden" name="numR" 
                        class="form-control" value="<?php echo $numR ?>">
                    </div>
                    <div class="form-group">
                        <label for="cinR">N° de CIN:</label>
                        <input type="text" name="cinR" 
                        class="form-control" value="<?php echo $cinR ?>">
                    </div>
                    <div class="form-group">
                        <label for="nomR">Nom Complet:</label>
                        <input type="text" name="nomR" 
                        class="form-control" value="<?php echo $nomR ?>">
                    </div>
                    <div class="form-group">
                        <label for="dateR">Date de Réclamation:</label>
                        <input type="text" name="dateR" 
                        class="form-control" value="<?php echo $dateR ?>">
                    </div>
                    <div class="form-group">
                        <label for="descriptionR">Description:</label>
                        <input type="text" name="descriptionR" 
                        class="form-control" value="<?php echo $descriptionR ?>">
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