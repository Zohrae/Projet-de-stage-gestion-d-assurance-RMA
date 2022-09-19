<?php
    require_once('session.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nouvelle Demande</title>
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
            <div class="panel-heading">Veuillez entrer les données de nouvelle demande</div>
            <div class="panel-body">
                <form method="post" action="addingDemande.php" class="form">
                    <div class="form-group">
                        <label for="cinSt">CIN Stagiaire:</label>
                        <input type="text" name="cinSt" 
                        placeholder="Entrer le CIN du stagiaire" 
                        class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nomS">Nom Complet:</label>
                        <input type="text" name="nomS" 
                        placeholder="Entrer le nom du stagiaire" 
                        class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="dateD">Date de Demande:</label>
                        <input type="text" name="dateD" 
                        placeholder="Entrer la date" 
                        class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="desc">Description:</label>
                        <input type="text" name="desc" 
                        placeholder="Décrire la demande" 
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