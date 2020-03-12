<?php 
namespace BugApp\Models;

    class Bug {
    public $Id;
    public $Title;    
    public $Desc;    
    public $Statut;
    public $dateCrea;
    public $NomDom;
    public $Ip;

    /*************************************************************/
    function getId() {
        return $this->Id;
    }

    function getTitle() {
        return $this->Title;
    }

    function getDesc() {
        return $this->Desc;
    }

    function getStatut() {
        return $this->Statut;
    }

    function getDateCrea() {
        return $this->dateCrea;
    }

    function getNomDom() {
        return $this->NomDom;
    }

    function getUrl() {
        return $this->Url;
    }

    function getIp() {
        return $this->Ip;
    }

    function setId($Id) {
        $this->Id = $Id;
    }

    function setTitle($Title) {
        $this->Title = $Title;
    }

    function setDesc($Desc) {
        $this->Desc = $Desc;
    }

    function setStatut($Statut) {
        $this->Statut = $Statut;
    }

    function setDateCrea($dateCrea) {
        $this->dateCrea = $dateCrea;
    }

    function setNomDom($NomDom) {
        $this->NomDom = $NomDom;
    }

    function setUrl($Url) {
        $this->Url = $Url;
    }

    function setIp($Ip) {
        $this->Ip = $Ip;
    }

    function __construct($Id, $Title, $Desc, $Statut, $dateCrea, $NomDom, $Url, $Ip) {
        $this->Id       = $Id;
        $this->Title    = $Title;
        $this->Desc     = $Desc;
        $this->Statut   = $Statut;
        $this->dateCrea = $dateCrea;
        $this->NomDom   = $NomDom;
        $this->Url      = $Url;
        $this->Ip       = $Ip;
    }    
}
?>