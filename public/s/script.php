<?php
/**
 * Created by PhpStorm.
 * User: prx
 * Date: 31.07.14
 * Time: 21:02
 */
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once(__DIR__.'/../../vendor/autoload.php');

$tool = new \Doctrine\ORM\Tools\SchemaTool(Hasty2\Db\Doctrine::getInstance()->getEntityManager());
//$tool->createSchema(Hasty2\Db\Doctrine::getInstance()->getEntityManager()->getMetadataFactory()->getAllMetadata());
$tool->dropDatabase();
$tool->createSchema(Hasty2\Db\Doctrine::getInstance()->getEntityManager()->getMetadataFactory()->getAllMetadata());