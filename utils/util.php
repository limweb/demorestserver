<?php

function includeDir($path)
{
    $dir = new \RecursiveDirectoryIterator($path);
    $iterator = new \RecursiveIteratorIterator($dir);
    foreach ($iterator as $file) {
        $fname = $file->getFilename();
        if (preg_match('%\.php$%', $fname)) {
            if($fname != 'index.php') require_once $file->getPathname();
        }
    }
}

function includeDirClass($path,$basePath = '',$server='')
{
    if($server){
        $dir = new \RecursiveDirectoryIterator($path);
        $iterator = new \RecursiveIteratorIterator($dir);
        foreach($iterator as $file) {
            $fname = $file->getFilename();
            $namespace="";
            if($basePath){
               $basePathx = $basePath; 
            } else {
               $basePathx = '/'.$iterator->getSubPath();
               $namespace = $iterator->getSubPath();
            }
            if(preg_match('%\.php$%', $fname)) {
                if($fname != 'index.php') {
                    require_once $file->getPathname();
                    $basePathx = str_replace(['\\'],'/',$basePathx);
                    $namespace = str_replace(['/'],'\\',$basePathx);
                    $className = basename($fname, '.php');
                    if($namespace =='\\') $namespace = ''; 
                    $server->addClass($namespace.'\\'.$className, $basePathx);
                }
            }
        }
    } 
}
