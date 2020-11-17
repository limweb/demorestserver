<?php

namespace codegen\v1;
//----------------------------------------------
//FILE NAME:  CodeController.php gen for Servit Framework Controller
//Created by: Tlen<limweb@hotmail.com>
//DATE: 2020-11-17(Tue)  00:56:13 
//----------------------------------------------
require_once __DIR__.'/CodegenbaseCointroller.php';

use	Illuminate\Database\Capsule\Manager as Capsule;
use	Carbon\Carbon;

class CodeController extends CodegenbaseCointroller {

/**
*@noAuth
*@url GET /index
*----------------------------------------------
*FILE NAME:  CodeController.php gen for Servit Framework Controller
*Created by: Tlen<limweb@hotmail.com>
*DATE:  2020-11-17(Tue)  00:56:22 

*----------------------------------------------
*/
public function index(){
        $tbservice = new \TableService($this->server->config);
        $databases = $tbservice->getDatabases();
        // dump($databases);
        $dbs = $tbservice->gentables();
        $dbsjson = $tbservice->todbjson(); //json_encode($dbs);
        $dbname = $tbservice->getdbname(); //$this->camelize($this->server->config->dbconfig['database']); 
        // dump($dbs);
        $html = <<<HTML
        <!DOCTYPE html>   
        <html lang="en">   
        <head>   
            <title>VUEVM CODEGEN BY TLEN!</title>   
            <meta charset="utf-8">  
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        HTML;        
        $html .='<style>
                #myBtn {

                    display: none; /* Hidden by default */
                    position: fixed; /* Fixed/sticky position */
                    bottom: 20px; /* Place the button at the bottom of the page */
                    right: 30px; /* Place the button 30px from the right */
                    z-index: 99; /* Make sure it does not overlap */
                    border: none; /* Remove borders */
                    outline: none; /* Remove outline */
                    background-color: red; /* Set a background color */
                    color: white; /* Text color */
                    cursor: pointer; /* Add a mouse pointer on hover */
                    padding: 15px; /* Some padding */
                    border-radius: 10px; /* Rounded corners */
                    font-size: 18px; /* Increase font size */
                }

                #myBtn:hover {
                    background-color: #555; /* Add a dark-grey background on hover */
                }
            </style>';
            $html .= <<<HTML
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>  
            <script src="https://unpkg.com/vue/dist/vue.min.js"></script>
            <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
            <script src="https://unpkg.com/vue-ls@3.2.1/dist/vue-ls.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.2.2/jszip.min.js" integrity="sha256-gy5W5/rXWluWXFRvMWFFMVhocfpBe7Tf4SW2WMfjs4E=" crossorigin="anonymous"></script>
            <script>
                var dbs = $dbsjson;
            </script>
        <head> 
        <body> 
            <div id="app" class="pl-4">
            <center><h3>AUTO GEN API/VUEUI CRUD FROM DATABASE</h3></center>
            <div class="d-flex justify-content-between" style="cursor: pointer;">
                <div @click="togglealltable"><b>Database:</b><input type="checkbox" v-model="alltable" /> $dbname
                </div>
                <div>&nbsp;</div>
                <div>&nbsp;</div>
                <div>&nbsp;</div>
                <div>&nbsp;</div>
                <div>&nbsp;</div>
                <div>&nbsp;</div>
                <div class="pl-2 text-nowrap"><input type="checkbox" v-model="isDownload" />D/L ZIP</div>
                <div class="pl-2 text-nowrap"><input type="checkbox" v-model="isGenbckend" />GEN Backend</div>
                <div @click="toggleVue2typemodule"><input type="checkbox" v-model="isVue2typemodule" >Vue2-typeModule</div>
                <div @click="toggleVue2"><input type="checkbox" v-model="isVue2" >Vue2</div>
                <div @click="toggleVue3"><input type="checkbox" v-model="isVue3" >Vue3</div>
                <div @click="toggleSvelte"><input type="checkbox" v-model="isSvelte" >Svelte</div>
                <div @click="togglesoftdelete"><input type="checkbox" v-model="allsoftdel" >Softdelete</div>
                <div @click="toggletimestamp"><input type="checkbox" v-model="alltimestamp" >Timestamps</div>
                <button @click="genall" class="btn btn-sm btn-success" style="float:right" >GENCODE FOR ALL TABLES</button>
            </div>
            <div id="accordion">
        HTML;
                echo $html;


}

}
