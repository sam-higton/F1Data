<?php
namespace F1Data\Entity;
use F1Data\EntityInterface;

class Timing implements EntityInterface{
    private $driver;
    private $lap;
    private $position;
    private $time;

    public function __construct($xml = false) {
        if($xml) {
            $this->fromXML($xml);
        }
    }

    public function getDriver() {
        return $this->driver;
    }

    public function getPosition () {
        return $this->position;
    }

    public function fromArray (array $data) {
        $this->driver = (string) $data['driver'];
        $this->lap = (string) $data['lap'];
        $this->position = (string) $data['position'];
        $this->time = (string) $data['time'];
    }
}