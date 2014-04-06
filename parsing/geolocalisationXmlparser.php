<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'dao/Geolocalisation_DAO.php';

class GeolocalisationXmlparser{
    public function __construct($id) {
        $dao = new GeolocalisationDAO() ;
        $list = $dao->getGeoById($id);
        $this->setXML($list);
    }
    public function setXml($geo) {
        header('Content-type: text/xml; charset=UTF-8');
        //$geo = new GeolocalisationEntity();
        $oXMLWriter = new XMLWriter();
        $oXMLWriter->openMemory();
        $oXMLWriter->startDocument('1.0', 'UTF-8');
            $oXMLWriter->startElement('geolocalisation');
                $oXMLWriter->startElement('id');
                    $oXMLWriter->text($geo->getId());
                $oXMLWriter->endElement();
                $oXMLWriter->startElement('lat');
                    $oXMLWriter->text($geo->getLat());
                $oXMLWriter->endElement();
                $oXMLWriter->startElement('lon');
                    $oXMLWriter->text($geo->getLon());
                $oXMLWriter->endElement();
            $oXMLWriter->endElement();
        $oXMLWriter->endDocument();
        echo $oXMLWriter->outputMemory(TRUE);
    }
}
