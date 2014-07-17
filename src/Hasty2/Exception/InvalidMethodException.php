<?php

namespace Hasty2\Exception;

class InvalidMethodException extends \Exception {

    public function __construct() {

        $this->message = "Invalid/missing method call.";
        $this->code = 510;
    }

}