<?php
namespace F1Data\Service;
use F1Data\F1Data;


class ServiceManager {

    /** @return ServiceInterface */
    static function getActiveService () {
        $serviceType = F1Data::setting("serviceType");
        /** @var /ServiceInterface $newService */
        switch($serviceType) {
            case "api":
                $serviceClassName = F1Data::setting("availableServices:api:class");
                $adapterClassName = F1Data::setting("availableServices:api:adapter");
                $baseUrl = F1Data::setting("availableServices:api:baseUrl");
                $adapterClassName = "\\F1Data\\Adapter\\" . $adapterClassName;
                $serviceClassName = "\\F1Data\\Service\\" . $serviceClassName;
                /** @var \F1Data\Adapter\AdapterInterface $adapter */
                $adapter = new $adapterClassName($baseUrl);
                $service = new $serviceClassName($adapter);
                //$service = new Api\Ergast($adapter);
                return $service;

        }
    }

    static function getAdapter ($serviceName) {

    }

}
