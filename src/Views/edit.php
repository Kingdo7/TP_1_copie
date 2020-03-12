<?php
use BugApp\Models\bugManager;
//require_once'./Models/bugManager.php';
$bug = $parametres['bug'];

if (isset($_POST['add_Title']) && $_POST['add_Title'] != $bug->getTitle()
    || isset($_POST['add_Desc']) && $_POST['add_Desc'] != $bug->getDesc()) {
    $manager = new BugManager();
    $manager->add($_POST);
    
//echo 'Redirection en cour ...';
header('Location: ../src/Views/list');
echo '<br>';
//echo 'view';
?>
<a class="button" href="../src/list">Retour</a>
<?php
} else {   ?>
    <html>
        <link rel="stylesheet" href="../src/Ressources/style.css"/>
        <body>
            <form method="post" action="">
                <table>
                    <thead>
                        <tr>
                            <th colspan="2">Editer un bug</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Titre du bug</th>
                            <td><input type="text" name="add_Title" value="<?php echo $bug->getTitle(); ?>"></td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td><textarea name="add_Desc" rows="8" cols="45" placeholder="Votre description ici."><?php echo $bug->getDesc();?></textarea></td>
                        </tr>
                    </tbody>
                </table>
                <input type="submit" value="Valider">
            </form>
            <a class="button" href="../list">Retour</a>
        </body>
    </html>
    <?php
}?>