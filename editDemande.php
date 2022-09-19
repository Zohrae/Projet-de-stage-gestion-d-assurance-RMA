<?php
    require_once("connexion.php"); 
    require_once('session.php');


    $idD=isset($_GET['idD'])?$_GET['idD']:0;

    $requete="select * from demande where Id_Demande = '$idD'";
    $result=$pdo->query($requete);
    $demande=$result->fetch();

    $cinSt=$demande['cin_Stagiaire'];
    $nomD=$demande['Nom_Stagiare'];
    $dateD=$demande['Date_Demande'];
    $descrp=$demande['Description_Demande'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mise à Jour d'une Demande</title>
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
            <div class="panel-heading">Veuillez entrer les nouvelles données de demande</div>
            <div class="panel-body">
                <form method="post" action="changingDemande.php" class="form">
                <div class="form-group">
                        <label for="idD">ID Demande: <?php echo $idD ?></label>
                        <input type="hidden" name="idD" 
                        class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="cinSt">CIN Stagiaire:</label>
                        <input type="text" name="cinSt" 
                        class="form-control" value="<?php echo $cinSt ?>">
                    </div>
                    <div class="form-group">
                        <label for="nomD">Nom Complet:</label>
                        <input type="text" name="nomD" 
                        class="form-control" value="<?php echo $nomD ?>">
                    </div>
                    <div class="form-group">
                        <label for="dateD">Date de Demande:</label>
                        <input type="text" name="dateD" 
                        class="form-control" value="<?php echo $dateD ?>">
                    </div>
                    <div class="form-group">
                        <label for="descrp">Description:</label>
                        <input type="text" name="descrp" 
                        class="form-control" value="<?php echo $descrp ?>">
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