<?php
namespace F1Data;
class QualiResult {

    private $driver;
    private $position;
    private $time;

    public function __construct($xml = false) {
        if($xml) {
            $this->loadFromXML($xml);
        }
    }

    public function getDriver () {
        return $this->driver;
    }

    public function getPosition () {
        return $this->position;
    }

    public function loadFromXML (\SimpleXMLElement $xml) {
        $this->driver = (string) $xml->Driver['driverId'];
        $this->position = (string) $xml['position'];
        if($xml->Q3 != "") {
            $this->time = (string) $xml->Q3;
        } else if ($xml->Q2 != "") {
            $this->time = (string) $xml->Q2;
        } else {
            $this->time = (string) $xml->Q1;
        }
    }

}