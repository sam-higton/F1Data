<?php
require 'vendor/autoload.php';
$driverCollection = new \F1Data\Entity\DriverCollection();
$roundCollection = new \F1Data\Entity\RoundCollection();
$round = $roundCollection->getRound(2012,6);
var_dump($round);
