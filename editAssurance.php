<?php
    require_once("connexion.php"); 
    require_once('session.php');


    $policeA=isset($_GET['policeA'])?$_GET['policeA']:"";
    $requete="select * from assurance where Num_Police = '$policeA'";
    $result=$pdo->query($requete);
    $assurance=$result->fetch();
    $cinA=$assurance['CIN_Client'];
    $nomA=$assurance['Nom_Assure'];
    $tarifA=$assurance['Tarif'];
    $Etat=$assurance['Etat'];
    $dateD=$assurance['Date_Debut'];
    $dateF=$assurance['Date_fin'];
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mise à Jour d'une Assurance</title>
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
            <div class="panel-heading">Veuillez entrer les nouvelles données du contrat</div>
            <div class="panel-body">
                <form method="post" action="changingAssurance.php">
                    <div class="form-group">
                        <label for="policeA">N° de Police: <?php echo $policeA ?></label>
                        <input type="hidden" name="policeA" 
                        class="form-control" value="<?php echo $policeA ?>">
                    </div>
                    <div class="form-group">
                        <label for="cinA">N° CIN:</label>
                        <input type="text" name="cinA" 
                        placeholder="Entrer le N° CIN du client" 
                        class="form-control" value="<?php echo $cinA ?>">
                    </div>
                    <div class="form-group">
                        <label for="nomA">Nom complet:</label>
                        <input type="text" name="nomA" 
                        placeholder="Entrer le nom de l'assuré" 
                        class="form-control" value="<?php echo $nomA ?>">
                    </div>
                    <div class="form-group">
                        <label for="tarifA">Tarif:</label>
                        <input type="text" name="tarifA" 
                        placeholder="Entrer le tarif" 
                        class="form-control" value="<?php echo $tarifA ?>">
                    </div>
                    <div class="form-group">
                        <label for="Etat">Etat:</label>
                            <select name="Etat" class="form-control" id="Etat">
                            <option value="Renouvelement" <?php if($Etat == "Renouvelement") echo "selected" ?>>Renouvelement</option>
                            <option value="Remplacement" <?php if($Etat == "Remplacement") echo "selected" ?>>Remplacement</option>     
                            <option value="Nouvelle Contrat" <?php if($Etat == "Nouvelle Contrat") echo "selected" ?>>Nouvelle Contrat</option>   
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="dateD">Date-heure d'effet:</label>
                        <input type="text" name="dateD" 
                        placeholder="Entrer la date" 
                        class="form-control" value="<?php echo $dateD ?>">
                    </div>
                    <div class="form-group">
                        <label for="dateF">Date-heure d'échéance:</label>
                        <input type="text" name="dateF" 
                        placeholder="Entrer la date" 
                        class="form-control" value="<?php echo $dateF ?>">
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