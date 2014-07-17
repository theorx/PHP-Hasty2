<?php

/**
 * Created by PhpStorm.
 * User: lauri
 * Date: 7/15/14
 * Time: 4:24 PM
 */
namespace V1\DTO\Input;

class InputDTO extends \Hasty2\DTO\InputDTO {

    public $username;
    public $password;

    /**
     * @param mixed $password
     */
    public function setPassword($password) {

        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getPassword() {

        return $this->password;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username) {

        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getUsername() {

        return $this->username;
    }

}