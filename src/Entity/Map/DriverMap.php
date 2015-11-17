<?php
namespace F1Data\Entity\Map;
class DriverMap implements MapInterface {

    private $driverId;
    private $givenName;
    private $familyName;
    private $code;
    private $dob;
    private $nationality;
    private $permanentNumber;

    public function fromXML(\SimpleXMLElement $xml) {
        $this->driverId = (string) $xml['driverId'];
        $this->givenName = (string) $xml->GivenName;
        $this->familyName = (string) $xml->FamilyName;
        $this->code = (string) $xml['code'];
        $this->dob = (string) $xml->DateOfBirth;
        $this->nationality = (string) $xml->Nationality;
        $this->permanentNumber = (string) $xml->PermanentNumber;
    }

    public function fromRow($row) {

    }

    public function toArray () {
        return array (
            "driverId" => $this->driverId,
            "givenName" => $this->givenName,
            "familyName" => $this->familyName,
            "code" => $this->code,
            "dob" => $this->dob,
            "nationality" => $this->nationality,
            "permanentNumber" => $this->permanentNumber
        );
    }

}