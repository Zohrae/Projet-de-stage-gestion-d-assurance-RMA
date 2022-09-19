<?php
    require_once("connexion.php"); 
    require_once('session.php');


    $numC=isset($_GET['numC'])?$_GET['numC']:"";
    $requete="select * from cheque where Num_Cheque= '$numC'";
    $result=$pdo->query($requete);
    $cheque=$result->fetch();
    $cinC=$cheque['CIN_Client'];
    $nomC=$cheque['Nom_Assure'];
    $prixC=$cheque['Prix'];
    $dateC=$cheque['Date_Cheque'];
    $typeC=$cheque['Type_Cheque'];
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mise à Jour d'un Chéque</title>
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
            <div class="panel-heading">Veuillez entrer les nouvelles données du chéque</div>
            <div class="panel-body">
                <form method="post" action="changingCheque.php" class="form">
                    <div class="form-group">
                        <label for="numC">N° de chéque: <?php echo $numC ?></label>
                        <input type="hidden" name="numC" 
                        class="form-control" value="<?php echo $numC ?>">
                    </div>
                    <div class="form-group">
                        <label for="cinC">N° de CIN:</label>
                        <input type="text" name="cinC" 
                        class="form-control" value="<?php echo $cinC ?>"> 
                    </div>
                    <div class="form-group">
                        <label for="nomC">Nom du Client:</label>
                        <input type="text" name="nomC" 
                        class="form-control" value="<?php echo $nomC ?>">
                    </div>
                    <div class="form-group">
                        <label for="prixC">Prix:</label>
                        <input type="text" name="prixC" 
                        class="form-control" value="<?php echo $prixC ?>">
                    </div>
                    <div class="form-group">
                        <label for="dateC">Date:</label>
                        <input type="text" name="dateC" 
                        class="form-control" value="<?php echo $dateC ?>">
                    </div>
                    <div class="form-group">
                        <label for="typeC">Type:</label>
                            <select name="typeC" class="form-control" id="typeC">
                                <option value="Barré"<?php if($typeC == "Barré") echo"selected" ?>>Barré</option>   
                                <option value="Confirmé"<?php if($typeC == "Confirmé") echo"selected" ?>>Confirmé</option>   
                                <option value="Certifié"<?php if($typeC === "Certifié") echo"selected" ?>>Certifié</option>  
                                <option value="Chèque de banque"<?php if($typeC === "Chèque de banque") echo"selected" ?>>Chèque de banque</option>    
                            </select>
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