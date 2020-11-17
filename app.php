<?php
require_once __DIR__ .'/vendor/autoload.php';
require_once __DIR__ .'/utils/util.php';
require_once __DIR__ .'/utils/RestServer.php';
require_once __DIR__ .'/utils/Request.php';
define('SRVPATH', __DIR__);
$server = new \RestServer('debug');
require_once __DIR__.'/configs/config.php'; 
$server->useCors = true;
includeDir(__DIR__.'/models');
includeDir(__DIR__.'/services');
includeDirClass(__DIR__.'/controllers', $basePath = '', $server );
$server->allowedOrigin = '*';
new Request();
$server->handle();