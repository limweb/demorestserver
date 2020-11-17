<?php
namespace app\test;


class Aaa{
    public function test(){
        echo 'test';
    }
}

$reflection = new \ReflectionClass('app\test\Aaa');
var_dump($reflection);
$class ='app\test\Aaa';
if (class_exists($class)) {
    $a = new $class();
    var_dump($a);
    $a->test();
}