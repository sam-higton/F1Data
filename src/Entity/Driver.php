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
    /** @var  \F1Data\Service\ServiceInterface $service */
    private $service;

    public function __construct($id = false) {
        $service = \F1Data\Service\ServiceManager::getActiveService();
        $this->setService($service);
        if($id) {
            $this->getDriver($id);
        }
    }

    /**
     * @param Service\ServiceInterface $service
     * @return mixed
     */
    public function setService(Service\ServiceInterface $service) {
        $this->service = $service;
    }

    /**
     * @return mixed
     */
    public function getEntityName() {
        return $this->entityName;
    }

    public function getDriver($id) {
        $response = $this->service->getEntity($this->entityName, array (
            "id" => "maldonado"
        ));
        $this->hydrate($response);
    }

    /**
     * @return mixed
     */
    public function hydrate(Map\MapInterface $map) {
        $data = $map->toArray();
        $this->driverId = $data['driverId'];
        $this->familyName = $data['familyName'];
        $this->givenName = $data['givenName'];
        $this->code = $data['code'];
        $this->dob = $data['dob'];
        $this->nationality = $data['nationality'];
        $this->permanentNumber = $data['permanentNumber'];
    }

}