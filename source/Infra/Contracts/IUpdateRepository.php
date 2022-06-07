<?php


namespace PHenriqueLima\ContinuousDelivery\Infra\Contracts;

interface IUpdateRepository
{
    public function update(string $secureLink);
}
