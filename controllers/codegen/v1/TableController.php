<?php

namespace codegen\v1;
//----------------------------------------------
//FILE NAME:  TableController.php gen for Servit Framework Controller
//Created by: Tlen<limweb@hotmail.com>
//DATE: 2020-11-17(Tue)  02:21:23 

//----------------------------------------------
use	Illuminate\Database\Capsule\Manager as Capsule;
use	Carbon\Carbon;

class TableController {
    
    
    /**
    *@noAuth
    *@url GET /databases
    *----------------------------------------------
    *FILE NAME:  TableController.php gen for Servit Framework Controller
    *Created by: Tlen<limweb@hotmail.com>
    *DATE:  2020-11-17(Tue)  02:23:02 
    
    *----------------------------------------------
    */
    public function database(){
        try {
            $tbservice = new \TableService($this->server->config);
            $datas = $tbservice->getDatabases();
            return [
                'datas' => $datas,
                'status' => '1',
                'success'=> true,
            ];
        } catch (Exception $e) {
            return[
                'status' => '0',
                'success'=> false,
                'msg'=> $e->getMessage(),
            ]; 
        }
    }

    
    /**
    *@noAuth
    *@url GET /tables/$dbname
    *----------------------------------------------
    *FILE NAME:  TableController.php gen for Servit Framework Controller
    *Created by: Tlen<limweb@hotmail.com>
    *DATE:  2020-11-17(Tue)  02:27:34 
    
    *----------------------------------------------
    */
    public function tables($dbname=''){
        try {
            if($dbname){
                $this->server->setConnection($dbname);
            }
            $tbservice = new \TableService($this->server->config);            
            $dbs = $tbservice->gentables();
            return [
                'datas' => $dbs,
                'status' => '1',
                'success'=> true,
                //'sql' => Capsule::getQueryLog(),
            ];
        } catch (Exception $e) {
            return[
                'status' => '0',
                'success'=> false,
                'msg'=> $e->getMessage(),
            ]; 
        }
    }

    
    /**
    *@noAuth
    *@url GET /dbname/$dbname
    *----------------------------------------------
    *FILE NAME:  TableController.php gen for Servit Framework Controller
    *Created by: Tlen<limweb@hotmail.com>
    *DATE:  2020-11-17(Tue)  02:28:48 
    
    *----------------------------------------------
    */
    public function dbname($dbname=''){
        try {
            if($dbname){
                $this->server->setConnection($dbname);
            }
            $tbservice = new \TableService($this->server->config);            
            $dbname = $tbservice->getdbname(); 
            return [
                'dbname' => $dbname,
                'status' => '1',
                'success'=> true,
                //'sql' => Capsule::getQueryLog(),
            ];
        } catch (Exception $e) {
            return[
                'status' => '0',
                'success'=> false,
                'msg'=> $e->getMessage(),
            ]; 
        }
    }
    
    
    /**
    *@noAuth
    *@url GET /dbjson/$dbname
    *----------------------------------------------
    *FILE NAME:  TableController.php gen for Servit Framework Controller
    *Created by: Tlen<limweb@hotmail.com>
    *DATE:  2020-11-17(Tue)  02:29:45 
    
    *----------------------------------------------
    */
    public function dbjson($dbname=''){
        try {
            if($dbname){
                $this->server->setConnection($dbname);
            }
            $tbservice = new \TableService($this->server->config);            
            $dbsjson = $tbservice->todbjson(); 
            return [
                'datas' => $dbsjson,
                'status' => '1',
                'success'=> true,
                //'sql' => Capsule::getQueryLog(),
            ];
        } catch (Exception $e) {
            return[
                'status' => '0',
                'success'=> false,
                'msg'=> $e->getMessage(),
            ]; 
        }
    }

}
