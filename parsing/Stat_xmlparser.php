<?php

include_once 'connection/connection.php';
include_once 'dao/Statistique_Dao.php';

class StatxmlParser {

    function __construct($type) {
        $statDao = new StatistiqueDao();
        if ($type == 'l') {
            $list = $statDao->getStatByLieu();
        } elseif ($type == 'd') {
            $list = $statDao->getStatByDomaine();
        } elseif ($type == 'e') {
            $list = $statDao->getStatByEtat();
        }
         $this->setXML($list);
    }

    function setXML($list) {
        header('Content-type: text/xml; charset=UTF-8');
        $oXMLWriter = new XMLWriter();
        $oXMLWriter->openMemory();
        $oXMLWriter->startDocument('1.0', 'UTF-8');

        $oXMLWriter->startElement('datas');
        foreach ($list as $value) {
             $oXMLWriter->startElement('data');
            $oXMLWriter->startElement('critere');
            $oXMLWriter->text($value->getCritere());
            $oXMLWriter->endElement();
            $oXMLWriter->startElement('value');
            $oXMLWriter->text($value->getValeur());
            $oXMLWriter->endElement();
            $oXMLWriter->endElement();
        }
        $oXMLWriter->endElement();
        $oXMLWriter->endDocument();
        echo $oXMLWriter->outputMemory(TRUE);
    }

}

?>