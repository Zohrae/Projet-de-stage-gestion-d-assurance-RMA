<?php
    require_once("connexion.php"); 
    require_once('session.php');

    $numB=isset($_GET['numB'])?$_GET['numB']:0;

    $requete="select * from bordereau where Num_bordereau='$numB'";
    $result=$pdo->query($requete);
    $bordereau=$result->fetch();
    $cinB=$bordereau['CIN_Client'];
    $policeB=$bordereau['Num_Police'];
    $nomB=$bordereau['Nom_Assure'];
    $usageB=$bordereau['Usage_B'];
    $duree=$bordereau['Duree'];
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mise à Jour d'un Bordereau</title>
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
            <div class="panel-heading">Veuillez entrer les nouvelles données du bordereau</div>
            <div class="panel-body">
                <form method="post" action="changingbordereau.php" class="form">
                    <div class="form-group">
                        <label for="numB">N° du Bordereau: <?php echo $numB ?></label>
                        <input type="hidden" name="numB" 
                        class="form-control" value="<?php echo $numB ?>">
                    </div>
                    <div class="form-group">
                        <label for="cinB">N° de CIN:</label>
                        <input type="text" name="cinB" 
                        class="form-control" value="<?php echo $cinB ?>">
                    </div>
                    <div class="form-group">
                        <label for="policeB">N° de Police:</label>
                        <input type="text" name="policeB" 
                        class="form-control" value="<?php echo $policeB ?>">
                    </div>
                    <div class="form-group">
                        <label for="nomB">Nom du Client:</label>
                        <input type="text" name="nomB" 
                        class="form-control" value="<?php echo $nomB ?>">
                    </div>
                    <div class="form-group">
                        <label for="usageB">Usage:</label>
                            <select name="usageB" class="form-control" id="usageB">
                            <option value="E" <?php if($usageB == "E") echo "selected" ?>>E</option>
                            <option value="A" <?php if($usageB == "A") echo "selected" ?>>A</option>     
                            <option value="C" <?php if($usageB == "C") echo "selected" ?>>C</option>   
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="duree">Date:</label>
                        <input type="text" name="duree" 
                        class="form-control" value="<?php echo $duree ?>">
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