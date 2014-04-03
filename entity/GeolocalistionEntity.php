<?php
class GeolocalisationEntity{
     private $id;
     private $reclamation;
     private $lon;
     private $lat;

     function __construct() {
         
     }
     public function getId() {
         return $this->id;
     }

     public function getReclamation() {
         return $this->reclamation;
     }

     public function getLon() {
         return $this->lon;
     }

     public function getLat() {
         return $this->lat;
     }

     public function setId($id) {
         $this->id = $id;
     }

     public function setReclamation($reclamation) {
         $this->reclamation = $reclamation;
     }

     public function setLon($lon) {
         $this->lon = $lon;
     }

     public function setLat($lat) {
         $this->lat = $lat;
     }


}
?>
