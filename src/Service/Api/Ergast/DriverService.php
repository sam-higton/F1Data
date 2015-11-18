<?php
namespace F1Data\Service\Api\Ergast;

use F1Data\Service\DriverServiceInterface;
use F1Data\Service\ResponseCollection;
use F1Data\Service\ResponseObject;
use F1Data\Service\ServiceInterface;

class DriverService extends Ergast implements ServiceInterface, DriverServiceInterface {

    public function getDriver ($id) {
        $query = new ErgastQuery();
        $query->setDataType(ApiTypes::$DRIVER);
        $query->specifyDriver($id);
        $response = $this->makeRequest($query);
        return $this->formatDriver($response->DriverTable->Driver);
    }

    public function getSeasonDrivers ($year) {
        $query = new ErgastQuery();
        $query->setDataType(ApiTypes::$DRIVER);
        $query->specifyYear($year);
        $response = $this->makeRequest($query);
        return $this->formatDriverCollection($response->DriverTable->Driver);

    }

    public function getRoundDrivers($year, $round) {
        $query = new ErgastQuery();
        $query->setDataType(ApiTypes::$DRIVER);
        $query->specifyYear($year);
        $query->specifyRound($round);
        $response = $this->makeRequest($query);
        return $this->formatDriverCollection($response->DriverTable->Driver);

    }

    private function formatDriverCollection (\SimpleXMLElement $xml) {
        $responseCollection = new ResponseCollection("DriverCollection");
        foreach($xml as $driver) {
            $responseCollection->addObject($this->formatDriver($driver));
        }
        return $responseCollection;
    }

    private function formatDriver (\SimpleXMLElement $xml) {
        $driverDetails = array ();
        $driverDetails['driverId'] = (string) $xml['driverId'];
        $driverDetails['givenName'] = (string) $xml->GivenName;
        $driverDetails['familyName'] = (string) $xml->FamilyName;
        $driverDetails['code'] = (string) $xml['code'];
        $driverDetails['dob'] = (string) $xml->DateOfBirth;
        $driverDetails['nationality'] = (string) $xml->Nationality;
        $driverDetails['permanentNumber'] = (string) $xml->PermanentNumber;
        return new ResponseObject("Driver",$driverDetails);
    }

}