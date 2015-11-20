<?php
use F1Data\Entity\DriverCollection;
class DriverCollectionTest extends PHPUnit_Framework_TestCase {

    /** @var  DriverCollection $driverCollection */
    protected $driverCollection;

    protected function setup() {
        $this->driverCollection = new DriverCollection();
    }

    public function testConstructors () {
//        $mockResponse = $this->getMock("ResponseObject");
//        $mockResponse->method("getEntityName")->wi
//        $mockService = $this->getMock('DriverService');
//        $mockService->method("getDriver")
//        $collection = new DriverCollection
        $this->markTestIncomplete("mocks are hard");
    }

    public function testRounds () {
        $this->driverCollection->getRoundDrivers(2008,1);
        $this->assertEquals(22,$this->driverCollection->count());
    }

    public function testSeasons () {
        $this->driverCollection->getSeasonDrivers(2008);
        $this->assertEquals(22,$this->driverCollection->count());
        return $this->driverCollection;
    }

    /** @depends testSeasons */
    public function testFindDriver (DriverCollection $dc) {
        $driver = $dc->findDriver("alonso");
        $this->assertEquals("Fernando",$driver->getGivenName());
        $driver = $dc->findDriver("button");
        $this->assertEquals("British", $driver->getNationality());
        $driver = $dc->findDriver("hill");
        $this->assertEquals(false,$driver);
    }

    /** @depends testSeasons */
    public function testGetDriver (DriverCollection $dc) {
        $driver = $dc->getDriver("glock");
        $this->assertEquals("Timo", $driver->getGivenName());
        $driver = $dc->getDriver("nasr");
        $this->assertEquals("Felipe", $driver->getGivenName());

    }

    public function driverProvider () {
        return array(
            array ("button", "Jenson"),
            array ("maldonado", "Pastor"),
            array ("alonso", "Fernando")
        );
    }
}