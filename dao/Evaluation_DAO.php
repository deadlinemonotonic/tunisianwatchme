<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../connection/connection.php';
include_once '../entity/EvaluationEntity.php';

class EvaluationDao {

    function __construct() {
        
    }

    function Insert($note, $idreclamation, $idcitoyen) {
        //$Evaluation = new EvaluationEntity();
        $req = "INSERT INTO evaluation ( note,idreclamation,idcitoyen ) VALUES (" . $note . "," . $idreclamation . "," . $idcitoyen . ")";
        mysql_query($req) or die("********** Erreur d'ajoute **********<br>");
        echo "********** Ajout avec succés **********<br>";
    }

    function Delete($Evaluation) {
        //$Evaluation = new EvaluationEntity();
        $req = "DELETE FROM evaluation WHERE idreclamation =  " . $Evaluation->getreclamation() . " and idcitoyen = " . $Evaluation->getcitoyen();
        mysql_query($req) or die("********** Erreur de suprission **********<br>");
        echo "********** Supprission avec succés **********<br>";
    }

    function upDate($id, $Evaluation) {
        $Evaluation = new EvaluationEntity();
        $req = "UPDATE evaluation SET note =" . $Evaluation->getNote() .
                " WHERE idcitoyen =" . $Evaluation->getcitoyen() .
                "and idreclamation=" . $Evaluation->getreclamation();
        mysql_query($req) or die("********** Erreur de mise à jour **********<br>");
        echo "********** Mise à jour avec succés **********<br>";
    }

    function getAll() {
        $result = mysql_query("SELECT * FROM evaluation");
        $list = array();

        while ($row = mysql_fetch_array($result)) {
            $eva = new EvaluationEntity();
            $eva->setNote($row['note']);
            $eva->setIdcitoyen($row['idcitoyen']);
            $eva->setreclamation($row['idreclamation']);

            $list[] = $eva;
        }
        return $list;
    }

}

$dao = new EvaluationDao();

$dao->Insert(2, 2, 10);
$array = $dao->getAll();
foreach ($array as $value) {
    echo $value . '<br>';
}
//$entity = new EvaluationEntity();
//$dao->Insert(9, 1, 10);

//foreach ($array as $value) {
//    echo $value . '<br>';
//}

//$dao->Delete($array[0]);
//$array = $dao->getAll();
//foreach ($array as $value) {
//    echo $value . '<br>';
//}