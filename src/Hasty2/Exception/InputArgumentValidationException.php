<?php
namespace Hasty2\Exception;

class InputArgumentValidationException extends \Exception {

    public function __construct($input, $class, $method) {

        $this->message = sprintf(
            "Input value validation failed. Attempted to validate value ( %s ) against validator (%s::%s())",
            print_r($input, true),
            $class,
            $method
        );
        $this->code    = 570;
    }

}