# Continuous Delivery Component

This component provide routine classes to application deployment through send a http request.
Set up a github webhook post request to a route from your application and run the code to update your local repository.

## Prerequisites ##

Tested on OS GNU/Linux Debian 11 (docker image *php:8.0-apache*)
- Composer and Git must be installed on server

## Features ##

With this component you can run three stages to delivery your application:

1. Run secure git pull from your server repository to update the source code
2. Run composer install or compose update
3. Run Migrations ex.: 'php artisan migrate or vendor/bin/phinx migrate'

## Installation: ##

```
composer require phenriquelima/continuousdelivery:dev-main

```


## Usage: ##

If you are using Laravel or any framework or route component, make a route and run a callback or controller method from that following this instructions:

1. Define your static baseURL variable (must be the application root url)
2. Create a ContinuousDelivery class instance with four params as bellow:
   - the base path url (where the commands will be executed)
   - the secure URL to update your repository
   - code to run migrations
   - code to install dependencies 

```
use PHenriqueLima\ContinuousDelivery\Controller\ContinuousDelivery;

 Route::get('/pull', function(){
   
    $continuousDelivery = new ContinuousDelivery(
        '/var/www/vacinacao/',
        'git pull https://phenriquelima:yourSecureTokenProvideByGithub@github.com/AccountName/RepositoryName',
        'php artisan migrate',
        'composer install --no-autoloader'
        );
    
});
```

3. If you want to see the component config run:
```
var_dump($continuousDelivery->settings());
```
- This method return the array settings status

4. If you want to disabled some of three stage to update execute:

- ContinuousDelivery::instance()::$databaseMigrations = false;
- ContinuousDelivery::instance()::$dependencyManager = false;
- ContinuousDelivery::instance()::$updateRepository = false;


## Warning ##
- Be sure that your user application has permission to write on repository
- Configure your Root Path Application



