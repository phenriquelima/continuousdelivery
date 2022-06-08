<?php


namespace PHenriqueLima\ContinuousDelivery\Infra;

use PHenriqueLima\ContinuousDelivery\Controller\ContinuousDelivery;
use PHenriqueLima\ContinuousDelivery\Infra\Contracts\IUpdateRepository;

class UpdateRepository implements IUpdateRepository
{

    public function update(string $secureLink)
    {
        return shell_exec('cd ' . ContinuousDelivery::$baseUrl . ' && ' . $secureLink . ' 2>&1');
    }
}
