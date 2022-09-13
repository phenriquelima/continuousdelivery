<?php

namespace PHenriqueLima\ContinuousDelivery\View;

use PHenriqueLima\ContinuousDelivery\View\Contracts\IAdapter;

class Presentation implements IAdapter
{

    public function __construct(array $content)
    {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($content);
    }
}
