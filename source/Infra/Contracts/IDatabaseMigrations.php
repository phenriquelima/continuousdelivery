<?php


namespace Source\Infra\Contracts;

interface IDatabaseMigrations
{
    public function run(string $command);
}
