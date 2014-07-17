<?php


namespace Hasty2\DTO\Collection;

class RequestDTO extends \Hasty2\DTO\DTOBase {

    private $params;
    private $path;
    private $token;

    /**
     * @param mixed $params
     */
    public function setParams($params) {

        $this->params = $params;
    }

    /**
     * @param mixed $path
     */
    public function setPath($path) {

        $this->path = $path;
    }

    /**
     * @return mixed
     */
    public function getPath() {

        return $this->path;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token) {

        $this->token = $token;
    }

    /**
     * @return mixed
     */
    public function getToken() {

        return $this->token;
    }

    /**
     * @return mixed
     */
    public function getParams() {

        return $this->params;
    }


}