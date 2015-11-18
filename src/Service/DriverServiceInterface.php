<?php
namespace F1Data\Service;
interface DriverServiceInterface {
    public function getDriver($id);
    public function getSeasonDrivers($year);
    public function getRoundDrivers($round);
}
