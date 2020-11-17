<?php

use	Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

class RestServer extends \Jacwright\RestServer\RestServer 
{
    public $map = array(); 
    public function __construct() {
        parent::__construct();
    }

    /**
     * @param prefix
     * @param dbname
     * @param host
     * @param username
     * @param password
     */

    public function setConnection($dbname = null,$prefix = '', $host = null, $username = null, $password = null, $charset = 'utf8', $collation = 'utf8_unicode_ci',$connection='default')
    {
        // for new and reset config
        $config = $this->config->dbconfig;
        $config['database'] = ( $dbname ?: $config['database'] );
        $config['prefix'] = ( $prefix ?:$config['prefix']);
        $config['host'] = ($host ?: $config['host']);
        $config['username'] = ($username ?: $config['username']);
        $config['password'] = ($password ?: $config['password']);
        $config['charset'] =$charset;
        $config['collation'] =$collation;
        $this->capsule = new Capsule;
        $this->capsule->addConnection($config, $connection);
        $this->capsule->setEventDispatcher(new Dispatcher(new Container));
        $this->capsule->setAsGlobal();
        $this->capsule->bootEloquent();
        $this->config->dbconfig = $config;
        // Capsule::setTablePrefix($prefix);
        // echo Capsule::getTablePrefix();
        // Capsule::setTablePrefix('sys_');
        // echo Capsule::getTablePrefix();
        // $this->server->setconnection() use in controller
    }


    /**
     * $config =  array of config 
     * $connection  string of nameconnect ex  dba  dbb dbc
     */
    public function addConnection($config,$connection = 'default'){
        if($this->capsule && $config){
            if($connection == 'default') {
                $this->capsule = new Capsule();
            }
            $this->capsule->addConnection($config, $connection);
            $this->capsule->setEventDispatcher(new Dispatcher(new Container));
            $this->capsule->setAsGlobal();
            $this->capsule->bootEloquent();
            $this->config->{$connection}  = $config;
        }
    }

}
