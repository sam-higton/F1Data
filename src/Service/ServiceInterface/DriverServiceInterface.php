<?php
namespace F1Data\Service;
interface DriverServiceInterface {
    /** @return ResponseObject */
    public function getDriver($id);
    public function getSeasonDrivers($year);
    public function getRoundDrivers($year, $round);
}
