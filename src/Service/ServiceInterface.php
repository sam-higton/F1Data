<?php
namespace F1Data\Service;
use F1Data\Adapter\AdapterInterface;

interface ServiceInterface {

    public function setAdapter ($adapter);
    public function getEntities ($entityName,array $params);
    public function getEntity ($entityName,array $params);

}