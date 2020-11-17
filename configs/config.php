<?php
use Illuminate\Database\Capsule\Manager as Capsule;
$capsule = new Capsule;
$mysqlconfig = [
    'driver'    => 'mysql',
    'host'      => '127.0.0.1',
    'port'      => '3306',
    'database'  => 'abc',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
];
$capsule->addConnection($mysqlconfig);

$sqliteconfig = [
    'driver'    => 'sqlite',
    'database'  => __DIR__.'/database.db',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
];
$capsule->addConnection($sqliteconfig,'sqlite');

// Set the event dispatcher used by Eloquent models... (optional)
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
$capsule->setEventDispatcher(new Dispatcher(new Container));
// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();
// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

$connection = $capsule->getConnection('default');
$connectionsqlite = $capsule->getConnection('sqlite');
$config = new \Config();
$config->dbconfig = $mysqlconfig;
$config->sqlite = $sqliteconfig;
$server->capsule = $capsule;
$server->config = $config;