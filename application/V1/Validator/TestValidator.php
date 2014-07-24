<?php

namespace V1\Validator;

use \Hasty2\Validator\ValidatorBase;

class TestValidator extends ValidatorBase {

    /**
     * @param $input
     *
     * @return mixed
     */
    public static function validateBoolean($input) {

        if ($input == 1 || $input == 0 || strtolower($input) == 'true' || strtolower($input) == 'false') {
            return filter_var($input, FILTER_VALIDATE_BOOLEAN);
        } else {
            self::fail($input);
        }
    }

}