<?php

include_once 'UtilisateurEntity.php';
include_once 'LieuEntity.php';
class EtablissementEntity {
    private $id;
    private $nom;
    private $desc;
    private $img;
    private $lieu;
    private $resp;
    
    
    function __construct() {
        
    }
    
    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getDesc() {
        return $this->desc;
    }

    public function getImg() {
        return $this->img;
    }

    public function getLieu() {
        return $this->lieu;
    }

    public function getResp() {
        return $this->resp;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setDesc($desc) {
        $this->desc = $desc;
    }

    public function setImg($img) {
        $this->img = $img;
    }

    public function setLieu(LieuEntity $lieu) {
        $this->lieu = $lieu;
    }

    public function setResp(UtilisateurEntity $resp) {
        $this->resp = $resp;
    }



}

?>
