<?php
namespace Hasty2\Db;

use \Doctrine\ORM\EntityManager;
use \Doctrine\ORM\Tools\Setup;
use \Doctrine\ORM\Configuration;


/**
 * Class Doctrine
 * @package Hasty2\Db
 */
class Doctrine {

    /**
     * @var self
     */
    private static $_instance;
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $_entityManager;

    /**
     *
     */
    private function __construct() {
        $configuration = include(__DIR__ . '/../../../config/configuration.php');
        \Hasty2\Config\Config::load($configuration);
    }

    /**
     * @return Doctrine
     */
    public static function getInstance() {

        if (!self::$_instance) {
            self::$_instance = new self;
            self::$_instance->setup();
        }

        return self::$_instance;
    }

    /**
     *
     */
    private function setup() {

        $config       = Setup::createAnnotationMetadataConfiguration(
            [\Hasty2\Config\Config::get('paths')['entities'],
                __DIR__ . '/Entities/'],
            \Hasty2\Env::isDev()
        );
        $mysql_config = \Hasty2\Config\Config::get('mysql');

        $this->_entityManager = EntityManager::create($mysql_config, $config);
    }

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    public function getEntityManager() {

        return $this->_entityManager;
    }

}


