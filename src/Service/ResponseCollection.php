<?php
namespace F1Data\Service;
class ResponseCollection {

    private $collectionName;
    private $collection = [];

    public function __construct ($name = false, $collection = false) {
        if($name) {
            $this->collectionName = $name;
        }

        if($collection) {
            $this->collection = $collection;
        }
    }

    public function setCollectionName($name) {
        $this->collectionName = $name;
    }

    public function getCollectionName() {
        return $this->collectionName;
    }

    public function setCollection ($collection) {
        $this->collection = $collection;
    }

    public function addObject (ResponseObject $object) {
        $this->collection[] = $object;
    }

    public function getCollection () {
        return $this->collection;
    }

}