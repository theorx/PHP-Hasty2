<?php

class RouterTest extends PHPUnit_Framework_TestCase {


    public function testRequestParse() {

        $path = "v1/test/test";
    }

    public function testRequestParse1() {

        $router = new \Hasty2\Router\Router();
        $path = "V1/test/test";
        $data = ['username' => 'test', 'password' => 'neeger'];
        print_r($router->route($path, $data));
    }


}