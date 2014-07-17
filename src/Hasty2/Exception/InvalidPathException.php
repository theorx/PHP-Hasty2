<?php

namespace Hasty2\Exception;

class InvalidPathException extends \Exception {

    public function __construct($path) {

        $this->message = "Invalid request path. Request must be like {version}/{controller}/{method}";
        $this->code = 110;
    }

}