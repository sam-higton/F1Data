<?php
require 'vendor/autoload.php';
\F1Data\F1Data::init();
$driverCollection = new \F1Data\Entity\DriverCollection();
$alonso = $driverCollection->getDriver("alonso");
echo $alonso->getGivenName();