<?php

namespace Hasty2\DTO\Collection;

use Hasty2\DTO\DTOBase;

class ErrorDTO extends DTOBase {

    public $exceptionName;


    public $code;
    public $message;

    /**
     * @param mixed $exceptionName
     */
    public function setExceptionName($exceptionName) {

        $this->exceptionName = $exceptionName;
    }

    /**
     * @return mixed
     */
    public function getExceptionName() {

        return $this->exceptionName;
    }


    /**
     * @param mixed $code
     */
    public function setCode($code) {

        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getCode() {

        return $this->code;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message) {

        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getMessage() {

        return $this->message;
    }


}