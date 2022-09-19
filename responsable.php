<?php
    require_once("connexion.php");
    require_once('session.php');
    
   
    $nomR=isset($_GET['nomR'])?$_GET['nomR']:"";
    $requete="select * from responsable
        where Nom like '%$nomR%'";

    $resultResponsable=$pdo->query($requete);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Admins</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/mistyle.css">
    <!-- icon -->
    <link rel="shortcut icon" type="image/x-icon" href="../theme/images/logolion2.png" />
    <link rel="stylesheet" href="../theme/css/btnStyle.css">

</head>

<body>
    <?php include("menuUser.php"); ?>

    <div class="container">
        <div class="panel panel-pg fromthetop">
            <div class="panel-heading">Rechercher un admin ...</div>
            <div class="panel-body">
                <form method="get" action="responsable.php" class="form-inline">
                    <div class="form-group">
                        Nom: <input type="text" name="nomR" 
                        placeholder="Entrer le Nom" 
                        class="form-control" value="<?php echo $nomR ?>">
                    </div>
                    <button type="submit" class="btn btn-ro mt-3">
                        <span class="glyphicon glyphicon-search"></span>
                        Chercher     
                        </button>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                    <a href="newAdminAcc.php" class="btn btn-main mt-2">
                        <span class="glyphicon glyphicon-plus"></span>
                        Nouvel admin</a>
                        
                </form>
            </div>
        </div>
        <div class="panel panel-p fromthetop2">
            <div class="panel-heading">Liste des admins</div>
            <div class="panel-body">
            <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID Admin</th><th>Nom Complet</th><th>Login</th><th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while($responsable=$resultResponsable->fetch()){ ?>
                            <tr class="<?php echo $responsable['etat']==1?'default':'danger'?>">
                                <td><?php echo $responsable['Id_Responsable']?></td>
                                <td><?php echo $responsable['Nom']?></td>
                                <td><?php echo $responsable['Nom_Utilisateur']?></td>
                                <td>
                                    <a onclick="return confirm('Question: voulez-vous vraiment supprimer ce compte?')" 
                                    href="deleteAdmin.php?idA=<?php echo $responsable['Id_Responsable']?>">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                    &nbsp;
                                    <a href="activateRespo.php?idA=<?php echo $responsable['Id_Responsable']?>">
                                        <?php
                                            if($responsable['etat']==1)
                                            echo '<span class="glyphicon glyphicon-ok"></span>';
                                            else 
                                            echo '<span class="glyphicon glyphicon-remove"></span>';
                                         ?>
                                    </a>
                                </td>           
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>