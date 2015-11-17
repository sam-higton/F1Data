<?php
require 'vendor/autoload.php';
$client = new \F1Data\Client(new F1Data\HttpAdapter\GuzzleAdapter());
$race = $client->getRace(2015,3);
$race->checkForOvertakes();