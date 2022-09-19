<?php
    require_once("connexion.php"); 
    require_once('session.php');

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Changement de Mot de Passe</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/miistyle.css">
    <link rel="stylesheet" href="../theme/css/btnStyle.css">
    <link rel="stylesheet" href="../css/fontawesome.min.css">

    <!-- icon -->
    <link rel="shortcut icon" type="image/x-icon" href="../theme/images/logolion2.png" />
    <script src="../js/MYJS.js">

    </script>
</head>
<body> 
<img src="../theme/images/icooons/modifi.png" class="col-md-30 col-md-offset-10" width="50">
    <a style="text-shadow: black; font-size: 130%; color:darkslateblue" href="../index.php"> 
        Accueil </a>


    <div class="container">
        <div class="panel panel-p fromthetop col-md-6 col-md-offset-3">
            <div class="panel-heading col-md-8 col-md-offset-2"> &nbsp; &nbsp; &nbsp; &nbsp; Veuillez entrer vos nouvelles données</div>
            <div class="panel-body">
            <form method="post" action="changingPWDadmin.php" class="form">
            <div class="form-group">
                        <!-- <label for="id">ID:</label> -->
                        <input type="hidden" name="id" 
                        class="form-control" 
                        value="<?php echo $id ?>">
                    </div>
                    <div class="form-group">
                        <br>
                        <label for="Username">Ancien Mot de Passe:</label><i></i>
                       <input 
                        minlength="3"
                        type="password" 
                        name="oldpwd" 
                        autocomplete="false"
                        placeholder="Taper votre Anicien Mot de Passe"
                        required
                        class="form-control oldpwd"
                        >
                    </div>
                    <div class="form-group newpwd">
                        <label for="Email">Nouveau Mot de Passe:</label>
                        <input 
                        minlength="3"
                        type="password" 
                        name="newpwd" 
                        autocomplete="false"
                        placeholder="Entrer votre Nouveau Mot de Passe"
                        required
                        class="form-control"
                        >
                    </div>
                    <button  type="submit" class="btn btn-ro mt-2">
                                

                        <span class="glyphicon glyphicon-ok-sign"></span>
                        Valider
                    </button>
                </form>
            </div>
        </div>
    </div>


</body>
</html>