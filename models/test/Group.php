<?php


//----------------------------------------------
//FILE NAME:  Group.php gen for Servit Framework Model
//Created by: Tlen<limweb@hotmail.com>
//DATE: 2020-12-14(Mon)  21:17:51 

//----------------------------------------------
 
namespace  test;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
        protected	$table='groups';
        protected	$primaryKey='id';
        public	        $timestamps = false;
} 
