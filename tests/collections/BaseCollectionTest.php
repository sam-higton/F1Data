<?php
class BaseCollectionTest extends PHPUnit_Framework_TestCase {

    public function testCanIterate () {

        $collection = new \F1Data\Entity\BaseCollection();
        $collection->add('a');
        $collection->add('b');
        $collection->add('c');

        $testArray = [];

        foreach($collection as $item) {
            array_push($testArray, $item);
        }

        $this->assertEquals(['a','b','c'],$testArray);

    }

}