<?php


namespace Source\Infra\Contracts;

interface IUpdateRepository
{
    public function update(string $secureLink);
}
