<?php

/**
 * Created by PhpStorm.
 * User: lauri
 * Date: 7/15/14
 * Time: 11:47 AM
 */
class RouterTest extends PHPUnit_Framework_TestCase {


    public function testRequestParse(){

        $path = "v1/test/test";

    }

    public function testRequestParse1() {

        $router = new \App\Router\Router();

        $path = "V1/test/test";
        $data = ['username' => 'test', 'password' => 'neeger'];

        print_r($router->route($path, $data));


    }



}