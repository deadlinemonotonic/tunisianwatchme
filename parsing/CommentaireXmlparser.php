<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../connection/connection.php';
include_once '../dao/commentaire_dao.php';
include_once '../entity/CommentaireEntity.php';

class CommentaireXmlparser {

    public function __construct($id) {
        $this->id = $id;
        $dao = new commentaire_dao();
        if ($id == 0) {
            $list = $dao->getAll();
        } else {
            $list[] = $dao->getByid($id);
        }
        $this->setXML($list);
    }

    private function setXml($listCommentaires) {

        $commentaire = new CommentaireEntity();

        header('Content-type: text/xml; charset=UTF-8');
        $XMLWriter = new XMLWriter;
        $XMLWriter->openMemory();
        $XMLWriter->startDocument('1.0', 'UTF-8');
        $XMLWriter->startElement("commentaires");
        foreach ($listCommentaires as $commentaire) {
            $XMLWriter->startElement("commentaire");
                $XMLWriter->startElement("id");
                    $XMLWriter->text($commentaire->getId());
                $XMLWriter->endElement();
                $XMLWriter->startElement("texte");
                    $XMLWriter->text($commentaire->getTexte());
                $XMLWriter->endElement();
                $XMLWriter->startElement("date");
                    $XMLWriter->text($commentaire->getDate());
                $XMLWriter->endElement();
                

            $XMLWriter->endElement();
        }
        $XMLWriter->endElement();
        $XMLWriter->endDocument();
        echo $XMLWriter->outputMemory(TRUE);
    }

}

$c = new CommentaireXmlparser(0);
