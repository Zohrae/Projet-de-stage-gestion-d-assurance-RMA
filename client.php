<?php
    /*include("connexion.php");      ->copie le code comme il est et le rexecute. */
    //require('connexion.php');      ->cherche une instance puis la rexecute puis copie la resultat. */
    require_once("connexion.php"); /*->cherche une instance dans la memoire puis copie just le resultat de cette instance, cree l'objet PDO qui va nous connecter a la base de donnees.*/
    
    require_once('session.php');

    $cinC=isset($_GET['cinC'])?$_GET['cinC']:"";
    $nomC=isset($_GET['nomC'])?$_GET['nomC']:"";

    $size=isset($_GET['size'])?$_GET['size']:"8";
    $pagina=isset($_GET['pagina'])?$_GET['pagina']:"1";
    $offset=($pagina-1)*$size;


    $requete="select * from client
        where CIN_Client like '%$cinC%'
        and Nom_Complet like '%$nomC%' 
        limit $size
        offset $offset";
    
    $countingC="select count(*) countC from client
        where CIN_Client like '%$cinC%'
        and Nom_Complet like '%$nomC%'";

    $resultClient=$pdo->query($requete);
    
    $resultCounting=$pdo->query($countingC);
    $countingTable=$resultCounting->fetch();
    $NBclient=$countingTable['countC'];
    $mood=$NBclient % $size;

    if($mood === 0)
        $NBpagina = $NBclient / $size;
    else
        $NBpagina = floor($NBclient / $size) + 1; //floor: la partie entiere

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Clients</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/mistyle.css">

    <!-- icon -->
    <link rel="shortcut icon" type="image/x-icon" href="../theme/images/logolion2.png" />
    <link rel="stylesheet" href="../theme/css/btnStyle.css">

</head>

<body>
    <?php include("menu.php"); ?>

    <div class="container ">
        <div class="panel panel-pg fromthetop">
            <div class="panel-heading">Rechercher un client ...</div>
            <div class="panel-body">
                <form method="get" action="client.php" class="form-inline">
                    <div class="form-group">
                        N° CIN: <input type="text" name="cinC" 
                        placeholder="Taper le N° CIN" 
                        class="form-control" value="<?php echo $cinC ?>">
                    </div>
                    &nbsp;
                    <div class="form-group">
                        Nom: <input type="text" name="nomC" 
                        placeholder="Taper le Nom" 
                        class="form-control" value="<?php echo $nomC ?>">
                    </div>
                    <button type="submit" class="btn btn-ro mt-2">
                        <span class="glyphicon glyphicon-search"></span>
                        Chercher
                    </button>
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    <a href="newClient.php" class="btn btn-main mt-2">
                        <span class="glyphicon glyphicon-plus"></span>
                        Nouveau client</a>
                </form>
            </div>
        </div>

        <div class="panel panel-p fromthetop2">
            <div class="panel-heading">Liste des Clients &nbsp; (<?php echo $NBclient?>Clients)</div>
            <div class="panel-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>N° CIN</th><th>Nom Complet</th><th>Ville</th><th>Téléphone</th><th>Gender</th><th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while($client=$resultClient->fetch()){ ?>
                            <tr>
                                <td><?php echo $client['CIN_Client']?></td>
                                <td><?php echo $client['Nom_Complet']?></td>
                                <td><?php echo $client['Ville']?></td>
                                <td><?php echo $client['Telephone']?></td> 
                                <td><?php echo $client['Gender']?></td> 
                                <td>
                                    <a href="editClient.php?cinC=<?php echo $client['CIN_Client']?>">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                    &nbsp;
                                    <a onclick="return confirm('Question: voulez-vous vraiment supprimer ce compte?')" 
                                    href="deleteClient.php?cinC=<?php echo $client['CIN_Client']?>">
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
                                <a href="client.php?pagina=<?php echo $i;?>&cinC=<?php echo $cinC?>&nomC=<?php echo $nomC?>">
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