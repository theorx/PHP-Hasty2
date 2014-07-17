<?php

namespace Hasty2\Db;


class EntityBase {

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $_em = null;

    public function __construct() {

        $this->_em = Doctrine::getInstance()->getEntityManager();

    }

    /**
     * @return $this
     */
    public function save() {

        $entityManager = Doctrine::getInstance()->getEntityManager();

        $entityManager->persist($this);
        $entityManager->flush($this);

        return $this;
    }

    /**
     * @return $this
     */
    public function delete() {

        $entityManager = Doctrine::getInstance()->getEntityManager();

        $entityManager->remove($this);
        $entityManager->flush($this);

        return $this;
    }

} 