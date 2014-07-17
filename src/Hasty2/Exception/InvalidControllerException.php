<?php


namespace Hasty2\Exception;

class InvalidControllerException extends \Exception {

    public function __construct($controller) {

        $this->message = sprintf("Invalid controller exception. Trying to load controller: %s", $controller);
        $this->code = 520;
    }

}