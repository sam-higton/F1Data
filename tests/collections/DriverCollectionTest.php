<?php
class DriverCollectionTest extends PHPUnit_Framework_TestCase {

    public function testGetDriver () {

        $driverCollection = new \F1Data\Entity\DriverCollection();
        $driver = $driverCollection->getDriver('alonso');
        $this->assertEquals("Fernando", $driver->getGivenName());

    }

}