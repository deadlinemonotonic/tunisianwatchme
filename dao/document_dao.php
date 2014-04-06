<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of document_dao
 *
 * @author Farouk
 */
include_once("entity/DocumentEntity.php");

class DocumentDao {

    function getDocumentByIdReclamation($idRec) {
        $sql = "select * from document where id = " . $idRec;
        $result = mysql_query($sql) or die(mysql_error());
        $list = array();

        if ($result_array = mysql_fetch_array($result)) {

            $document = new DocumentEntity();
            $document->setIdreclamation($result_array["idreclamation"]);
            $document->setContent($result_array["content"]);
            $document->setNom($result_array["nom"]);
            $document->setType($result_array["type"]);
            $document->setUrl($result_array["url"]);

            $list[] = $document;
        }
        return $list;
    }

    function insertDocument(DocumentEntity $doc) {

        $idReclamation = $doc->getIdreclamation();
        $nom = $doc->getNom();
        $type = $doc->getType();
        if ($type == 1)
            $url = "null";
        else
            $url = $doc->getUrl();
        if ($type != 1)
            $content = "null";
        else
            $content = $doc->getContent();

        $req = "INSERT INTO `document` (`idreclamation`, `nom`, `type`, `url`, `content`) VALUES ('$idReclamation', '$nom', '$type', '$url', '$content')";
        $id = mysql_query($req) or die(mysql_error());
        return $id;
    }

}

?>
