<?php

namespace PHenriqueLima\ContinuousDelivery\Controller;

use PHenriqueLima\ContinuousDelivery\Infra\DatabaseMigrations;
use PHenriqueLima\ContinuousDelivery\Infra\DependencyManager;
use PHenriqueLima\ContinuousDelivery\Infra\UpdateRepository;

class ContinuousDelivery
{
    public function __construct($basePath, $secureLinkUpdateRepository, $migrationCommand, $dependencyManagerCommand)
    {
        // Indicate path base url to execute the commands
        ContinuousDeliveryOperation::$baseUrl = $basePath;

        // Instance Concrete Class Implementations
        $migrate = new DatabaseMigrations;
        $composer = new DependencyManager;
        $git = new UpdateRepository;

        // Inject dependencies as parameters to Operation Class and execute the call method
        $continuousDelivery = new ContinuousDeliveryOperation($composer, $migrate, $git);
        $continuousDelivery->call($secureLinkUpdateRepository, $migrationCommand, $dependencyManagerCommand);
        
    }

    public static function instance()
    {
        return ContinuousDeliveryOperation::class;
    }

    
    
    
    

        

}