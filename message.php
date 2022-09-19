<?php
    require_once("connexion.php"); 
    require_once('session.php');


    $nomCM=isset($_GET['nomCM'])?$_GET['nomCM']:"";

    $size=isset($_GET['size'])?$_GET['size']:"8";
    $pagina=isset($_GET['pagina'])?$_GET['pagina']:"1";
    $offset=($pagina-1)*$size;

    $requete="select * from message
        where Nom_C like '%$nomCM%'
        limit $size
        offset $offset";

    $countinS="select count(*) countM from message
    where Nom_C like '%$nomCM%'";

    $resultmessage=$pdo->query($requete);

    $resultCounting=$pdo->query($countinS);
    $countingTable=$resultCounting->fetch();
    $NBmessage=$countingTable['countM'];
    $mood=$NBmessage % $size;

    if($mood === 0)
        $NBpagina = $NBmessage / $size;
    else
        $NBpagina = floor($NBmessage / $size) + 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Messages</title>
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
            <div class="panel-heading">Rechercher une message ...</div>
            <div class="panel-body">
                <form method="get" action="message.php" class="form-inline">
                    <div class="form-group">
                        Nom: <input type="text" name="nomCM" 
                        placeholder="Taper un Nom" class="form-control" 
                        value="<?php echo $nomCM ?>">
                    </div>
                    <button type="submit" class="btn btn-ro mt-2">
                        <span class="glyphicon glyphicon-search"></span>
                        Chercher
                    </button>
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    
                        <a href="contact.php" class="btn btn-main mt-2">
                            <span class="glyphicon glyphicon-plus"></span> 
                        Nouveau message</a>
                </form>
            </div>
        </div>
        <div class="panel panel-p fromthetop2">
            <div class="panel-heading">Liste des messages &nbsp; (<?php echo $NBmessage?>Messages)</div>
            <div class="panel-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>N° de Message</th><th>Nom</th><th>Email</th><th>N° de Téléphone</th><th>Message</th><th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while($message=$resultmessage->fetch()){ ?>
                            <tr>
                                <td><?php echo $message['ID_message']?></td>
                                <td><?php echo $message['Nom_C']?></td>
                                <td><?php echo $message['Email_C']?></td>
                                <td><?php echo $message['Num_C']?></td>
                                <td><?php echo $message['Message_C']?></td>
                                <td>
                                    <a onclick="return confirm('Question: voulez-vous vraiment supprimer ce message?')" 
                                        href="deleteMessage.php?idM=<?php echo $message['ID_message']?>">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                    &nbsp;
                                    <a href="checkedMessage.php?idM=<?php echo $message['ID_message']?>">
                                        <?php
                                            if($message['Etat_Message']==1)
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
                                <a href="message.php?pagina=<?php echo $i;?>&nomCM=<?php echo $nomCM?>">
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