<?php


//----------------------------------------------
//FILE NAME:  User.php gen for Servit Framework Model
//Created by: Tlen<limweb@hotmail.com>
//DATE: 2020-12-14(Mon)  21:16:51 

//----------------------------------------------
 
namespace  test;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{

        protected	$table='usrs';
        protected	$primaryKey='id';
        public	    $timestamps = true;
        protected	$guarded = array('id');
        protected	$fillable = [];
        protected	$hidden = []; //สำหรับใส่ mutations
        protected	$appends = [];
        protected	$with = ['group','address'];
        protected	$connection = '';

        public function group(){
            return $this->belongsTo('\test\Group','group_id','id');
        }

        public function Address(){
            return $this->hasOne('\test\Address','user_id','id');
        }
} 
