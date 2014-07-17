<?php

namespace Hasty2;

class Env {

    /**
     * @var string
     */
    public static $environment = self::LIVE;

    const DEV  = 'DEV';
    const TEST = 'TEST';
    const LIVE = 'LIVE';

    /**
     * @param $environment
     *
     * @throws \Exception
     */
    public static function setEnvironment($environment) {

        if (!is_string($environment)) {
            throw new \Exception("Environment must be string.");
        }

        if (in_array($environment, [self::DEV, self::TEST, self::LIVE])) {
            self::$environment = $environment;
        } else {
            throw new \Exception(sprintf("Invalid environment name: %s.", $environment));
        }

    }

    /**
     * @return int
     */
    public static function getEnvironment() {

        return self::$environment;
    }

    /**
     * @return bool
     */
    public static function isDev() {

        if (self::$environment == self::DEV) {
            return true;
        }
        return false;
    }

    /**
     * @return bool
     */
    public static function isTest() {

        if (self::$environment == self::TEST) {
            return true;
        }
        return false;
    }

    /**
     * @return bool
     */
    public static function isLive() {

        if (self::$environment == self::LIVE) {
            return true;
        }
        return false;
    }


}