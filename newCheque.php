<?php
    require_once('session.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nouveau Chéque</title>
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
            <div class="panel-heading">Veuillez entrer les données du nouveau chéque</div>
            <div class="panel-body">
                <form method="post" action="addingCheque.php" class="form">
                    <div class="form-group">
                        <label for="numC">N° de chéque:</label>
                        <input type="text" name="numC" 
                        placeholder="Entrer le N° du Chéque" 
                        class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="cinC">N° CIN:</label>
                        <input type="text" name="cinC" 
                        placeholder="Entrer le N° CIN" 
                        class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nomC">Nom du client:</label>
                        <input type="text" name="nomC" 
                        placeholder="Entrer le Nom de l'Assuré" 
                        class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="prixC">Prix:</label>
                        <input type="text" name="prixC" 
                        placeholder="Entrer le Prix" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="dateC">Date:</label>
                        <input type="text" name="dateC" 
                        placeholder="Entrer la Date" 
                        class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="typeC">Type:</label>
                            <select name="typeC" class="form-control" id="typeC">
                                <option value="Barré">Barré</option>   
                                <option value="Confirmé">Confirmé</option>   
                                <option value="Certifié">Certifié</option>  
                                <option value="Chèque de banque">Chèque de banque</option>    
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