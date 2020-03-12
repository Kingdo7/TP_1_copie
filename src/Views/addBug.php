<?php
use BugApp\Models\bugManager;
//require_once'./Models/bugManager.php';

if (isset($_POST['add_Title'])) {
    $manager = new BugManager();
    $manager->add($_POST);
    
//echo 'Redirection en cour ...';
header('Location: ../src/Views/list');
echo '<br>'?>
<a class="button" href="list">Retour</a>
<?php
} else { 
    ?>
    <html>
        <link rel="stylesheet" href="./src/Ressources/style.css"/>
        <body>
            <form method="post" action="">
                <table>
                    <thead>
                        <tr>
                            <th colspan="2">Ajouter un bug</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Titre du bug</th>
                            <td><input type="text" name="add_Title" placeholder="Titre" required></td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td><textarea name="add_Desc" rows="8" cols="45" placeholder="Votre description ici." required></textarea></td>
                        </tr>
                        <!--
                        <tr>
                            <th>Nom de domaine</th>
                            <td><input type="text" name="add_NomDom" required></td>
                        </tr>
                        -->
                        <tr>
                            <th>URL</th>
                            <td><input type="text" name="add_url" placeholder="url" required></td>
                        </tr>
                    </tbody>
                </table>
                <input type="hidden" name="submit" value="ok">
                <input type="submit" value="Valider">
            </form>
            <a class="button" href="list">Retour</a>
        </body>
    </html>
    <?php
}?>