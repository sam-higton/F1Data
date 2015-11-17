<?php
namespace F1Data;

class Race {
    private $name;
    private $circuit;
    private $season;
    private $round;
    private $dateTime;
    private $laps;
    private $pitStops;
    private $qualiResults;

    public function __construct ($xml = false) {
        if($xml) {
            $this->fromXML($xml);
        }
    }

    public function fromXML(\SimpleXMLElement $xml) {
        $this->season = (string) $xml['season'];
        $this->round = (string) $xml['round'];
        $this->name = (string) $xml->RaceName;
        $this->circuit = new Circuit($xml->Circuit);
        $this->dateTime = new \DateTime($xml->Date . ' ' . $xml->Time);
        $this->laps = array();
        foreach($xml->LapsList->Lap as $lap) {
            $this->laps[] = new Lap($lap);
        }

    }

    public function loadPitStopsFromXML (\SimpleXMLElement $xml) {
        $this->pitStops = array ();
        foreach($xml->PitStop as $pitStop) {
            $this->pitStops[] = new PitStop($pitStop);
        }
    }

    public function loadQualiFromXML (\SimpleXMLElement $xml) {
        $this->qualiResults = array();
        foreach($xml->QualifyingResult as $qualiResult) {
            $this->qualiResults[] = new QualiResult($qualiResult);
        }
    }

    public function getDriverLapData ($driverName, $lapNo) {
        /** @var Lap $lap */
        foreach($this->laps as $lap) {
            if($lap->getNumber() == $lapNo) {
                return $lap->getDriverData($driverName);
            }
        }
        return false;
    }

    public function getLapPositionData ($position, $lapNo) {
        /** @var Lap $lap */
        foreach($this->laps as $lap) {
            if($lap->getNumber() == $lapNo) {
                return $lap->getTimingAtPosition($position);
            }
        }
        return false;
    }

    /** @return Timing */
    public function getDriverGridPosition($driverName) {
        /** @var QualiResult $qualiResult */
        foreach($this->qualiResults as $qualiResult) {
            if($qualiResult->getDriver() == $driverName) {
                return $qualiResult->getPosition();
            }
        }
        return false;
    }

    public function checkForOvertakes () {
        $driverList = array ();
        /** @var QualiResult $qualiResult */
        foreach($this->qualiResults as $qualiResult) {
            $driverList[$qualiResult->getDriver()] = $qualiResult->getPosition();
        }


        for($i = 1; $i <= count($this->laps);$i++) {
            foreach($driverList as $driver => $lastPosition) {
                $lastLapPosition = $lastPosition;
                $thisLapData = $this->getDriverLapData($driver, $i);

                if($thisLapData) {
                    $positionDiff = $thisLapData->getPosition() - $lastLapPosition;
                    if($positionDiff < 0) {
//                            echo "last lap: " . $lastLapPosition . " this lap: " . $thisLapData->getPosition() . "<br />";
                        for($j = $lastLapPosition; $j > $thisLapData->getPosition(); $j--) {
                            $overtakeData = $this->getLapPositionData($j,$i);
                            if($overtakeData) {
                                echo $driver . " overtakes " . $overtakeData->getDriver() . " on lap " . $i . "<br />";
                            } else {
                                echo $driver . " gains position due to DNF<br />";
                            }
                        }
                    }
                    $driverList[$driver] = $thisLapData->getPosition();
                }
            }
        }
    }

}