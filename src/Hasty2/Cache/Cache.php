<?php

namespace Hasty2\Cache;

use \Hasty2\Config\Config;
use \Hasty2\Exception\CacheProviderException;

class Cache {

    /**
     * @var ICache
     */
    private static $_instance;
    /**
     * @var array
     */
    private static $_cacheProviders = [
        'disk'     => '\Hasty2\Cache\Providers\DiskCacheProvider',
        'mysql'    => '\Hasty2\Cache\Providers\MysqlCacheProvider',
        'memcache' => '\Hasty2\Cache\Providers\MemcacheCacheProvider',
        'nocache'  => '\Hasty2\Cache\Providers\NoCacheProvider'

    ];

    private function __construct() {

    }

    /**
     * @return ICache
     * @throws \Hasty2\Exception\CacheProviderException
     */
    public static function getInstance() {

        if (!self::$_instance) {
            $cacheProvider = null;
            if (array_key_exists(Config::get('cache_provider', 'disk'), self::$_cacheProviders)) {
                $cacheProvider = self::$_cacheProviders[Config::get('cache_provider', 'disk')];
            }

            if (!Config::get('cache_enabled', true) || $cacheProvider === null) {
                $cacheProvider = self::$_cacheProviders['nocache'];
            }
            if (class_exists($cacheProvider, true)) {
                self::$_instance = new $cacheProvider();
            }

            if (!self::$_instance instanceof ICache) {
                throw new CacheProviderException($cacheProvider);
            }

        }

        return self::$_instance;
    }

}