<?php
namespace F1Data\Entity;
use F1Data\Service\Api\Ergast\LapService;
use F1Data\Service\LapServiceInterface;
use F1Data\Service\ResponseCollection;
use F1Data\Service\ResponseObject;

class LapCollection extends BaseCollection {

    /** @var LapServiceInterface $service */
    private $service;

    public function __construct ($service = false) {
        if($service instanceof LapServiceInterface) {
            $this->service = $service;
        } else {
            $this->service = new LapService();
        }
    }

    public function getRoundLaps($year, $round) {
        $response = $this->service->getRoundLaps($year, $round);
        $this->processResponseCollection($response);

    }

    public function processResponseObject(ResponseObject $object) {
        $fields = $object->getFields();
        $timingArray = [];
        foreach($fields['timings']->getCollection() as $timing) {
            $timingArray[] = $timing->getFields();
        }
        $fields['timings'] = $timingArray;
        $lap = new Lap();
        $lap->fromArray($fields);
        $this->add($lap);
    }

    public function processResponseCollection (ResponseCollection $collection) {
        foreach($collection->getCollection() as $object) {
            $this->processResponseObject($object);
        }
    }

}