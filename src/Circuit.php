<?php
namespace F1Data;
class Circuit {
    private $id;
    private $name;
    private $country;
    private $locality;
    private $latLong = array();

    public function __construct ($xml = false) {
        if($xml) {
            $this->fromXML($xml);
        }
        return $this;
    }

    public function fromXML(\SimpleXMLElement $xml) {
        $this->id = (string) $xml['circuitId'];
        $this->name = (string) $xml->CircuitName;
        $this->country = (string) $xml->Location->Country;
        $this->locality = (string) $xml->Location->Locality;
        $this->latLong = array (
            "lat" => $xml->Location['lat'],
            "long" => $xml->Location['long']
        );
    }
}