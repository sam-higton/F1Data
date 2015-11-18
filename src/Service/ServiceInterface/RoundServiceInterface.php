<?php
namespace F1Data\Service;
interface RoundServiceInterface {
    public function getRound ($year, $round);
    public function getSeason ($year);
}