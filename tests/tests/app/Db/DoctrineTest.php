<?php

/**
 * Created by PhpStorm.
 * User: lauri
 * Date: 7/15/14
 * Time: 9:35 AM
 */
class DoctrineTest extends PHPUnit_Framework_TestCase {

    public function testDoctrineSingleton() {

        $instance = Hasty2\Db\Doctrine::getInstance();

        $this->assertTrue(is_object($instance), "getInstance() didn't return object");
    }

    public function testGetEntityManager() {

        new Hasty2\App();

        $instance = Hasty2\Db\Doctrine::getInstance();

        $entityManager = $instance->getEntityManager();

        $this->assertTrue(is_object($entityManager), "getEntityManager() didn't return object.");
        $this->assertEquals(
            'Doctrine\ORM\EntityManager',
            get_class($entityManager),
            'getEntityManager() did not return Doctrine\ORM\EntityManager object'
        );
    }

}