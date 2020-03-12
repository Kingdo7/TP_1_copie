<?php

require 'params.php';

try {
    $dbh = new PDO('mysql:host=localhost;dbname='. $bdd_nom . ';charset=utf8', $login, $password);
    
    } catch (Exception $e) {
	die('Erreur de connection '/*. $e->getMessage()*/);
}
?>
