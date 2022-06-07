<?php


namespace PHenriqueLima\ContinuousDelivery\Infra\Contracts;

interface IDependencyManager
{
    public function install(string $command);
}
