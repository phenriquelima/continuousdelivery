<?php

require __DIR__ . "/vendor/autoload.php";

use PHenriqueLima\ContinuousDelivery\Controller\ContinuousDelivery;

ContinuousDelivery::call('null', 'ls', 'composer install');


