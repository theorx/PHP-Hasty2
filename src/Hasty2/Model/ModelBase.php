<?php


namespace Hasty2\Model;

class ModelBase {

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    public $em = null;

    public function __construct() {

        $this->em = \Hasty2\Db\Doctrine::getInstance()->getEntityManager();
    }

}