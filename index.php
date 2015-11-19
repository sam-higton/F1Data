<?php
require 'vendor/autoload.php';
\F1Data\F1Data::init();
$driverCollection = new \F1Data\Entity\DriverCollection();
$driverCollection->getSeasonDrivers(2008);
foreach($driverCollection as $driver) {
    echo $driver->getFullName() . "<br />";
}