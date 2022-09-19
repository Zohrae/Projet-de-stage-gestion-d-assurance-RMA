<?php
    require_once("connexion.php"); 
    require_once('session.php');


    $cinSt=isset($_GET['cinSt'])?$_GET['cinSt']:"";

    $requete="select * from stagiaire where cin_Stagiaire = '$cinSt'";
    $result=$pdo->query($requete);
    $stagiaire=$result->fetch();
    $nomS=$stagiaire['Nom_Complet'];
    $teleS=$stagiaire['Telephone'];
    $dateD=$stagiaire['Date_DebutS'];
    $dateF=$stagiaire['Date_FinS'];
    $NDE=$stagiaire['NiveauDomaine_Etude'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mise à Jour d'un Stagiaire</title>
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
            <div class="panel-heading">Veuillez entrer les nouvelles données du stagiaire</div>
            <div class="panel-body">
                <form method="post" action="changingTraineee.php" class="form">
                <div class="form-group">
                        <label for="cinSt">CIN stagiaire: <?php echo $cinSt ?></label>
                        <input type="hidden" name="cinSt" 
                        class="form-control"
                        value="<?php echo $cinSt ?>">
                    </div>
                    <div class="form-group">
                        <label for="nomS">Nom complet:</label>
                        <input type="text" name="nomS" 
                        class="form-control"
                        value="<?php echo $nomS ?>" >
                    </div>
                    <div class="form-group">
                        <label for="teleS">N° de téléphone:</label>
                        <input type="text" name="teleS" 
                        class="form-control" value="<?php echo $teleS ?>" >
                    </div>
                    <div class="form-group">
                        <label for="dateD">Date debut de stage:</label>
                        <input type="text" name="dateD" 
                        class="form-control" value="<?php echo $dateD ?>" >
                    </div>
                    <div class="form-group">
                        <label for="dateF">Date fin de stage:</label>
                        <input type="text" name="dateF" 
                        class="form-control" value="<?php echo $dateF ?>" >
                    </div>
                    <div class="form-group">
                        <label for="NDE">Niveau et domaine d'etude:</label>
                        <input type="text" name="NDE" 
                        class="form-control" value="<?php echo $NDE ?>" >
                    </div>

                    <button type="submit" class="btn btn-main mt-2">
                        <span class="glyphicon glyphicon-ok-sign"></span>
                        Valider
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>