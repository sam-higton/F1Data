<?php
namespace F1Data\Entity;
class BaseCollection implements \Iterator {

    private $collection = [];
    private $position = 0;

    public function add ($object) {
        array_push($this->collection,$object);
        return $this;
    }

    public function removeAt ($index) {
        unset($this->collection[$index]);
        $this->collection = array_values($this->collection);
        return $this;
    }

    public function insertAt ($index, $item) {
        array_slice($this->collection, $index, 0, $item);
        return $this;
    }

    public function getItemAt ($index) {
        return $this->collection[$index];
    }

    public function current() {
        return $this->collection[$this->position];
    }

    public function next() {
        ++$this->position;
    }

    public function key() {
        return $this->position;
    }

    public function valid() {
        return isset($this->collection[$this->position]);
    }

    public function rewind() {
        $this->position = 0;
    }

}