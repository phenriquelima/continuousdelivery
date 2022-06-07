<?php


namespace Source\Infra;

use Source\Controller\ContinuousDelivery;
use Source\Infra\Contracts\IDatabaseMigrations;

class DatabaseMigrations implements IDatabaseMigrations
{

    public function run(string $command)
    {
        return shell_exec('(cd ' . ContinuousDelivery::$baseUrl . ' && php artisan migrate)');

    }


}
