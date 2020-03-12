<?php
/*
$Bugs = [];
$id = $_GET['id'];
/*
$bugManager = new BugManager($Bugs);
$bug = $bugManager->find($id);
 */
$bug = $parametres['bug'];
?>
<html>
    <link rel="stylesheet" href="../src/Ressources/style.css"/>
    <head>
        <title>Détails</title>
    </head>
    <body>
        <div>
        <h1><?php echo $bug->getTitle(); ?></h1>
        <?php echo $bug->getdatecrea() . '<br><br>'; ?>
        <h3>Description</h3>
        <?php echo $bug->getDesc() . '<br>';?>
        <h3>Nom de Domaine</h3>
        <?php echo $bug->getNomDom() . '<br>';?>
        <h3>URL</h3>
        <?php echo $bug->getUrl() . '<br>';?>
        <h3>IP</h3>
        <?php echo $bug->getIp() . '<br>';?>
        <h3>Statut</h3>
        <?php echo $bug->getStatut() . '<br><br>'; ?>
        </div>
    </body>
    <a class="button" href="../list">Retour</a>
    
</html>