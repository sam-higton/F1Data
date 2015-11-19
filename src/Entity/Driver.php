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

    /**
     * @return mixed
     */
    public function getDriverId()
    {
        return $this->driverId;
    }

    /**
     * @param mixed $driverId
     * @return Driver
     */
    public function setDriverId($driverId)
    {
        $this->driverId = $driverId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGivenName()
    {
        return $this->givenName;
    }

    /**
     * @param mixed $givenName
     * @return Driver
     */
    public function setGivenName($givenName)
    {
        $this->givenName = $givenName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFamilyName()
    {
        return $this->familyName;
    }

    /**
     * @param mixed $familyName
     * @return Driver
     */
    public function setFamilyName($familyName)
    {
        $this->familyName = $familyName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     * @return Driver
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * @param mixed $nationality
     * @return Driver
     */
    public function setNationality($nationality)
    {
        $this->nationality = $nationality;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * @param mixed $dob
     * @return Driver
     */
    public function setDob($dob)
    {
        $this->dob = $dob;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPermanentNumber()
    {
        return $this->permanentNumber;
    }

    /**
     * @param mixed $permanentNumber
     * @return Driver
     */
    public function setPermanentNumber($permanentNumber)
    {
        $this->permanentNumber = $permanentNumber;
        return $this;
    }

    public function getFullName ($abbreviateGiven = false) {
        if($abbreviateGiven) {
            $given = $this->givenName[0];
        } else {
            $given = $this->givenName;
        }

        return $given . ' ' . $this->familyName;
    }

    public function __construct($fields = false) {
        if($fields) {
            $this->fromArray($fields);
        }
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