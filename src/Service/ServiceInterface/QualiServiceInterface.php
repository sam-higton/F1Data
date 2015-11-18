<?php
namespace F1Data\Service;
interface QualiServiceInterface {
    public function getRoundQuali ($year, $round);
    public function getDriverQuali ($year, $round, $driver);
}