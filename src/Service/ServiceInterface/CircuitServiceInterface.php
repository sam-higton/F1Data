<?php
namespace F1Data\Service;
interface CircuitServiceInterface {
    public function getCircuit ($id);
    public function getSeasonCircuits ($year);
    public function getRoundCircuit ($year, $round);
}