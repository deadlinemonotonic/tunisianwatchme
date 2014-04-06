<?php
include_once 'DocumentEntity.php';
class ReclamationEntity {

    private $id;
    private $date;
    private $heure;
    private $description;
    private $titre;
    private $citoyen;
    private $domaine;
    private $etat;
    private $geolocalisation;
    private $lieu;
    private $documents;

    function __construct() {
        $documents =  array();
    }

    public function getDocuments() {
        return $this->documents;
    }

    public function setDocuments($documents) {
        $this->documents = $documents;
    }
    
    public function getId() {
        return $this->id;
    }

    public function getDate() {
        return $this->date;
    }

    public function getHeure() {
        return $this->heure;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getTitre() {
        return $this->titre;
    }

    public function getCitoyen() {
        return $this->citoyen;
    }

    public function getdomaine() {
        return $this->domaine;
    }

    public function getEtat() {
        return $this->etat;
    }

    public function getGeolocalisation() {
        return $this->geolocalisation;
    }

    public function getlieu() {
        return $this->lieu;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function setHeure($heure) {
        $this->heure = $heure;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setTitre($titre) {
        $this->titre = $titre;
    }

    public function setCitoyen(UtilisateurEntity $citoyen) {
        $this->citoyen = $citoyen;
    }

    public function setdomaine(DomaineEntity $domaine) {
        $this->domaine = $domaine;
    }

    public function setEtat($etat) {
        $this->etat = $etat;
    }

    public function setGeolocalisation(GeolocalisationEntity $geolocalisation) {
        $this->geolocalisation = $geolocalisation;
    }
    
    public function addDocument(DocumentEntity $document){
        $this->documents[] = $document;
    }

    public function setlieu(LieuEntity $lieu) {
        $this->lieu = $lieu;
    }
    
    public function __toString() {
        return $this->domaine.' '. $this->description;
    }
    
}

?>