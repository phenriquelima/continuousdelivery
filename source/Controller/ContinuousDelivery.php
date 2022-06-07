<?php

namespace Source\Controller;

use Source\Infra\DatabaseMigrations;
use Source\Infra\DependencyManager;
use Source\Infra\UpdateRepository;
use Source\View\Presentation;

class ContinuousDelivery
{

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
    
    
    
    

        

}