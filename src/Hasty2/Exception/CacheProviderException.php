<?php
namespace Hasty2\Exception;

class CacheProviderException extends \Exception {

    public function __construct($class) {

        $this->message = sprintf(
            "Invalid cache provider loaded. Provider is not instance of ICache. Class name: %s",
            $class
        );
        $this->code    = 550;
    }

}