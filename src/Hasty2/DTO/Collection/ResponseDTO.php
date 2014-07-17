<?php


namespace Hasty2\DTO\Collection;


class ResponseDTO extends \Hasty2\DTO\DTOBase {

    public $result;
    public $api;
    public $error;

    /**
     * @param mixed $api
     */
    public function setApi(ApiDTO $api) {

        $this->api = $api;
    }

    /**
     * @return mixed
     */
    public function getApi() {

        return $this->api;
    }

    /**
     * @param mixed $error
     */
    public function setError(ErrorDTO $error) {

        $this->error = $error;
    }

    /**
     * @return mixed
     */
    public function getError() {

        return $this->error;
    }

    /**
     * @param mixed $result
     */
    public function setResult($result) {

        $this->result = $result;
    }

    /**
     * @return mixed
     */
    public function getResult() {

        return $this->result;
    }


}