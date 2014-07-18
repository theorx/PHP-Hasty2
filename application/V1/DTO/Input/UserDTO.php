<?php

/**
 * Created by PhpStorm.
 * User: lauri
 * Date: 7/15/14
 * Time: 4:24 PM
 */
namespace V1\DTO\Input;

class UserDTO extends \Hasty2\DTO\InputDTO {

    public $name;
    public $age;

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
     * @param mixed $name
     */
    public function setName($name) {

        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName() {

        return $this->name;
    }

}