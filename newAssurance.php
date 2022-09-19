<?php
    require_once('session.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nouvelle Assurance</title>
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
            <div class="panel-heading">Veuillez entrer les données de la nouvelle contrat</div>
            <div class="panel-body">
                <form method="post" action="addingAssurance.php" class="form">
                    <div class="form-group">
                        <label for="policeA">N° de Police:</label>
                        <input type="text" name="policeA" 
                        placeholder="Entrer le N° de Police" 
                        class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="cinA">N° de CIN:</label>
                        <input type="text" name="cinA" 
                        placeholder="Entrer le N° CIN du Client" 
                        class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nomA">Nom du Client:</label>
                        <input type="text" name="nomA" 
                        placeholder="Entrer le Nom de l'Assuré" 
                        class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="tarifA">Tarif:</label>
                        <input type="text" name="tarifA" 
                        placeholder="Entrer le Tarif" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Etat">Etat:</label>
                            <select name="Etat" class="form-control" id="Etat">
                            <option value="Renouvelement">Renouvelement</option>
                            <option value="Remplacement">Remplacement</option>     
                            <option value="Nouvelle Contrat">Nouvelle Contrat</option>   
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="dateD">Date-heure d'effet:</label>
                        <input type="text" name="dateD" 
                        placeholder="Entrer la Date" 
                        class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="dateF">Date-heure d'échéance:</label>
                        <input type="text" name="dateF" 
                        placeholder="Entrer la date" 
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