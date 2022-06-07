<?php

require __DIR__ . "/vendor/autoload.php";

use Source\Controller\ContinuousDelivery;

ContinuousDelivery::$databaseMigrations = false;
ContinuousDelivery::call('date', 'ls', 'composer install');


