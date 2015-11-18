<?php
namespace F1Data\Service;
interface LapServiceInterface {
    public function getRoundLaps ($year, $round);
    public function getRoundLap ($year, $round, $lap);
    public function getDriverLaps ($year, $round, $driver);
    public function getDriverLap ($year, $round, $lap, $driver);
}