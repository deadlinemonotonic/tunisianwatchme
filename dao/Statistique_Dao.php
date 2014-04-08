<?php

include_once("connection/connection.php");
include_once("entity/StatEntity.php");

class StatistiqueDao {

    function __construct() {
        
    }

    public function getStatByLieu() {
        $query_search = "SELECT COUNT( * ) AS nbr, l.ville FROM reclamation r INNER JOIN lieu l ON l.id = r.idlieu GROUP BY r.idlieu";
        $query_exec = mysql_query($query_search) or die(mysql_error());
        $list = array();

        while ($result_array = mysql_fetch_array($query_exec)) {
            $statEntity = new StatEntity($result_array['ville'], $result_array['nbr']);
            $list[] = $statEntity;
        }
        return $list;
    }
    
    public function getStatByDomaine() {
        $query_search = "SELECT COUNT( * ) AS nbr, d.nom FROM reclamation r INNER JOIN domaine d ON d.id = r.iddomaine GROUP BY r.iddomaine";
        $query_exec = mysql_query($query_search) or die(mysql_error());
        $list = array();

        while ($result_array = mysql_fetch_array($query_exec)) {
            $statEntity = new StatEntity($result_array['nom'], $result_array['nbr']);
            $list[] = $statEntity;
        }
        return $list;
    }
    
    public function getStatByEtat() {
        $query_search = "SELECT COUNT( * ) as nbr , etat FROM reclamation group by etat";
        $query_exec = mysql_query($query_search) or die(mysql_error());
        $list = array();

        while ($result_array = mysql_fetch_array($query_exec)) {
            $statEntity = new StatEntity($result_array['etat'], $result_array['nbr']);
            $list[] = $statEntity;
        }
        return $list;
    }
    
   

}

?>
