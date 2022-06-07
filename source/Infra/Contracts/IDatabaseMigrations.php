<?php


namespace PHenriqueLima\ContinuousDelivery\Infra\Contracts;

interface IDatabaseMigrations
{
    public function run(string $command);
}
