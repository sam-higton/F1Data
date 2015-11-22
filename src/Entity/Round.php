<?php
namespace F1Data\Entity;
use F1Data\EntityInterface;
class Round implements EntityInterface {
    private $name;
    private $circuit;
    private $year;
    private $roundNo;
    private $roundNumber;
    private $dateTime;
    private $laps;
    private $pitStops;
    private $qualiResults;
    private $results;
    /** @var DriverCollection $drivers*/
    private $drivers;

    /**
     * @return mixed
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getCircuit() {
        return $this->circuit;
    }

    /**
     * @return mixed
     */
    public function getSeason() {
        return $this->season;
    }

    /**
     * @return mixed
     */
    public function getRoundNumber() {
        return $this->roundNumber;
    }

    /**
     * @return mixed
     */
    public function getDateTime() {
        return $this->dateTime;
    }

    /**
     * @return mixed
     */
    public function getLaps() {
        return $this->laps;
    }

    /**
     * @return mixed
     */
    public function getPitStops() {
        return $this->pitStops;
    }

    /**
     * @return mixed
     */
    public function getQualiResults() {
        return $this->qualiResults;
    }

    /**
     * @return mixed
     */
    public function getDrivers() {
        return $this->drivers;
    }

    /**
     * @return mixed
     */
    public function getResults() {
        return $this->results;
    }

    public function fromArray(array $data) {

        $this->name = $data['name'];
        $this->dateTime = $data['date'] . ' ' . $data['time'];
        $this->roundNo = $data['roundNo'];
        $this->year = $data['year'];
        $circuitData = $data['circuit']->getFields();
        $circuit = new Circuit();
        $circuit->fromArray($circuitData);
        $this->circuit = $circuit;
    }


}