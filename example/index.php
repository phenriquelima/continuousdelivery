<?php

require __DIR__ . "/../vendor/autoload.php";

use PHenriqueLima\ContinuousDelivery\Controller\ContinuousDelivery;

ContinuousDelivery::$baseUrl = '../';
ContinuousDelivery::call('date', 'ls', 'composer install');


