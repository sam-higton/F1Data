<?php
require 'vendor/autoload.php';
$driverCollection = new \F1Data\Entity\DriverCollection();
$driverCollection->getSeasonDrivers(2008);
echo count($driverCollection);