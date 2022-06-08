<?php

namespace PHenriqueLima\ContinuousDelivery\Controller;

use PHenriqueLima\ContinuousDelivery\Infra\DatabaseMigrations;
use PHenriqueLima\ContinuousDelivery\Infra\DependencyManager;
use PHenriqueLima\ContinuousDelivery\Infra\UpdateRepository;
use PHenriqueLima\ContinuousDelivery\View\Presentation;

class ContinuousDelivery
{

    const WINDOWS = 1;
    const LINUX = 0;

    public static $dependencyManager = true;
    public static $databaseMigrations = true;
    public static $updateRepository = true;
    public static $baseUrl = 'c:/xampp/htdocs/continuousdelivery/';

    public static function call($secureLinkUpdateRepository, $migrationCommand, $dependencyManagerCommand)
    {

        $migrate = new DatabaseMigrations;
        $composer = new DependencyManager;
        $git = new UpdateRepository;

        $response = [
            'vcs' => self::$updateRepository ? $git->update($secureLinkUpdateRepository) : false,
            'composer' => self::$dependencyManager ? $composer->install($dependencyManagerCommand) : false,
            'migrate' => self::$databaseMigrations ? $migrate->run($migrationCommand) : false
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