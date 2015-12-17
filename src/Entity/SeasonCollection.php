<?php
namespace F1Data\Entity;
use F1Data\Service\SeasonServiceInterface;
use F1Data\Service\Api\Ergast\SeasonService;
class SeasonCollection extends BaseCollection {

    /** @var SeasonService $service */
    private $service;

    public function __construct ($service = false) {
        if($service instanceof SeasonServiceInterface) {
            $this->service = $service;
        } else {
            $this->service = new SeasonService();
        }
    }

    public function getSeason ($year) {
        $response = $this->service->getSeason($year);
    }

}