<?php
namespace BugApp\Models;

class Manager {
    function connectDb(){        
        require 'params.php';
        
        try {
            $dbh = new \PDO('mysql:host=localhost;dbname='. $bdd_nom . ';charset=utf8', $login, $password);
            $dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\Exception $e) {
            die('Erreur de connection' /*. ' : ' . $e->getMessage()*/);
        }        
        return $dbh;
    }
}
?>