<?php

//include './Models/bug.php';
//include './Manager.php';
namespace BugApp\Models;

use BugApp\Models\Bug;
use BugApp\Models\Manager;

class BugManager extends Manager {
    private $Bugs = [];

    function __construct() {
        
    }

    function find($id) {// Affiche le bug selectionner
        /** Affiche le detail d'un bug */
        $dbh = $this->connectDb();
        $reponse = $dbh->query('SELECT * FROM `bug` WHERE `id` = ' . $id, \PDO::FETCH_ASSOC);
        
        if(!$reponse){
            //renvoyer vers le script index.php
            echo 'Redirection en cour ...';
            header('Location: index.php');
        } else { 
            while ($Donnee = $reponse->fetch()) {
                $bug = new Bug((int) 
                    $Donnee['id'], 
                    $Donnee['title'], 
                    $Donnee['descript'], 
                    $Donnee['statut'], 
                    $Donnee['datecrea'], 
                    $Donnee['nom_dom'], 
                    $Donnee['url'], 
                    $Donnee['ip']
                );
            }
            return $bug;
        }
    }

    function findAll() {//page principale, Affiche tous les bugs
        /** Affiche la liste complète des bugs */
        /* Connection a la BDD */        
        $dbh = $this->connectDb();        
        $reponse = $dbh->query('SELECT * FROM `bug` ORDER BY `id`', \PDO::FETCH_ASSOC);
        
        if(!$reponse){
            //renvoyer vers le script index.php
            echo 'Redirection en cour ...';
            header('Location: index.php');
        } else {
            while ($Donnee = $reponse->fetch()) {
                $bug = new Bug((int) 
                    $Donnee['id'], 
                    $Donnee['title'], 
                    $Donnee['descript'], 
                    $Donnee['statut'], 
                    $Donnee['datecrea'], 
                    $Donnee['nom_dom'], 
                    $Donnee['url'], 
                    $Donnee['ip']
                );
                array_push($this->Bugs, $bug);
                /*
                echo '<pre>';
                var_dump($bug);
                echo '</pre>';
                */
            }
            return $this->Bugs;
        }
    }

    function add($bug) {
        /** Ajoute un bug */
        $dbh = $this->connectDb();
        $req = $dbh->prepare('INSERT INTO bug(title, descript, statut, nom_dom, url,  ip) VALUES(:title, :descript, :statut, :nom_dom, :url, :ip)');
        var_dump($bug);
        $req->execute(array(
            'title'     => $bug->getTitle(),
            'descript'  => $bug->getDesc(),
            'statut'    => 0,
            'nom_dom'   => $bug->getNomDom(),
            'url'       => $bug->getUrl(),
            'ip'        => $bug->getIp()
        ));
        
    }

    function update($bug){
        /** Modifie un bug */
        $sql = 'UPDATE bug SET title = :title, descript = :descript, statut = :statut WHERE id = :id';
        $dbh = $this->connectDb();        
        $req = $dbh->prepare($sql);
        $req->execute([
            'title'     => $bug->getTitle(),
            'descript'  => $bug->getDesc(),
            'statut'    => $bug->getStatut(),
            'id'        => $bug->getId(),
        ]);
    }
    
    function findByStatus(){
        /** Envoie la liste des bug en cour */      
        $dbh = $this->connectDb();        
        $reponse = $dbh->query('SELECT * FROM `bug` WHERE statut = 0 ORDER BY `id`', \PDO::FETCH_ASSOC);
        
        if(!$reponse){
            echo 'Redirection en cour ...';
            header('Location: index.php');
        } else {
            while ($Donnee = $reponse->fetch()) {
                $bug = new Bug((int) 
                    $Donnee['id'], 
                    $Donnee['title'], 
                    $Donnee['descript'], 
                    $Donnee['statut'], 
                    $Donnee['datecrea'], 
                    $Donnee['nom_dom'], 
                    $Donnee['url'], 
                    $Donnee['ip']
                );
                array_push($this->Bugs, $bug);
            }
            return $this->Bugs;
        }
    }
}
?>