<?php
namespace F1Data\Service\Api\Ergast;

use F1Data\Service\DriverServiceInterface;
use F1Data\Service\ServiceInterface;

class DriverService extends Ergast implements ServiceInterface, DriverServiceInterface {

    public function getDriver ($id) {
        $query = new ErgastQuery();
        $query->setDataType(ApiTypes::$DRIVER);
        $query->specifyDriver($id);
        $response = $this->makeRequest($query);
    }

    public function getSeasonDrivers ($year) {

    }

    public function getRoundDrivers($round) {

    }

}