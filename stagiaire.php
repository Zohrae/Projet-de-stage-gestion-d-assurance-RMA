
<?php

    require_once("connexion.php"); 
    require_once('session.php');


    $nomS=isset($_GET['nomS'])?$_GET['nomS']:"";

    $size=isset($_GET['size'])?$_GET['size']:"8";
    $pagina=isset($_GET['pagina'])?$_GET['pagina']:"1";
    $offset=($pagina-1)*$size;

    $requete="select * from stagiaire
        where Nom_Complet like '%$nomS%'
        limit $size
        offset $offset";

    $countinS="select count(*) countS from stagiaire
    where Nom_Complet like '%$nomS%'";

    $resultStagiaire=$pdo->query($requete);

    $resultCounting=$pdo->query($countinS);
    $countingTable=$resultCounting->fetch();
    $NBstagiaire=$countingTable['countS'];
    $mood=$NBstagiaire % $size;

    if($mood === 0)
        $NBpagina = $NBstagiaire / $size;
    else
        $NBpagina = floor($NBstagiaire / $size) + 1; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Stagiaires</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/mistyle.css">
    <!-- icon -->
    <link rel="shortcut icon" type="image/x-icon" href="../theme/images/logolion2.png" />
    <link rel="stylesheet" href="../theme/css/btnStyle.css">

</head>

<body>
    <?php include("menu.php"); ?>

    <div class="container">
        <div class="panel panel-pg fromthetop">
            <div class="panel-heading">Rechercher un stagiaire ...</div>
            <div class="panel-body">
                <form method="get" action="stagiaire.php" class="form-inline">
                    <div class="form-group">
                        Nom: <input type="text" name="nomS" 
                        placeholder="Entrer le nom du stagiaire" class="form-control" 
                        value="<?php echo $nomS ?>">
                    </div>
                    <button type="submit" class="btn btn-ro mt-2">
                        <span class="glyphicon glyphicon-search"></span>
                        Chercher
                    </button>
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    <a href="newTrainee.php" class="btn btn-main mt-2">
                        <span class="glyphicon glyphicon-plus"></span>
                        Nouveau stagiaire</a>
                </form>
            </div>
        </div>
        <div class="panel panel-p fromthetop2">
            <div class="panel-heading">Liste des Stagiaires &nbsp; (<?php echo $NBstagiaire?>Stagiaire)</div>
            <div class="panel-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>CIN stagiaire</th><th>Nom complet</th><th>Téléphone</th><th>Début du stage</th><th>Fin du stage</th><th>Niveau et domaine d'étude</th><th>Opération</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while($stagiaire=$resultStagiaire->fetch()){ ?>
                            <tr>
                                <td><?php echo $stagiaire['cin_Stagiaire']?></td>
                                <td><?php echo $stagiaire['Nom_Complet']?></td>
                                <td><?php echo $stagiaire['Telephone']?></td>
                                <td><?php echo $stagiaire['Date_DebutS']?></td>
                                <td><?php echo $stagiaire['Date_FinS']?></td>
                                <td><?php echo $stagiaire['NiveauDomaine_Etude']?></td>  
                                <td>
                                    <a href="editTrainee.php?cinSt=<?php echo $stagiaire['cin_Stagiaire']?>">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                    &nbsp;
                                    <a onclick="return confirm('Question: voulez-vous vraiment supprimer ce compte?')" 
                                    href="deleteTrainee.php?cinSt=<?php echo $stagiaire['cin_Stagiaire']?>">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                    &nbsp;
                                </td>   
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div>
                    <ul class="p">
                        <?php for($i=1; $i<=$NBpagina; $i++){ ?>
                            <li class=" <?php if($i == $pagina) echo 'active' ?> "> 
                                <a href="stagiaire.php?pagina=<?php echo $i;?>&nomS=<?php echo $nomS?>">
                                    <?php echo $i; ?></a>
                            </li>
                       <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html>