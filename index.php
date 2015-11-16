<?php
require 'vendor/autoload.php';
$client = new \F1Data\Client();
$race = $client->getRace(2015,3);
var_dump($race);