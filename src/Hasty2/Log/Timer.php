<?php


namespace Hasty2\Log;

class Timer {

    /**
     * @var array
     */
    private static $_timers = [];

    /**
     * @param $timerName
     *
     * @throws \Exception
     */
    public static function start($timerName) {

        if (strlen($timerName) == 0) {
            throw new \Exception("Unable to start a timer without a name.");
        }

        self::$_timers[$timerName]['start'] = microtime(true);
    }

    /**
     * @param $timerName
     *
     * @throws \Exception
     */
    public static function stop($timerName) {

        if (strlen($timerName) == 0) {
            throw new \Exception("Unable to stop a timer without a name.");
        }

        self::$_timers[$timerName]['stop'] = microtime(true);
    }

    /**
     * @param $timerName
     *
     * @return mixed
     * @throws \Exception
     */
    private static function getTime($timerName) {

        if (strlen($timerName) == 0) {
            throw new \Exception("Timer name is missing. Unable to measure elapsed time.");
        }

        if (isset(self::$_timers[$timerName], self::$_timers[$timerName]['start'], self::$_timers[$timerName]['stop'])) {
            return self::$_timers[$timerName]['stop'] - self::$_timers[$timerName]['start'];
        } else {
            if (!isset(self::$_timers[$timerName])) {
                throw new \Exception(sprintf("Timer with name %s does not exist.", $timerName));
            } else {
                if (!isset(self::$_timers[$timerName]['stop'])) {
                    throw new \Exception(sprintf(
                        "Timer '%s' has to be stopped before measuring elapsed time.",
                        $timerName
                    ));
                }
            }
        }
    }

    /**
     * @param $timerName
     *
     * @return mixed
     */
    public static function getMilliSeconds($timerName) {

        return number_format(self::getTime($timerName) * 1000, 4, '.', '');
    }

    /**
     * @param $timerName
     *
     * @return mixed
     */
    public static function getSeconds($timerName) {

        return number_format(self::getTime($timerName), 4, '.', '');
    }


}