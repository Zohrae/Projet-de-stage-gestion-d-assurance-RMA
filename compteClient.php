<?php
    /*include("connexion.php");      ->copie le code comme il est et le rexecute. */
    //require('connexion.php');      ->cherche une instance puis la rexecute puis copie la resultat. */
    require_once("connexion.php"); /*->cherche une instance dans la memoire puis copie just le resultat de cette instance, cree l'objet PDO qui va nous connecter a la base de donnees.*/
    
    require_once('session.php');

    $cinCC=isset($_GET['cinCC'])?$_GET['cinCC']:"";
    $nomCC=isset($_GET['nomCC'])?$_GET['nomCC']:"";

    $size=isset($_GET['size'])?$_GET['size']:"8";
    $pagina=isset($_GET['pagina'])?$_GET['pagina']:"1";
    $offset=($pagina-1)*$size;


    $requete="select * from compteclient
        where CIN_C like '%$cinCC%'
        and Nom_Complet like '%$nomCC%' 
        limit $size
        offset $offset";
    
    $countingC="select count(*) countC from compteclient
        where CIN_C like '%$cinCC%'
        and Nom_Complet like '%$nomCC%'";

    $resultcompteclient=$pdo->query($requete);
    
    $resultCounting=$pdo->query($countingC);
    $countingTable=$resultCounting->fetch();
    $NBcompteclient=$countingTable['countC'];
    $mood=$NBcompteclient % $size;

    if($mood === 0)
        $NBpagina = $NBcompteclient / $size;
    else
        $NBpagina = floor($NBcompteclient / $size) + 1; //floor: la partie entiere

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Comptes</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/mistyle.css">

    <!-- icon -->
    <link rel="shortcut icon" type="image/x-icon" href="../theme/images/logolion2.png" />
    <link rel="stylesheet" href="../theme/css/btnStyle.css">

</head>

<body>
    <?php include("menuUser.php"); ?>

    <div class="container ">
        <div class="panel panel-pg fromthetop">
            <div class="panel-heading">Rechercher un compte ...</div>
            <div class="panel-body">
                <form method="get" action="compteclient.php" class="form-inline">
                    <div class="form-group">
                        N° CIN: <input type="text" name="cinCC" 
                        placeholder="Taper le N° CIN" 
                        class="form-control" value="<?php echo $cinCC ?>">
                    </div>
                    &nbsp;
                    <div class="form-group">
                        Nom: <input type="text" name="nomCC" 
                        placeholder="Taper le Nom" 
                        class="form-control" value="<?php echo $nomCC ?>">
                    </div>
                    <button type="submit" class="btn btn-ro mt-2">
                        <span class="glyphicon glyphicon-search"></span>
                        Chercher
                    </button>
                </form>
            </div>
        </div>

        <div class="panel panel-p fromthetop2">
            <div class="panel-heading">Liste des comptes &nbsp; (<?php echo $NBcompteclient?>Comptes)</div>
            <div class="panel-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID Compte</th><th>N° CIN</th><th>Nom Complet</th><th>Nom d'Utilisateur</th><th>Email</th><th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while($compteclient=$resultcompteclient->fetch()){ ?>
                            <tr>
                                <td><?php echo $compteclient['id_client']?></td>
                                <td><?php echo $compteclient['CIN_C']?></td>
                                <td><?php echo $compteclient['Nom_Complet']?></td>
                                <td><?php echo $compteclient['Username']?></td>
                                <td><?php echo $compteclient['Email_Client']?></td> 
                                <td>
                                    <a onclick="return confirm('Question: voulez-vous vraiment supprimer ce compte?')" 
                                    href="deletecompteclient.php?cinCC=<?php echo $compteclient['CIN_C']?>">
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
                                <a href="compteclient.php?pagina=<?php echo $i;?>&cinCC=<?php echo $cinCC?>&nomCC=<?php echo $nomCC?>">
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