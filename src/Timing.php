<?php
namespace F1Data;
class Timing {
    private $driver;
    private $lap;
    private $position;
    private $time;

    public function __construct($xml = false) {
        if($xml) {
            $this->fromXML($xml);
        }
    }

    public function fromXML (SimpleXMLElement $xml) {
        $this->driver = (string) $xml['driverId'];
        $this->lap = (string) $xml['lap'];
        $this->position = (string) $xml['position'];
        $this->time = (string) $xml['time'];
    }
}