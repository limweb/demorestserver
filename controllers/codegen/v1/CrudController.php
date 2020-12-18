<?php

namespace  codegen\v1;

//----------------------------------------------
//FILE NAME:  CrudController.php gen for Servit Framework Controller
//Created by: Tlen<limweb@hotmail.com>
//DATE: 2020-12-17(Thu)  12:19:27 

//----------------------------------------------
use    Illuminate\Database\Capsule\Manager as Capsule;
use    Carbon\Carbon;


class CrudController   {
    

   /**
     *@noAuth
     *@url GET /users
     *----------------------------------------------
     *FILE NAME:  CrudController.php gen for Servit Framework Controller
     *DATE: 2020-12-17(Thu)  12:19:27

     *----------------------------------------------
     */
    public function alliddesc()
    {
        try {
            $datas = \UserService::alliddesc();
            return [
                'datas' => $datas,
                'status' => '1',
                'success' => true,
            ];
        } catch (Exception $e) {
            return [
                'status' => '0',
                'success' => false,
                'msg' => $e->getMessage(),
            ];
        }
    }


   /**
     *@noAuth
     *@url GET /users/vuetable
     *----------------------------------------------
     *FILE NAME:  CrudController.php gen for Servit Framework Controller
     *DATE: 2020-12-17(Thu)  12:19:27

     *----------------------------------------------
     */
    public function vuetable()
    {
        try {
            $rs = \UserService::vuetable();
            return [
                'total'         => $rs['total'],
                'per_page'      => $rs['per_page'],
                'current_page'  => $rs['current_page'],
                'last_page'     => $rs['last_page'],
                'next_page_url' => $rs['next_page_url'],
                'prev_page_url' => $rs['prev_page_url'],
                'from'          => $rs['from'],
                'to'            => $rs['to'],
                'data'          => $rs['data'],
                'status'        => '1',
                'success'       => true,
            ];
        } catch (Exception $e) {
            return [
                'status' => '0',
                'success' => false,
                'msg' => $e->getMessage(),
            ];
        }
    }


    /**
     *@noAuth
     *@url GET /user/$id/byid
     *----------------------------------------------
     *FILE NAME:  CrudController.php gen for Servit Framework Controller
     *Created by: Tlen<limweb@hotmail.com>
     *DATE: 2020-12-17(Thu)  12:19:27

     *----------------------------------------------
     */
    public function byId($id)
    {
        try {
            $data = \UserService::byId($id);
            return [
                'data' => $data,
                'status' => '1',
                'success' => true,
            ];
        } catch (Exception $e) {
            return [
                'status' => '0',
                'success' => false,
                'msg' => $e->getMessage(),
            ];
        }
    }


    /**
     *@noAuth
     *@url POST /user/update
     *----------------------------------------------
     *FILE NAME:  CrudController.php gen for Servit Framework Controller
     *Created by: Tlen<limweb@hotmail.com>
     *DATE: 2020-12-17(Thu)  12:19:27

     *----------------------------------------------
     */
    public function update()
    {
        try {
            $rs = \UserService::insertOrupdate();
            $datas = \UserService::alliddesc();
            return [
                'datas' => $datas,
                'status' => $rs,
                'success' => $rs,
            ];
        } catch (Exception $e) {
            return [
                'status' => '0',
                'success' => false,
                'msg' => $e->getMessage(),
            ];
        }
    }

    /**
     *@noAuth
     *@url POST /user/add
     *----------------------------------------------
     *FILE NAME:  CrudController.php gen for Servit Framework Controller
     *Created by: Tlen<limweb@hotmail.com>
     *DATE: 2020-12-17(Thu)  12:19:27

     *----------------------------------------------
     */
    public function add()
    {
        try {
            $rs = \UserService::insert();
            $datas = \UserService::alliddesc();
            return [
                'datas' => $datas,
                'status' => '1',
                'success' => true,
            ];
        } catch (Exception $e) {
            return [
                'status' => '0',
                'success' => false,
                'msg' => $e->getMessage(),
            ];
        }
    }

    /**
     *@noAuth
     *@url GET /user/del/$id
     *----------------------------------------------
     *FILE NAME:  CrudController.php gen for Servit Framework Controller
     *Created by: Tlen<limweb@hotmail.com>
     *DATE:2020-12-17(Thu)  12:19:27

     *----------------------------------------------
     */
    public function del($id)
    {
        try {
            $rs = \UserService::delete($id);
            $datas = \UserService::alliddesc();
            return [
                'datas' => $datas,
                'status' => '1',
                'success' => true,
            ];
        } catch (Exception $e) {
            return [
                'status' => '0',
                'success' => false,
                'msg' => $e->getMessage(),
            ];
        }
    }


    

}
