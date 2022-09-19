<?php
     
    require_once("connexion.php"); 
    require_once('session.php');


    $cin=isset($_GET['cin'])?$_GET['cin']:"";
    $typeC=isset($_GET['typeC'])?$_GET['typeC']:"all";

    $size=isset($_GET['size'])?$_GET['size']:"8";
    $pagina=isset($_GET['pagina'])?$_GET['pagina']:"1";
    $offset=($pagina-1)*$size;

    if($typeC == "all"){
        $requete="select * from cheque
            where CIN_Client like '%$cin%'
            limit $size
            offset $offset";

        $countingC="select count(*) countC from cheque
        where CIN_Client like '%$cin%'";

    }else{
        $requete="select * from cheque
            where CIN_Client like '%$cin%'
            and Type_Cheque like '%$typeC%' 
            limit $size
            offset $offset";

            $countingC="select count(*) countC from cheque
            where CIN_Client like '%$cin%'
            and Type_Cheque like '%$typeC%' ";
    }

    $resultCheque=$pdo->query($requete);

    $resultCounting=$pdo->query($countingC);
    $countingTable=$resultCounting->fetch();
    $NBcheque=$countingTable['countC'];
    $mood=$NBcheque % $size;

    if($mood === 0)
    $NBpagina = $NBcheque / $size;
    else
    $NBpagina = floor($NBcheque / $size) + 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Chéques</title>
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
            <div class="panel-heading">Rechercher un chéque ...</div>
            <div class="panel-body">
            <form method="get" action="cheque1.php" class="form-inline">
                    <div class="form-group">
                        N° CIN: <input type="text" name="cin" 
                        placeholder="Taper le N° CIN du client" class="form-control" 
                        value="<?php echo $cin ?>">
                    </div>   
                    &nbsp;
                    <label for="typeC">Type:</label>
                    <select name="typeC" class="form-control" id="typeC"  onchange="this.form.submit()">
                        <option value="all" <?php if($typeC === "all") echo"selected" ?>>Tous les chéques</option>   
                        <option value="Barré" <?php if($typeC == "Barré") echo"selected" ?>>Barré</option>   
                        <option value="Confirmé" <?php if($typeC == "Confirmé") echo"selected" ?>>Confirmé</option>   
                        <option value="Certifié" <?php if($typeC === "Certifié") echo"selected" ?>>Certifié</option>  
                        <option value="Chèque de banque" <?php if($typeC === "Chèque de banque") echo"selected" ?>>Chèque de banque</option>    
                    </select>
                    
                    <button type="submit" class="btn btn-ro mt-2">
                        <span class="glyphicon glyphicon-search"></span>
                        Chercher
                    </button>
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                    <a href="newCheque.php" class="btn btn-main mt-2">
                        <span class="glyphicon glyphicon-plus"></span>
                        Nouveau chéque</a>
                </form>
            </div>
        </div>
        <div class="panel panel-p fromthetop2">
            <div class="panel-heading">Liste des Chéques &nbsp; (<?php echo $NBcheque?>Chéques)</div>
            <div class="panel-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>N° de Chéque</th><th>N° CIN</th><th>Nom Complet</th><th>Prix</th><th>Date</th><th>Type</th><th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while($cheque=$resultCheque->fetch()){ ?>
                            <tr>
                                <td><?php echo $cheque['Num_Cheque']?></td>
                                <td><?php echo $cheque['CIN_Client']?></td>
                                <td><?php echo $cheque['Nom_Assure']?></td>
                                <td><?php echo $cheque['Prix']?></td>
                                <td><?php echo $cheque['Date_Cheque']?></td>
                                <td><?php echo $cheque['Type_Cheque']?></td> 
                                <td>
                                    <a href="editCheque.php?numC=<?php echo $cheque['Num_Cheque']?>">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                    &nbsp;
                                    <a onclick="return confirm('Question: voulez-vous vraiment supprimer ce chéque?')" 
                                    href="deleteCheque.php?numC=<?php echo $cheque['Num_Cheque']?>">
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
                                <a href="cheque1.php?pagina=<?php echo $i;?>&cin=<?php echo $cin?>typeC=<?php echo $typeC?>">
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