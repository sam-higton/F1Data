<?php
namespace F1Data\Entity;
use F1Data\EntityInterface;
class Lap implements EntityInterface {
    private $number;
    /** @var  TimingCollection $timings */
    private $timings;

    public function getNumber () {
        return $this->number;
    }

    public function getTimings () {
        return $this->timings;
    }

    public function fromArray (array $data) {
        $this->number = $data['number'];
        $timings = new TimingCollection();
        $timings->fromArray($data['timings']);
        $this->timings = $timings;
    }

}
