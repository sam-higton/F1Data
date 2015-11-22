<?php
namespace F1Data\Entity;

use F1Data\Service\ResponseObject;
use F1Data\Service\RoundServiceInterface;
use F1Data\Service\Api\Ergast\RoundService;
class RoundCollection extends BaseCollection {

    /** @var RoundServiceInterface $service */
    private $service;

    public function __construct($service = false) {
        if($service instanceof RoundServiceInterface) {
            $this->service = $service;
        } else {
            //todo: implement better bootstrapping with configs and stuff
            $this->service = new RoundService();
        }
    }

    public function getRound ($year, $round) {
        $responseObject = $this->service->getRound($year, $round);
        return $this->processResponseObject($responseObject);
    }

    public function processResponseObject(ResponseObject $object) {

        $fields = $object->getFields();
        $fields['circuit'] = $fields['circuit']->getFields();
        $round = new Round();
        $round->fromArray($fields);
        $this->add($round);
        return $round;


    }






}