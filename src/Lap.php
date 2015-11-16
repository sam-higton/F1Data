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

    public function fromXML (\SimpleXMLElement $xml) {
        $this->number = (int) $xml['number'];
        $this->timings = array();
        foreach($xml->Timing as $timing) {
            $this->timings[] = new Timing($timing);
        }
    }
}
