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
        $driverRoot = $xml->DriverTable->Driver;
        $this->driverId = (string) $driverRoot['driverId'];
        $this->givenName = (string) $driverRoot->GivenName;
        $this->familyName = (string) $driverRoot->FamilyName;
        $this->code = (string) $driverRoot['code'];
        $this->dob = (string) $driverRoot->DateOfBirth;
        $this->nationality = (string) $driverRoot->Nationality;
        $this->permanentNumber = (string) $driverRoot->PermanentNumber;
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