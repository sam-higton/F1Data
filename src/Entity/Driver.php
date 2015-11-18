<?php
namespace F1Data\Entity;
use F1Data\EntityInterface;
use F1Data\Service;

class Driver implements EntityInterface {

    private $entityName = "Driver";
    private $driverId;
    private $givenName;
    private $familyName;
    private $code;
    private $nationality;
    private $dob;
    private $permanentNumber;

    public function __construct($fields = false) {
        if($fields) {
            $this->fromArray($fields);
        }
    }

    public function getEntityName() {
        return $this->entityName;
    }

    public function fromArray(array $data) {
        $this->driverId = $data['driverId'];
        $this->familyName = $data['familyName'];
        $this->givenName = $data['givenName'];
        $this->code = $data['code'];
        $this->dob = $data['dob'];
        $this->nationality = $data['nationality'];
        $this->permanentNumber = $data['permanentNumber'];
    }

}