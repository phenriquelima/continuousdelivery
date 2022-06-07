<?php


namespace PHenriqueLima\ContinuousDelivery\Infra;

use PHenriqueLima\ContinuousDelivery\Controller\ContinuousDelivery;
use PHenriqueLima\ContinuousDelivery\Infra\Contracts\IUpdateRepository;

class UpdateRepository implements IUpdateRepository
{

    public function update(string $secureLink)
    {
        $output = [];
        $returnCode = null;
        exec("$secureLink 2>&1", $output, $returnCode);
        return $output;
    
    }
}
