<?php
namespace F1Data;

class Race {
    private $name;
    private $circuit;
    private $season;
    private $round;
    private $dateTime;
    private $laps;
    private $pitStops;

    public function __construct ($xml = false) {
        if($xml) {
            $this->fromXML($xml);
        }
    }

    public function fromXML(SimpleXMLElement $xml) {
        $this->season = (string) $xml['season'];
        $this->round = (string) $xml['round'];
        $this->name = (string) $xml->RaceName;
        $this->circuit = new Circuit($xml->Circuit);
        $this->dateTime = new DateTime($xml->Date . ' ' . $xml->Time);
        $this->laps = array();
        foreach($xml->LapsList->Lap as $lap) {
            $this->laps[] = new Lap($lap);
        }

    }

}