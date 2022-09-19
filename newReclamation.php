<?php
    require_once('session.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nouvelle Réclamation</title>
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
            <div class="panel-heading">Veuillez entrer les données de la nouvelle réclamation</div>
            <div class="panel-body">
                <form method="post" action="addingReclamation.php" class="form">
                    <div class="form-group">
                        <label for="cinR">N° de CIN:</label>
                        <input type="text" name="cinR" 
                        placeholder="Entrer le N° de CIN" 
                        class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nomR">Nom Complet:</label>
                        <input type="text" name="nomR" 
                        placeholder="Entrer le nom de l'assuré" 
                        class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="dateR">Date de Réclamation:</label>
                        <input type="text" name="dateR" 
                        placeholder="Entrer la date de réclamation" 
                        class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="descriptionR">Description:</label>
                        <input type="text" name="descriptionR" 
                        placeholder="Décrire la réclamation" 
                        class="form-control">
                    </div>
                    <button type="submit" class="btn btn-ro mt-2">
                        <span class="glyphicon glyphicon-plus"></span>
                        Ajouter
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>