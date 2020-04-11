<?php

//----------------------------------------------
//FILE NAME:  AbcController.php gen for Servit Framework Controller
//Created by: Tlen<limweb@hotmail.com>
//DATE: 2020-03-30(Mon)  16:50:00 

//----------------------------------------------
use	Illuminate\Database\Capsule\Manager as Capsule;
use	Carbon\Carbon;

class AbcController  {
    
public function authorize(){
    
    $header = getallheaders();   
    // dump($header);
    $this->header = $header;
    return true;
}


/**
*@noAuth
*@url GET /abc
*----------------------------------------------
*FILE NAME:  AbcController.php gen for Servit Framework Controller
*Created by: Tlen<limweb@hotmail.com>
*DATE:  2020-03-30(Mon)  16:50:19 

*----------------------------------------------
*/
public function abc(){
    $datas = Dbinfo::get();
    $input = Request::getInstance();
    try {
        // throw new \Jacwright\RestServer\RestException(404, 'User not found');
        // $this->server->setStatus(401);
        // throw new \Jacwright\RestServer\RestException(401, "You are not authorized to access this resource.");
        return [
            'input' => $input->getdata(),
            //'ajax' => $ajax,
            //'page' => $page,
            //'perpage' => $perpage,
            //'skip' => $skip,
            //'total' => $total,
            // 'count' => count($datas),
            // 'datas' => $datas,
            //'columns' => $columns,
            //'info' => $info,
            //'infos' => $info,
            //'domains' => $domains,
            //'method' => $method,
            'status' => '1',
            'success'=> true,
            //'sql' => Capsule::getQueryLog(),
            'func'=> __CLASS__.'/'.__FUNCTION__
        ];
    } catch (Exception $e) {
        // $this->server->setStatus($e->getCode());
        return[
            'status' => '0',
            'success'=> false,
            'msg'=> $e->getMessage(),
            'func'=> __CLASS__.'/'.__FUNCTION__,
        ]; 
    }
}

    

}