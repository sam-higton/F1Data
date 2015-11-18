<?php
namespace F1Data\Service;
interface PitStopServiceInterface {
    public function getRoundPitStops ($year, $round);
    public function getDriverPitStops ($year, $round, $driver);
}