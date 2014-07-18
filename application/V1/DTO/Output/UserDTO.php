<?php
/**
 * Created by PhpStorm.
 * User: lauri
 * Date: 7/17/14
 * Time: 9:31 AM
 */

namespace V1\DTO\Output;

class UserDTO extends \Hasty2\DTO\OutputDTO {


    public $id;
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
     * @param mixed $id
     */
    public function setId($id) {

        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId() {

        return $this->id;
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