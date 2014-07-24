<?php
/**
 * Created by PhpStorm.
 * User: lauri
 * Date: 7/17/14
 * Time: 9:03 AM
 */

namespace V1\Model;

class UserModel extends \Hasty2\Model\ModelBase {

    public function getUsers() {

        $repository = new \V1\Repository\User();

        return $repository->getUsers();

    }

    public function getUsersLimited($limit){
        $repository = new \V1\Repository\User();

        return $repository->getUsersLimited($limit);
    }

}