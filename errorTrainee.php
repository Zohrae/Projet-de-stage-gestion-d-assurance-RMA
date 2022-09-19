<?php
    $message=isset($_GET['message'])?$_GET['message']:"Erreur";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Alerte</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/mistyle.css">
    <!-- icon -->
    <link rel="shortcut icon" type="image/x-icon" href="../theme/images/logolion2.png" />
</head>

<body>
    <?php include("menu.php"); ?>
    <?php
    require_once('session.php');
    ?>

    <div class="container">
        <div class="panel panel-danger fromthetop">
            <div class="panel-heading"><h4>Erreur:</h4></div>
            <div class="panel-body">
                <h3> <?php echo $message?> </h3>
                <h4><a href="<?php echo $_SERVER['HTTP_REFERER'] ?>">
                Retour >>></a></h4>
            </div>
        </div>
    </div>
</body>
</html>