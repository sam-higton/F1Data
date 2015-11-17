<?php
require 'vendor/autoload.php';
\F1Data\F1Data::init();
$maldonado = new \F1Data\Entity\Driver("maldonado");
var_dump($maldonado);