<?php


namespace PHenriqueLima\ContinuousDelivery\Infra;

use PHenriqueLima\ContinuousDelivery\Controller\ContinuousDelivery;
use PHenriqueLima\ContinuousDelivery\Controller\ContinuousDeliveryOperation;
use PHenriqueLima\ContinuousDelivery\Infra\Contracts\IDatabaseMigrations;

class DatabaseMigrations implements IDatabaseMigrations
{

    public function run(string $command)
    {
        return shell_exec('(cd ' . ContinuousDeliveryOperation::$baseUrl . " && $command)");

    }
}
