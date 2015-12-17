<?php
namespace F1Data\Service\Api\Ergast;
use F1Data\Service\SeasonServiceInterface;

class SeasonService extends Ergast implements SeasonServiceInterface {

    public function getSeason ($year) {
        $query = new ErgastQuery();
        $query->specifyYear($year);
        $response = $this->makeRequest($query);

    }

}