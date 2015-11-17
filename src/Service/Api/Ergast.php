<?php
namespace F1Data\Service\Api;
use F1Data\Adapter\AdapterInterface;
use F1Data\Service\ServiceInterface;

class Ergast implements ServiceInterface {

    /** @var  \F1Data\Adapter\Http\HttpAdapterInterface $httpAdapter */
    private $httpAdapter;

    public function __construct($adapter) {
        $this->setAdapter($adapter);
    }

    public function setAdapter($adapter)
    {
        $this->httpAdapter = $adapter;
    }

    public function getEntities($entityName, array $params)
    {

    }

    /** @return \F1Data\Entity\Map\MapInterface */
    public function getDriver($params) {
        $id = $params['id'];
        $result = $this->httpAdapter->get("drivers/" . $id);
        $driverMap = new \F1Data\Entity\Map\DriverMap();
        $driverMap->fromXML($result->DriverTable->Driver);
        return $driverMap;
    }

    public function getEntity($entityName, array $params)
    {
        switch ($entityName) {
            case "Driver":
                return $this->getDriver($params);
                break;
        }
    }
}