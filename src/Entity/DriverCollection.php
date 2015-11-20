<?php
namespace F1Data\Entity;
use F1Data\Service\Api\Ergast\DriverService;
use F1Data\Service\DriverServiceInterface;
use F1Data\Service\ResponseCollection;
use F1Data\Service\ResponseObject;

class DriverCollection extends BaseCollection {

    /** @var DriverServiceInterface $service  */
    private $service;

    public function __construct($service = false) {
        if($service instanceof DriverServiceInterface) {
            $this->service = $service;
        } else {
            //todo: implement better bootstrapping with configs and stuff
            $this->service = new DriverService();
        }
    }

    public function getDriver ($id) {
        if($driver = $this->findDriver($id)) {
            return $driver;
        } else {
            return $this->fetchDriver($id);
        }
    }

    public function findDriver ($id) {
        /** @var Driver $driver */
        foreach($this as $driver) {
            if($driver->getDriverId() == $id) {
                return $driver;
            }
        }
        return false;
    }

    private function fetchDriver ($id) {
        $responseObject = $this->service->getDriver($id);
        return $this->processResponseObject($responseObject);
    }

    public function getSeasonDrivers($year) {
        $response = $this->service->getSeasonDrivers($year);
        return $this->processResponseCollection($response);
    }


    public function getRoundDrivers($year, $round) {
        $response = $this->service->getSeasonDrivers($year, $round);
        return $this->processResponseCollection($response);
    }

    private function processResponseCollection (ResponseCollection $collection) {
        if($collection->getCollectionName() == "DriverCollection") {
            foreach($collection->getCollection() as $object) {
                if(!$this->processResponseObject($object)) {
                    //return false;
                };
            }
            return $collection;
        } else {
            return false;
        }
    }

    private function processResponseObject (ResponseObject $object) {
        if($object->getEntityName() == "Driver") {
            $newDriver = new Driver();
            $newDriver->fromArray($object->getFields());
            $this->add($newDriver);
            return $newDriver;
        } else {
            return false;
        }
    }

}