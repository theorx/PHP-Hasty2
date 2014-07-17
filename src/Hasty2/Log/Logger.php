<?php

namespace Hasty2\Log;

class Logger {

    const DEBUG = 'debug';
    const ERROR = 'error';
    const INFO = 'info';
    const WARNING = 'warning';

    /**
     * @param $type
     * @param $message
     * @param $queryId
     */
    public static function log($type, $message, $queryId) {

        //log it somewhere somehow
        //limit log message length
        //escape log message
        //use queryId for logging also
    }

}