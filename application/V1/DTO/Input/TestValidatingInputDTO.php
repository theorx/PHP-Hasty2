<?php

/**
 * Created by PhpStorm.
 * User: lauri
 * Date: 7/15/14
 * Time: 4:24 PM
 */
namespace V1\DTO\Input;

use \V1\Validator\TestValidator;

class TestValidatingInputDTO extends \Hasty2\DTO\InputDTO {


    public $username;
    public $age;
    public $email;
    public $active;

    /**
     * @param mixed $active
     */
    public function setActive($active) {

        $this->active = TestValidator::validateBoolean($active);
    }

    /**
     * @return mixed
     */
    public function getActive() {

        return $this->active;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age) {

        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getAge() {

        return $this->age;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email) {

        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getEmail() {

        return $this->email;
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