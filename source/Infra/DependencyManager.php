<?php


namespace PHenriqueLima\ContinuousDelivery\Infra;

use PHenriqueLima\ContinuousDelivery\Controller\ContinuousDelivery;
use PHenriqueLima\ContinuousDelivery\Infra\Contracts\IDependencyManager;

class DependencyManager implements IDependencyManager
{

    public function install(string $command)
    {
        return shell_exec('(cd ' . ContinuousDelivery::$baseUrl . " && $command 2>&1)");
    }
}
