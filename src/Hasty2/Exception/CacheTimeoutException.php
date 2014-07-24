<?php
namespace Hasty2\Exception;

class CacheTimeoutException extends \Exception {

    public function __construct($key) {

        $this->message = sprintf(
            "Cache timeout exception. Cannot set cache TTL to negative number. Cache Key: %s",
            $key
        );
        $this->code    = 555;
    }

}