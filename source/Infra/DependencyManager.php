<?php


namespace PHenriqueLima\ContinuousDelivery\Infra;

use PHenriqueLima\ContinuousDelivery\Controller\ContinuousDelivery;
use PHenriqueLima\ContinuousDelivery\Controller\ContinuousDeliveryOperation;
use PHenriqueLima\ContinuousDelivery\Infra\Contracts\IDependencyManager;

class DependencyManager implements IDependencyManager
{

    public function install(string $command)
    {
        return
        ContinuousDeliveryOperation::OSisLinux() ?
            
            shell_exec('export COMPOSER_HOME="$HOME/.config/composer" && cd ' . ContinuousDeliveryOperation::$baseUrl . ' && ' . $command . ' 2>&1') :

            shell_exec('cd ' . ContinuousDeliveryOperation::$baseUrl . ' && ' . $command . ' 2>&1');
    }
}
