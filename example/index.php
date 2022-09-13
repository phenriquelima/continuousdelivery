<?php

require __DIR__ . "/../vendor/autoload.php";

use PHenriqueLima\ContinuousDelivery\Controller\ContinuousDelivery;

ContinuousDelivery::instance()::$databaseMigrations = false;
$continuousDelivery = new ContinuousDelivery('../', 'pwd', 'ls', 'date');






