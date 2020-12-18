<?php


//----------------------------------------------
//FILE NAME:  Address.php gen for Servit Framework Model
//Created by: Tlen<limweb@hotmail.com>
//DATE: 2020-12-14(Mon)  21:18:42 

//----------------------------------------------
 
namespace  test;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
        protected	$table='addresses';
        protected	$primaryKey='id';
        public	        $timestamps = false;
}