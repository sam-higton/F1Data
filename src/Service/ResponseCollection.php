<?php
namespace F1Data\Service;
class ResponseCollection implements \Iterator, \ArrayAccess {

    private $collectionName;
    private $collection = [];

    public function __construct ($name = false, $collection = false) {
        if($name) {
            $this->collectionName = $name;
        }

        if($collection) {
            $this->collection = $collection;
        }
    }

    public function setCollectionName($name) {
        $this->collectionName = $name;
    }

    public function getCollectionName() {
        return $this->collectionName;
    }

    public function setCollection ($collection) {
        $this->collection = $collection;
    }

    public function addObject (ResponseObject $object) {
        $this->collection[] = $object;
    }

    public function getCollection () {
        return $this->collection;
    }

    /**
     * @return mixed
     */
    public function current() {
        // TODO: Implement current() method.
    }

    /**
     * @return mixed
     */
    public function next() {
        // TODO: Implement next() method.
    }

    /**
     * @return mixed
     */
    public function key() {
        // TODO: Implement key() method.
    }

    /**
     * @return mixed
     */
    public function valid() {
        // TODO: Implement valid() method.
    }

    /**
     * @return mixed
     */
    public function rewind() {
        // TODO: Implement rewind() method.
    }

    /**
     * @param mixed $offset
     * @return mixed
     */
    public function offsetExists($offset) {
        // TODO: Implement offsetExists() method.
    }

    /**
     * @param mixed $offset
     * @return mixed
     */
    public function offsetGet($offset) {
        // TODO: Implement offsetGet() method.
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     * @return mixed
     */
    public function offsetSet($offset, $value) {
        // TODO: Implement offsetSet() method.
    }

    /**
     * @param mixed $offset
     * @return mixed
     */
    public function offsetUnset($offset) {
        // TODO: Implement offsetUnset() method.
    }


}