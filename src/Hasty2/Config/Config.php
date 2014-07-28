<?php

namespace Hasty2\Config;

class Config {

    private static $_configuration = null;

    /**
     * @param null $key
     * @param null $default
     *
     * @return null
     * @throws \Exception
     */
    public static function get($key = null, $default = null) {

        if (!self::$_configuration && $default != null) {
            throw new \Exception('Configuration is not loaded.');
        } else {
            if ($key == null) {
                return self::$_configuration;
            } else {
                if ($key != null) {
                    if (array_key_exists($key, self::$_configuration)) {
                        return self::$_configuration[$key];
                    } else {
                        if ($default == null) {
                            throw new \Exception(sprintf('Configuration parameter: %s is missing.', $key));
                        } else {
                            return $default;
                        }
                    }
                }
            }
        }

        return $default;
    }

    /**
     * @param array $configuration
     */
    public static function load(array $configuration) {

        self::$_configuration = $configuration;
    }

}
