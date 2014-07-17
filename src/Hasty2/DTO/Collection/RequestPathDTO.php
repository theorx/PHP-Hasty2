<?php


namespace Hasty2\DTO\Collection;


class RequestPathDTO extends \Hasty2\DTO\DTOBase {

    /**
     * @var string
     */
    public $version;
    /**
     * @var string
     */
    public $controller;
    /**
     * @var string
     */
    public $method;


    /**
     * @param mixed $controller
     */
    public function setController($controller) {

        $this->controller = $controller;
    }

    /**
     * @return mixed
     */
    public function getController() {

        return $this->controller;
    }

    /**
     * @param mixed $method
     */
    public function setMethod($method) {

        $this->method = $method;
    }

    /**
     * @return mixed
     */
    public function getMethod() {

        return $this->method;
    }

    /**
     * @param mixed $version
     */
    public function setVersion($version) {

        $this->version = $version;
    }

    /**
     * @return mixed
     */
    public function getVersion() {

        return $this->version;
    }

    /**
     * @return string
     */
    public function getClassPath() {

        return "\\" . $this->getVersion() . '\\Controller\\' . $this->getController();
    }


}