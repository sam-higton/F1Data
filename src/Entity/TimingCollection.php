<?php
namespace F1Data\Entity;
class TimingCollection extends BaseCollection {

    public function fromArray (array $data) {
        foreach($data as $timingFields) {
            $newTiming = new Timing();
            $newTiming->fromArray($timingFields);
            $this->add($newTiming);
        }
    }

}