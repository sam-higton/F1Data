<?php
namespace F1Data;
interface EntityInterface {

    public function setService (Service\ServiceInterface $service);
    public function getEntityName ();
    public function hydrate (Entity\Map\MapInterface $map);

}