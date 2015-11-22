<?php
namespace F1Data\Entity;
use F1Data\EntityInterface;
class Circuit implements EntityInterface {
    private $id;
    private $name;
    private $country;
    private $locality;
    private $lat;
    private $long;

    public function __construct ($xml = false) {

    }

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getCountry() {
        return $this->country;
    }

    /**
     * @return mixed
     */
    public function getLocality() {
        return $this->locality;
    }

    /**
     * @return mixed
     */
    public function getLat() {
        return $this->lat;
    }

    /**
     * @return mixed
     */
    public function getLong() {
        return $this->long;
    }



    public function fromArray(array $data) {
        // TODO: Implement fromArray() method.
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->country = $data['country'];
        $this->locality = $data['locality'];
        $this->lat = $data['lat'];
        $this->long = $data['long'];



    }
}