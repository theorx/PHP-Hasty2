<?php

namespace Hasty2\Validator;

use \Hasty2\Exception\InputArgumentValidationException;

/**
 * Class ValidatorBase
 * @package Hasty2\Validator
 */
abstract class ValidatorBase {

    /**
     * @param $input
     * @param string $class
     * @param string $method
     * @throws \Hasty2\Exception\InputArgumentValidationException
     */
    public static function fail($input, $class = __CLASS__, $method = __METHOD__) {

        throw new InputArgumentValidationException($input, $class, $method);
    }

}
