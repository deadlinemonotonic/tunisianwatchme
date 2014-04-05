<?php
include_once 'EtablissementEntity.php';
class UtilisateurEntity {

    private $etablissement;
    private $id;
    private $nom;
    private $prenom;
    private $photo;
    private $sexe;
    private $adress;
    private $login;
    private $mdp;
    private $mail;
    private $type;
    private $datenaissance;

    public function getEtablissement() {
        return $this->etablissement;
    }

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getPhoto() {
        return $this->photo;
    }

    public function getSexe() {
        return $this->sexe;
    }

    public function getAdress() {
        return $this->adress;
    }

    public function getLogin() {
        return $this->login;
    }

    public function getMdp() {
        return $this->mdp;
    }

    public function getMail() {
        return $this->mail;
    }

    public function getType() {
        return $this->type;
    }

    public function getDatenaissance() {
        return $this->datenaissance;
    }

    public function setEtablissement($etablissement) {
        $this->etablissement = $etablissement;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function setPhoto($photo) {
        $this->photo = $photo;
    }

    public function setSexe($sexe) {
        $this->sexe = $sexe;
    }

    public function setAdress($adress) {
        $this->adress = $adress;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function setMdp($mdp) {
        $this->mdp = $mdp;
    }

    public function setMail($mail) {
        $this->mail = $mail;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setDatenaissance($datenaissance) {
        $this->datenaissance = $datenaissance;
    }

    function __construct() {
        
    }

     public function __toString() {
        return $this->nom." ".$this->prenom;
    }
    
}

?>
