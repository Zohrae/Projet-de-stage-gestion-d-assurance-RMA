<?php
    require_once("connexion.php"); 
    require_once('session.php');


    $cinB=isset($_GET['cinB'])?$_GET['cinB']:"";
    $nomB=isset($_GET['nomB'])?$_GET['nomB']:"";

    $size=isset($_GET['size'])?$_GET['size']:"8";
    $pagina=isset($_GET['pagina'])?$_GET['pagina']:"1";
    $offset=($pagina-1)*$size;

    $requete="select * from bordereau
        where CIN_Client like '%$cinB%'
        and Nom_Assure like '%$nomB%' 
        limit $size
        offset $offset";

    $countinB="select count(*) countB from bordereau
    where CIN_Client like '%$cinB%'
    and Nom_Assure like '%$nomB%'";

    $resultBordereau=$pdo->query($requete);

    $resultCounting=$pdo->query($countinB);
    $countingTable=$resultCounting->fetch();
    $NBbordereau=$countingTable['countB'];
    $mood=$NBbordereau % $size;

    if($mood === 0)
        $NBpagina = $NBbordereau / $size;
    else
        $NBpagina = floor($NBbordereau / $size) + 1; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Bordereaux</title>
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
            <div class="panel-heading">Rechercher un bordereau ...</div>
            <div class="panel-body">
                <form method="get" action="bordereau.php" class="form-inline">
                    <div class="form-group">
                        N° CIN: <input type="text" name="cinB" 
                        placeholder="Taper le N° CIN du client" class="form-control" 
                        value="<?php echo $cinB ?>">
                    </div>   
                    &nbsp;
                    <div class="form-group">
                        Nom: <input type="text" name="nomB" 
                        placeholder="Taper le Nom du client" class="form-control" 
                        value="<?php echo $nomB ?>">
                    </div>
                    <button type="submit" class="btn btn-ro mt-2">
                        <span class="glyphicon glyphicon-search"></span>
                        Chercher
                    </button>
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                    <a href="newBordereau.php" class="btn btn-main mt-2">
                        <span class="glyphicon glyphicon-plus"></span>
                        Nouveau bordereau</a>
                </form>
            </div>
        </div>

        <div class="panel panel-p fromthetop2">
            <div class="panel-heading">Liste des Bordereaux &nbsp; (<?php echo $NBbordereau?>Bordereaux)</div>
            <div class="panel-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>N° de Bordereau</th><th>N° CIN</th><th>N° de Police</th><th>Nom du Client</th><th>Usage</th><th>Durée</th><th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while($bordereau=$resultBordereau->fetch()){ ?>
                            <tr>
                                <td><?php echo $bordereau['Num_bordereau']?></td>
                                <td><?php echo $bordereau['CIN_Client']?></td>
                                <td><?php echo $bordereau['Num_Police']?></td>
                                <td><?php echo $bordereau['Nom_Assure']?></td>
                                <td><?php echo $bordereau['Usage_B']?></td>
                                <td><?php echo $bordereau['Duree']?></td>  
                                <td>
                                    <a href="editBordereau.php?numB=<?php echo $bordereau['Num_bordereau']?>">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                    &nbsp;
                                    <a onclick="return confirm('Question: voulez-vous vraiment supprimer ce bordereau?')" 
                                        href="deleteBordereau.php?numB=<?php echo $bordereau['Num_bordereau']?>">
                                        <span class="glyphicon glyphicon-trash"></span>
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
                                <a href="bordereau.php?pagina=<?php echo $i;?>&cinB=<?php echo $cinB?>&nomB=<?php echo $nomB?>">
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