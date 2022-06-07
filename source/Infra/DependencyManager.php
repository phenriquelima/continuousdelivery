<?php


namespace Source\Infra;

use Source\Controller\ContinuousDelivery;
use Source\Infra\Contracts\IDependencyManager;

class DependencyManager implements IDependencyManager
{

    public function install(string $command)
    {
        return shell_exec('cd '. ContinuousDelivery::$baseUrl . ' && '. $command .' 2>&1');
    }
}
