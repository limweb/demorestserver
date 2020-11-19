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

	public function handleError($statusCode, $errorMessage = null) {
        header('Location: /codegen/v1/index');
        // include_once SRVPATH.'/views/codegen/v1/index.php';
	}

	private $codes = array(
		'100' => 'Continue',
		'200' => 'OK',
		'201' => 'Created',
		'202' => 'Accepted',
		'203' => 'Non-Authoritative Information',
		'204' => 'No Content',
		'205' => 'Reset Content',
		'206' => 'Partial Content',
		'300' => 'Multiple Choices',
		'301' => 'Moved Permanently',
		'302' => 'Found',
		'303' => 'See Other',
		'304' => 'Not Modified',
		'305' => 'Use Proxy',
		'307' => 'Temporary Redirect',
		'400' => 'Bad Request',
		'401' => 'Unauthorized',
		'402' => 'Payment Required',
		'403' => 'Forbidden',
		'404' => 'Not Found',
		'405' => 'Method Not Allowed',
		'406' => 'Not Acceptable',
		'409' => 'Conflict',
		'410' => 'Gone',
		'411' => 'Length Required',
		'412' => 'Precondition Failed',
		'413' => 'Request Entity Too Large',
		'414' => 'Request-URI Too Long',
		'415' => 'Unsupported Media Type',
		'416' => 'Requested Range Not Satisfiable',
		'417' => 'Expectation Failed',
		'500' => 'Internal Server Error',
		'501' => 'Not Implemented',
		'503' => 'Service Unavailable'
	);

}
