<?php

/**
 * Created by PhpStorm.
 * User: lauri
 * Date: 7/15/14
 * Time: 4:24 PM
 */
namespace V1\DTO\Output;

class OutputDTO extends \Hasty2\DTO\OutputDTO {

    public $apiToken;
    public $validUntil;

    /**
     * @param mixed $apiToken
     */
    public function setApiToken($apiToken) {

        $this->apiToken = $apiToken;
    }

    /**
     * @return mixed
     */
    public function getApiToken() {

        return $this->apiToken;
    }

    /**
     * @param mixed $validUntil
     */
    public function setValidUntil($validUntil) {

        $this->validUntil = $validUntil;
    }

    /**
     * @return mixed
     */
    public function getValidUntil() {

        return $this->validUntil;
    }

}