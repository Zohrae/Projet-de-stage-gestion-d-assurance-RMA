<?php
    require_once('session.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nouveau Stagiaire</title>
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
            <div class="panel-heading">Veuillez entrer les données de nouveau stagiaire</div>
            <div class="panel-body">
                <form method="post" action="addingTrainee.php" class="form">
                <div class="form-group">
                        <label for="cinSt">N° de CIN:</label>
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
                        <label for="teleS">N° de Téléphone:</label>
                        <input type="text" name="teleS" 
                        placeholder="Entrer le N° de téléphone du stagiaire" 
                        class="form-control">
                    </div>                  
                    <div class="form-group">
                        <label for="dateD">Date Debut de Stage:</label>
                        <input type="text" name="dateD" 
                        placeholder="Entrer la date de debut" 
                        class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="dateF">Date Fin de Stage:</label>
                        <input type="text" name="dateF" 
                        placeholder="Entrer la date de fin" 
                        class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="NDE">Niveau et Domaine d'Etude:</label>
                        <input type="text" name="NDE" 
                        placeholder="Entrer le niveau et le domaine d'etude" 
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