<?php
    require_once("connexion.php"); 
    require_once('session.php');


    $nomD=isset($_GET['nomD'])?$_GET['nomD']:"";

    $size=isset($_GET['size'])?$_GET['size']:"8";
    $pagina=isset($_GET['pagina'])?$_GET['pagina']:"1";
    $offset=($pagina-1)*$size;

    $requete="select * from demande
        where Nom_Stagiare like '%$nomD%'
        limit $size
        offset $offset";

    $countinS="select count(*) countD from demande
    where Nom_Stagiare like '%$nomD%'";

    $resultDemande=$pdo->query($requete);

    $resultCounting=$pdo->query($countinS);
    $countingTable=$resultCounting->fetch();
    $NBdemande=$countingTable['countD'];
    $mood=$NBdemande % $size;

    if($mood === 0)
        $NBpagina = $NBdemande / $size;
    else
        $NBpagina = floor($NBdemande / $size) + 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Demandes</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/mistyle.css">
    <link rel="stylesheet" href="../theme/css/btnStyle.css">

    <!-- icon -->
    <link rel="shortcut icon" type="image/x-icon" href="../theme/images/logolion2.png" />

</head>

<body>
    <?php include("menu.php"); ?>

    <div class="container">
        <div class="panel panel-pg fromthetop">
            <div class="panel-heading">Rechercher une demande ...</div>
            <div class="panel-body">
                <form method="get" action="demande.php" class="form-inline">
                    <div class="form-group">
                        Nom: <input type="text" name="nomD" 
                        placeholder="Taper le Nom du stagiaire" class="form-control" 
                        value="<?php echo $nomD ?>">
                    </div>
                    <button type="submit" class="btn btn-ro mt-2">
                        <span class="glyphicon glyphicon-search"></span>
                        Chercher
                    </button>
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    <a href="newDemande.php" class="btn btn-main mt-2">
                        <span class="glyphicon glyphicon-plus"></span>
                        Nouvelle demande</a>
                </form>
            </div>
        </div>
        <div class="panel panel-p fromthetop2">
            <div class="panel-heading">Liste des Demandes &nbsp; (<?php echo $NBdemande?>Demandes)</div>
            <div class="panel-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>N° de demande</th><th>CIN Stagiaire</th><th>Nom complet</th><th>Date de demande</th><th>Description</th><th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while($demande=$resultDemande->fetch()){ ?>
                            <tr>
                                <td><?php echo $demande['Id_Demande']?></td>
                                <td><?php echo $demande['cin_Stagiaire']?></td>
                                <td><?php echo $demande['Nom_Stagiare']?></td>
                                <td><?php echo $demande['Date_Demande']?></td>
                                <td><?php echo $demande['Description_Demande']?></td>
                                <td>
                                    <a onclick="return confirm('Question: voulez-vous vraiment supprimer cette demande?')" 
                                        href="deleteDemande.php?idD=<?php echo $demande['Id_Demande']?>">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                    &nbsp;
                                    <a href="checkedDemande.php?idD=<?php echo $demande['Id_Demande']?>">
                                        <?php
                                            if($demande['Etat_Demande']==1)
                                            echo '<span class="glyphicon glyphicon-check"></span>';
                                            else 
                                            echo '<span class="glyphicon glyphicon-hourglass"></span>';
                                         ?>
                                    </a>
                                </td> 
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div>
                    <ul class="p">
                        <?php for($i=1; $i<=$NBpagina; $i++){ ?>
                            <li class=" <?php if($i == $pagina) echo 'active' ?> "> 
                                <a href="demande.php?pagina=<?php echo $i;?>&nomD=<?php echo $nomD?>">
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