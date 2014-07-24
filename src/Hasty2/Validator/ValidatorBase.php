<?php

namespace Hasty2\Validator;

use \Hasty2\Exception\InputArgumentValidationException;

abstract class ValidatorBase {

    /**
     * @throws InputArgumentValidationException
     */
    public static function fail($input, $class = __CLASS__, $method = __METHOD__) {

        throw new InputArgumentValidationException($input, $class, $method);
    }

}
