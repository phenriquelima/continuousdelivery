<?php


namespace Source\Infra;

use Source\Controller\ContinuousDelivery;
use Source\Infra\Contracts\IUpdateRepository;

class UpdateRepository implements IUpdateRepository
{

    public function update(string $secureLink)
    {
        return shell_exec('(cd ' . ContinuousDelivery::$baseUrl . ' && git pull https://deusilva:a3cbff85dbd98251a98af6f4042cd241d2d96f7e@github.com/gdesUEFS/proex 2>&1)');
    }
}