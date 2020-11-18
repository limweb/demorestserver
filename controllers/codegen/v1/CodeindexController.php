<?php

namespace codegen\v1;
//----------------------------------------------
//FILE NAME:  CodeindexController.php gen for Servit Framework Controller
//Created by: Tlen<limweb@hotmail.com>
//DATE: 2020-11-17(Tue)  01:03:22 
require_once __DIR__.'/CodegenbaseCointroller.php';
//----------------------------------------------
use	Illuminate\Database\Capsule\Manager as Capsule;
use	Carbon\Carbon;

class CodeindexController  extends CodegenbaseCointroller {
    

/**
*@noAuth
*@url GET /index
*----------------------------------------------
*FILE NAME:  CodeindexController.php gen for Servit Framework Controller
*Created by: Tlen<limweb@hotmail.com>
*DATE:  2020-11-17(Tue)  01:03:39 

*----------------------------------------------
*/
public function index(){
    $tbservice = new \TableService($this->server->config);
    $databases = $tbservice->getDatabases();
    $dbs = $tbservice->gentables();
    $dbsjson = $tbservice->todbjson(); 
    $dbname = $tbservice->getdbname(); 
    include_once SRVPATH.'/views'.$this->viewpath.'/index.php';
}

}
