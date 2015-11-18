<?php
namespace F1Data\Service\Api\Ergast;
class ErgastQuery {

    private $dataType = false;
    private $year = false;
    private $round = false;
    private $driver = false;

    public function specifyRound ($roundNo) {
        $this->round = $roundNo;
    }

    public function specifyYear ($year) {
        $this->year = $year;
    }

    public function specifyDriver ($driverId) {
        $this->driver = $driverId;
    }

    public function setDataType ($type) {
        $this->dataType = $type;
    }

    public function buildRequestURI () {
        $baseURI = "/";
        if($this->year) {
            $baseURI .= $this->year . "/";
        }

        if($this->round) {
            $baseURI .= $this->year . "/";
        }

        if($this->driver || $this->dataType == ApiTypes::$DRIVER) {
            $baseURI .= ApiTypes::$DRIVER . '/' . $this->driver;
        }

        if($this->dataType == ApiTypes::$DRIVER && !$this->driver) {
            $baseURI .= ApiTypes::$DRIVER . '/';
        }

        if($this->dataType) {
            $baseURI .= $this->dataType . '/';
        }

        return $baseURI;
    }




}