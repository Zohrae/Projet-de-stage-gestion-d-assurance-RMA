<?php
    require_once('session.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nouveau Bordereau</title>
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
            <div class="panel-heading">Veuillez entrer les données du nouveau bordereau</div>
            <div class="panel-body">
                <form method="post" action="addingBordereau.php" class="form">
                    <div class="form-group">
                        <label for="cinB">N° de CIN:</label>
                        <input type="text" name="cinB" 
                        placeholder="Entrer le N° de CIN" 
                        class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="policeB">N° de Police:</label>
                        <input type="text" name="policeB" 
                        placeholder="Entrer le N° de Police"
                        class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nomB">Nom du Client:</label>
                        <input type="text" name="nomB"
                        placeholder="Entrer le Nom de l'Assuré" 
                        class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="usageB">Usage:</label>
                            <select name="usageB" class="form-control" id="usageB">
                            <option value="E">E</option>
                            <option value="A">A</option>     
                            <option value="C">C</option>   
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="duree">Durée:</label>
                        <input type="text" name="duree" 
                        placeholder="Entrer la durée"
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