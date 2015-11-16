<?php
namespace F1Data;
class Lap {
    private $number;
    private $timings;

    public function __construct($xml = false) {
        if($xml) {
            $this->fromXML($xml);
        }
    }

    public function getNumber () {
        return $this->number;
    }

    public function getTimings () {
        return $this->timings;
    }

    public function getDriverData ($driverName) {
        /** @var Timing $timing */
        foreach($this->timings as $timing) {
            if($timing->getDriver() == $driverName) {
                return $timing;
            }
        }
        return false;
    }

    public function fromXML (\SimpleXMLElement $xml) {
        $this->number = (int) $xml['number'];
        $this->timings = array();
        foreach($xml->Timing as $timing) {
            $this->timings[] = new Timing($timing);
        }
    }
}
