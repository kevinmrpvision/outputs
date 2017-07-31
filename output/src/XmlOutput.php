<?php

namespace Kevin\Output;

use Kevin\Output\OutputInterface;
use SimpleXMLElement;

class XmlOutput implements OutputInterface {

    public function load($data) {
        //creating object of SimpleXMLElement
        $xml = new SimpleXMLElement("<?xml version=\"1.0\"?><response></response>");

//function call to convert array to xml
        $this->array_to_xml($data, $xml);
        header("Cache-Control: no-cache");
        header("Content-Type: application/xml");
        return $xml->asXML();
    }

    protected function array_to_xml($array, &$xml) {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                if (!is_numeric($key)) {
                    $subnode = $xml->addChild("$key");
                    $this->array_to_xml($value, $subnode);
                } else {
                    $subnode = $xml->addChild("item$key");
                    $this->array_to_xml($value, $subnode);
                }
            } else {
                $xml->addChild("$key", htmlspecialchars("$value"));
            }
        }
    }

}

?>