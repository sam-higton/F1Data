<?php
namespace F1Data;
class PitStop {
    private $driver;
    private $stopNo;
    private $lap;
    private $time;
    private $duration;

    public  function __construct($xml = false) {
        if($xml) {
            $this->loadFromXML($xml);
        }
    }

    public function loadFromXML (\SimpleXMLElement $xml) {
        $this->driver = (string) $xml['driverId'];
        $this->stopNo = (int) $xml['stop'];
        $this->lap = (int) $xml['lap'];
        $this->time = (string) $xml['time'];
        $this->duration = (string) $xml['duration'];
    }

}