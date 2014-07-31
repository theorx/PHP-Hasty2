<?php

namespace Hasty2\Log;

use \Hasty2\Db\Entities\Logs;

class Logger {

    const DEBUG   = 'debug';
    const ERROR   = 'error';
    const INFO    = 'info';
    const WARNING = 'warning';

    /**
     * @param $type
     * @param $message
     * @param $context_data
     */
    public static function log($type, $message, $context_data) {

        $record = new Logs();

        $record->setContextData($context_data);
        $record->setMessage($message);
        $record->setType($type);
        $record->setTime(time());
        $record->save();
    }

}