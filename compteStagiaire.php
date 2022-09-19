<?php
    /*include("connexion.php");      ->copie le code comme il est et le rexecute. */
    //require('connexion.php');      ->cherche une instance puis la rexecute puis copie la resultat. */
    require_once("connexion.php"); /*->cherche une instance dans la memoire puis copie just le resultat de cette instance, cree l'objet PDO qui va nous connecter a la base de donnees.*/
    
    require_once('session.php');

    $cinSC=isset($_GET['cinSC'])?$_GET['cinSC']:"";
    $nomSC=isset($_GET['nomSC'])?$_GET['nomSC']:"";

    $size=isset($_GET['size'])?$_GET['size']:"8";
    $pagina=isset($_GET['pagina'])?$_GET['pagina']:"1";
    $offset=($pagina-1)*$size;


    $requete="select * from comptestagiaire
        where CIN_S like '%$cinSC%'
        and Nom_Complet like '%$nomSC%' 
        limit $size
        offset $offset";
    
    $countingC="select count(*) countC from comptestagiaire
        where CIN_S like '%$cinSC%'
        and Nom_Complet like '%$nomSC%'";

    $resultcomptestagiaire=$pdo->query($requete);
    
    $resultCounting=$pdo->query($countingC);
    $countingTable=$resultCounting->fetch();
    $NBcomptestagiaire=$countingTable['countC'];
    $mood=$NBcomptestagiaire % $size;

    if($mood === 0)
        $NBpagina = $NBcomptestagiaire / $size;
    else
        $NBpagina = floor($NBcomptestagiaire / $size) + 1; //floor: la partie entiere

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
                <form method="get" action="comptestagiaire.php" class="form-inline">
                    <div class="form-group">
                        N° CIN: <input type="text" name="cinSC" 
                        placeholder="Taper le N° CIN" 
                        class="form-control" value="<?php echo $cinSC ?>">
                    </div>
                    &nbsp;
                    <div class="form-group">
                        Nom: <input type="text" name="nomSC" 
                        placeholder="Taper le Nom" 
                        class="form-control" value="<?php echo $nomSC ?>">
                    </div>
                    <button type="submit" class="btn btn-ro mt-2">
                        <span class="glyphicon glyphicon-search"></span>
                        Chercher
                    </button>
                </form>
            </div>
        </div>

        <div class="panel panel-p fromthetop2">
            <div class="panel-heading">Liste des comptes &nbsp; (<?php echo $NBcomptestagiaire?>Compte)</div>
            <div class="panel-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID Compte</th><th>N° CIN</th><th>Nom Complet</th><th>Nom d'Utilisateur</th><th>Email</th><th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while($comptestagiaire=$resultcomptestagiaire->fetch()){ ?>
                            <tr>
                                <td><?php echo $comptestagiaire['id_stagiaire']?></td>
                                <td><?php echo $comptestagiaire['CIN_S']?></td>
                                <td><?php echo $comptestagiaire['Nom_Complet']?></td>
                                <td><?php echo $comptestagiaire['Username_Stagiaire']?></td>
                                <td><?php echo $comptestagiaire['Email_Stagiaire']?></td> 
                                <td>
                                    <a onclick="return confirm('Question: voulez-vous vraiment supprimer ce compte?')" 
                                    href="deletecomptestagiaire.php?cinSC=<?php echo $comptestagiaire['CIN_S']?>">
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
                                <a href="comptestagiaire.php?pagina=<?php echo $i;?>&cinSC=<?php echo $cinSC?>&nomSC=<?php echo $nomSC?>">
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