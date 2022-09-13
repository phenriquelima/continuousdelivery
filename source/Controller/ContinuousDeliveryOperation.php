<?php

namespace PHenriqueLima\ContinuousDelivery\Controller;

use PHenriqueLima\ContinuousDelivery\Infra\Contracts\IDatabaseMigrations;
use PHenriqueLima\ContinuousDelivery\Infra\Contracts\IDependencyManager;
use PHenriqueLima\ContinuousDelivery\Infra\Contracts\IUpdateRepository;
use PHenriqueLima\ContinuousDelivery\View\Contracts\IAdapter;
use PHenriqueLima\ContinuousDelivery\View\Presentation;


class ContinuousDeliveryOperation
{

    const WINDOWS = 1;
    const LINUX = 0;

    public static $dependencyManager = true;
    public static $databaseMigrations = true;
    public static $updateRepository = true;
    public static $baseUrl = 'c:/xampp/htdocs/continuousdelivery/';

    public $migrations;
    public $repository;
    public $depencencies;
    
    public function __construct(IDependencyManager $dependencyManager, IDatabaseMigrations $databaseMigrations, IUpdateRepository $updateRepository)
    {
        $this->migrations = $databaseMigrations;
        $this->repository = $updateRepository;
        $this->dependencies = $dependencyManager;
    }


    public function call($secureLinkUpdateRepository, $migrationCommand, $dependencyManagerCommand) : IAdapter
    {

        $response = [
            'vcs' => self::$updateRepository ? $this->repository->update($secureLinkUpdateRepository) : false,
            'composer' => self::$dependencyManager ? $this->dependencies->install($dependencyManagerCommand) : false,
            'migrate' => self::$databaseMigrations ? $this->migrations->run($migrationCommand) : false
        ];
   

        return new Presentation($response);
    }

    public static function settings()
    {
        return [
            'dependencyManager' => self::$dependencyManager,
            'databaseMigrations' => self::$databaseMigrations,
            'updateRepository' => self::$updateRepository
        ];
    }

    private static function checkOS() {
        return (stripos(PHP_OS, "WIN") === 0)? self::WINDOWS : self::LINUX;
    }

    public static function OSisLinux()
    {
        return self::checkOS() == self::LINUX;
    }

    
    
    
    
    

        

}