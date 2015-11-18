<?php
namespace F1Data\Service;
class ResponseObject {
    private $entityName;
    private $fields;

    public function __construct($name = false, $fields = false) {

        if($name) {
            $this->entityName = $name;
        }

        if($fields) {
            $this->addFields($fields);
        }
    }

    public function setEntityName($name) {
        $this->entityName = $name;
    }

    public function getEntityName() {
        return $this->entityName;
    }

    public function addFields (array $fields) {
        $this->fields = $fields;
    }

    public function addField ($key, $value) {
        $this->fields[$key] = $value;
    }

    public function getFields () {
        return $this->fields;
    }

    public function getField ($key) {
        return $this->fields[$key];
    }

}