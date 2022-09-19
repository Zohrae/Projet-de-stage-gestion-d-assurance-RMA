<?php
    require_once("connexion.php"); 
    require_once('session.php');


    $id=$_SESSION['responsable']['Id_Responsable'];

    $oldpwd=isset($_POST['oldpwd'])?$_POST['oldpwd']:"";
    $newpwd=isset($_POST['newpwd'])?$_POST['newpwd']:"";

    $requete="select * from responsable where Id_Responsable = $id and Mot_Passe = md5('$oldpwd')";
    
    $result=$pdo->prepare($requete);

    $result->execute();

    $msg="";
    $interval=2;
    $url="../login.php";

    if($result->fetch()){
        
        $requete="update responsable set Mot_Passe=md5(?) where Id_Responsable=?";

        $params=array($newpwd, $id);
        $result=$pdo->prepare($requete);
        $result->execute($params);
        $msg= "<div>
                    <img src='../theme/images/icooons/yeyes.jpg' width='180' class='col-md-4 col-md-offset-3'>
                </div>
        <div class='alert alert-success col-md-8 col-md-offset-2'>
        <strong>Félicitations!</strong> Votre mot de passe est modifié avec succés.
                </div>";
    }else{
        $msg= "
                <div class='alert alert-danger col-md-6 col-md-offset-3'>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <strong>Erreur!</strong> L'ancien mot de passe est incorrect.
                </div><div>
                    <img src='../theme/images/icooons/noagain.png' width='150' class='col-md-4 col-md-offset-4' >
                </div>";
        $url=$_SERVER['HTTP_REFERER'];
    }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RMA</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">


</head>
<body>
    <div class="container">
        <br>
        <br>
        <?php
        
            echo $msg;
            header("refresh:$interval;url=$url");
        ?>
    </div>
    <script src="../js/aler.js"></script>
</body>
</html>