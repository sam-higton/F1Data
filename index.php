<?php
require 'vendor/autoload.php';
\F1Data\F1Data::init();
$driverCollection = new \F1Data\Entity\DriverCollection();
$driverCollection->getRoundDrivers(1999,10);
var_dump($driverCollection);