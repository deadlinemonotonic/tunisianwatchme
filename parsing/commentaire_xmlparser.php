<?php

include_once 'dao/commentaire_dao.php';
include_once 'connection/connection.php';

class CommentaireXMLParser {

    function __construct($id) {
        $dao = new commentaire_dao();

        $list = $dao->getByidReclamation($id);

        $this->setXML($list);
    }

    function setXML($listCommentaires) {
        header('Content-type: text/xml; charset=UTF-8');
//        $commentaire = new CommentaireEntity();
        $oXMLWriter = new XMLWriter;
        $oXMLWriter->openMemory();
        $oXMLWriter->startDocument('1.0', 'UTF-8');
        $oXMLWriter->startElement('commentaires');
        foreach ($listCommentaires as $commentaire) {
            $oXMLWriter->startElement('commentaire');
            $oXMLWriter->startElement('id');
            $oXMLWriter->text($commentaire->getId());
            $oXMLWriter->endElement();
            $oXMLWriter->startElement('texte');
            $oXMLWriter->text($commentaire->getTexte());
            $oXMLWriter->endElement();
            $oXMLWriter->startElement('utilisateur');
            if ($commentaire->getUser() != "") {
                $oXMLWriter->startElement('nom');
                $oXMLWriter->text($commentaire->getUser()->getNom());
                $oXMLWriter->endElement();
                $oXMLWriter->startElement('prenom');
                $oXMLWriter->text($commentaire->getUser()->getPrenom());
                $oXMLWriter->endElement();
            }
            $oXMLWriter->endElement();
            $oXMLWriter->startElement('idreclamation');
            $oXMLWriter->text($commentaire->getReclamation());
            $oXMLWriter->endElement();
            $oXMLWriter->startElement('date');
            $oXMLWriter->text($commentaire->getDate());
            $oXMLWriter->endElement();
            $oXMLWriter->endElement();
        }
        $oXMLWriter->endElement();
        $oXMLWriter->endDocument();
        echo $oXMLWriter->outputMemory(TRUE);
    }

}
?>