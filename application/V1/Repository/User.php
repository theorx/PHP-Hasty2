<?php
/**
 * Created by PhpStorm.
 * User: lauri
 * Date: 7/17/14
 * Time: 9:03 AM
 */

namespace V1\Repository;

class User extends \Hasty2\Model\ModelBase {

    public function getUsers() {

        $userEntity = $this->em->getRepository("Hasty2\Entities\User");

        return $userEntity->findAll();

    }

    public function getUsersLimited($limit) {

        $qb = $this->em->createQueryBuilder();
        $qb->add('select', 'u')->add('from', '\Hasty2\Entities\User u')->add('orderBy', 'u.name ASC')->setMaxResults(
            (int)$limit
        );
        $query = $qb->getQuery();

        return $query->getResult();
    }

}