<?php
$bugs = $parametres['bugs'];
//var_dump($parametres['bugs']);

/*
echo '<pre>';
var_dump($_SERVER);//check URI pour l'url
echo '</pre>';
 */
?>
<html>
    <link rel="stylesheet" href="./src/Ressources/style.css"/>
    <head><title>Kingdo Bugs</title></head>
    <body>
        <h1>liste de bugs</h1>
        <ul>
            <table>
                <thead>
                    <tr>
                        <th colspan=3>filtre</th>
                        <td colspan=2><input type="checkbox" class="filtre" checked></td>                        
                    </tr>
                    <tr><td colspan=5><a class="button" href="add">Ajouter un bug</a></td></tr>
                    <tr>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Statut</th>
                        <th>Voir</th>
                        <th>Edition</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($bugs as $bug) {
                        $i = $bug->getId();
                        ?>
                        <tr class='rowBug' id='bug_<?php echo $i;?>'>                        
                            <td><?php echo $bug->getId() ?></td>
                            <td><?php echo $bug->getTitle() ?></td>
                            <td class='status'><?php if($bug->getStatut() == 0){?><a class='trigger' href="#"><?php echo "En cour";?></a><?php } else {?><span><?php echo "Terminer";?></span><?php } ?></td>
                            <td><a class="button" href="show/<?php echo $i;?>">Détails</a></td>
                            <td><a class="update" href="edit/<?php echo $i;?>">Editer</a></td>
                        </tr>
                    <?php 
                    } ?>                
                </tbody>
            </table>
        </ul>
        <script type="text/javascript" src="./src/Ressources/ajax.js"></script>
    </body>
</html>