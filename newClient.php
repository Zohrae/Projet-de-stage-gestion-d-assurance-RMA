<?php
    require_once('session.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nouveau Client</title>
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
            <div class="panel-heading">Veuillez entrer les données de nouveau client</div>
            <div class="panel-body">
                <form method="post" action="addingClient.php" class="form">
                    <div class="form-group">
                        <label for="cinC">N° de CIN:</label>
                        <input type="text" name="cinC" 
                        placeholder="Entrer le N° CIN du client" 
                        class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nomC">Nom Complet:</label>
                        <input type="text" name="nomC" 
                        placeholder="Entrer le nom du client" 
                        class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="villeC">Ville:</label>
                        <input type="text" name="villeC" 
                        placeholder="Entrer la ville du client" 
                        class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="teleC">N° de Téléphone:</label>
                        <input type="text" name="teleC" 
                        placeholder="Entrer le N° de téléphone du client" 
                        class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="genderC">Gender:</label>
                            <select name="genderC" class="form-control" id="genderC">
                            <option value= "Monsieur">Monsieur</option>
                            <option value= "Madame">Madame</option> 
                        </select>
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