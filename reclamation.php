<?php
    require_once("connexion.php");
    require_once('session.php');

    
    $cinR=isset($_GET['cinR'])?$_GET['cinR']:"";
    $nomR=isset($_GET['nomR'])?$_GET['nomR']:"";

    $size=isset($_GET['size'])?$_GET['size']:"8";
    $pagina=isset($_GET['pagina'])?$_GET['pagina']:"1";
    $offset=($pagina-1)*$size;


    $requete="select * from reclamation
        where CIN_Client like '%$cinR%'
        and Nom_Client like '%$nomR%' 
        limit $size
        offset $offset";

    $countinR="select count(*) countR from reclamation
    where CIN_Client like '%$cinR%'
    and Nom_Client like '%$nomR%'";
    
    $resultReclamation=$pdo->query($requete);

    $resultCounting=$pdo->query($countinR);
    $countingTable=$resultCounting->fetch();
    $NBrec=$countingTable['countR'];
    $mood=$NBrec % $size;

    if($mood === 0)
        $NBpagina = $NBrec / $size;
    else
        $NBpagina = floor($NBrec / $size) + 1; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Réclamations</title>
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
            <div class="panel-heading">Rechercher une réclamation ...</div>
            <div class="panel-body">
                <form method="get" action="reclamation.php" class="form-inline">
                    <div class="form-group">
                        N° CIN: <input type="text" name="cinR" 
                        placeholder="Entrer un N° CIN" 
                        class="form-control" value="<?php echo $cinR ?>">
                    </div>
                    &nbsp;
                    <div class="form-group">
                        Nom: <input type="text" name="nomR" 
                        placeholder="Entrer un Nom" 
                        class="form-control" value="<?php echo $nomR ?>">
                    </div>
                    <button type="submit" class="btn btn-ro mt-2">
                        <span class="glyphicon glyphicon-search"></span>
                        Chercher
                    </button>
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                     &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                    <a href="newReclamation.php" class="btn btn-main mt-2">
                        <span class="glyphicon glyphicon-plus"></span>
                        Nouvelle réclamation</a>
                </form>
            </div>
        </div>
        <div class="panel panel-p fromthetop2">
            <div class="panel-heading">Liste des Réclamations &nbsp; (<?php echo $NBrec?>Réclamations)</div>
            <div class="panel-body">
                <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>N° de Réclamation</th><th>N° CIN</th><th>Nom Complet</th><th>Date de Réclamation</th><th>Description</th><th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php while($reclamation=$resultReclamation->fetch()){ ?>
                                <tr>
                                    <td><?php echo $reclamation['Num_Reclamation']?></td>                        
                                    <td><?php echo $reclamation['CIN_Client']?></td> 
                                    <td><?php echo $reclamation['Nom_Client']?></td>                        
                                    <td><?php echo $reclamation['Date_Reclamation']?></td>  
                                    <td><?php echo $reclamation['Description_Rec']?></td>    
                                    <td>
                                    <a href="editReclamation.php?numR=<?php echo $reclamation['Num_Reclamation']?>">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                    &nbsp;
                                    <a onclick="return confirm('Question: voulez-vous vraiment supprimer cette réclamation?')" 
                                    href="deleteReclamation.php?numR=<?php echo $reclamation['Num_Reclamation']?>">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                    &nbsp;
                                    <a href="checkedReclamation.php?numR=<?php echo $reclamation['Num_Reclamation']?>">
                                        <?php
                                            if($reclamation['Etat_Reclamation']==1)
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
                                <a href="reclamation.php?pagina=<?php echo $i;?>&cinR=<?php echo $cinR?>&nomR=<?php echo $nomR?>">
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