<?php
    require_once("connexion.php"); 
    require_once('session.php');


    $policeA=isset($_GET['policeA'])?$_GET['policeA']:"";
    $Etat=isset($_GET['Etat'])?$_GET['Etat']:"all";

    $size=isset($_GET['size'])?$_GET['size']:"8";
    $pagina=isset($_GET['pagina'])?$_GET['pagina']:"1";
    $offset=($pagina-1)*$size;

    if($Etat == "all"){
        $requete="select * from assurance
            where Num_Police like '%$policeA%'
            limit $size
            offset $offset";

        $countingA="select count(*) countA from assurance
            where Num_Police like '%$policeA%'";

    }else{
        $requete="select * from assurance
            where Num_Police like '%$policeA%'
            and Etat = '$Etat' 
            limit $size
            offset $offset";

        $countingA="select count(*) countA from assurance
            where Num_Police like '%$policeA%'
            and Etat = '$Etat'";
    }

    $resultAssurance=$pdo->query($requete);
    
    $resultCounting=$pdo->query($countingA);
    $countingTable=$resultCounting->fetch();
    $NBassurance=$countingTable['countA'];
    $mood=$NBassurance % $size;

    if($mood === 0)
        $NBpagina = $NBassurance / $size;
    else
        $NBpagina = floor($NBassurance / $size) + 1; //floor: la partie entiere

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Assurances</title>
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
            <div class="panel-heading">Rechercher une assurance ...</div>
            <div class="panel-body">
                <form method="get" action="assurance.php" class="form-inline">
                    <div class="form-group">
                        N° Police: <input type="text" name="policeA" 
                        placeholder="Taper le N° de Police" class="form-control" 
                        value="<?php echo $policeA ?>">
                    </div>   
                    &nbsp;
                    <label for="Etat">Etat:</label>
                    <select name="Etat" class="form-control" id="Etat"  onchange="this.form.submit()">
                        <option value="all" <?php if($Etat === "all") echo"selected" ?>>Tous les états</option>   
                        <option value="Remplacement" <?php if($Etat === "Remplacement") echo"selected" ?>>Remplacement</option>   
                        <option value="Renouvelement" <?php if($Etat === "Renouvelement") echo"selected" ?>>Renouvelement</option>   
                        <option value="Nouvelle Contrat" <?php if($Etat === "Nouvelle Contrat") echo"selected" ?>>Nouvelle Contrat</option>   
                    </select>
                    
                    <button type="submit" class="btn btn-ro mt-2">
                        <span class="glyphicon glyphicon-search"></span>
                        Chercher
                    </button>
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    <a href="newAssurance.php" class="btn btn-main mt-2"> 
                        <span class="glyphicon glyphicon-plus"></span>
                        Nouvelle assurance</a>
                </form>
            </div>
        </div>
        <div class="panel panel-p fromthetop2">
            <div class="panel-heading">Liste des Assurances &nbsp; (<?php echo $NBassurance?>Assurances)</div>
            <div class="panel-body">
                <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                            <th>N° de Police</th><th>N° CIN</th><th>Nom Complet</th><th>Tarif</th><th>Type d'Assurance</th><th>Debut de l'Assurance</th><th>Fin de l'Assurance</th><th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php while($assurance=$resultAssurance->fetch()){ ?>
                                <tr>
                                    <td><?php echo $assurance['Num_Police']?></td>
                                    <td><?php echo $assurance['CIN_Client']?></td>
                                    <td><?php echo $assurance['Nom_Assure']?></td>
                                    <td><?php echo $assurance['Tarif']?></td>
                                    <td><?php echo $assurance['Etat']?></td>
                                    <td><?php echo $assurance['Date_Debut']?></td>
                                    <td><?php echo $assurance['Date_fin']?></td> 
                                    <td>
                                        <a href="editAssurance.php?policeA=<?php echo $assurance['Num_Police']?>">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        &nbsp;
                                        <a onclick="return confirm('Question: voulez-vous vraiment supprimer cette assurance?')" href="deleteAssurance.php?policeA=<?php echo $assurance['Num_Police']?>">
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
                                <a href="assurance.php?pagina=<?php echo $i;?>&policeA=<?php echo $policeA?>&Etat=<?php echo $Etat?>">
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