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
        return $this->year;
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
        if(!$this->laps instanceof LapCollection) {
            $this->fetchLaps();
        }

        return $this->laps;
    }

    public function fetchLaps () {
        $lapCollection = new LapCollection();
        $lapCollection->getRoundLaps($this->year, $this->roundNo);
        $this->laps = $lapCollection;
        return $this;
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
        if(!$this->drivers instanceof DriverCollection) {
            $this->fetchDrivers();
        }
        return $this->drivers;
    }

    public function fetchDrivers () {
        $drivers = new DriverCollection();
        $drivers->getRoundDrivers($this->year, $this->roundNo);
        $this->drivers = $drivers;
        return $this;
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
        $circuitData = $data['circuit'];
        $circuit = new Circuit();
        $circuit->fromArray($circuitData);
        $this->circuit = $circuit;
    }


}