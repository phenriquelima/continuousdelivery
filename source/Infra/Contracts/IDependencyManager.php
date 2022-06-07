<?php


namespace Source\Infra\Contracts;

interface IDependencyManager
{
    public function install(string $command);
}
