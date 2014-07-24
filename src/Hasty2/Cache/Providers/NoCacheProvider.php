<?php
/**
 * Created by PhpStorm.
 * User: lauri
 * Date: 7/24/14
 * Time: 10:45 AM
 */

namespace Hasty2\Cache\Providers;

use \Hasty2\Cache\ICache;

class NoCacheProvider implements ICache {

    /**
     * @param $key
     *
     * @return mixed
     */
    public function get($key) {

        return false;
    }

    /**
     * @param     $key
     * @param     $data
     * @param int $ttl
     *
     * @return mixed
     */
    public function store($key, $data, $ttl = 0) {

        return false;
    }

    /**
     * @return mixed
     */
    public function flush() {

        return true;
    }

    /**
     * @param $key
     *
     * @return mixed
     */
    public function delete($key) {

    }

    /**
     * @param          $key
     * @param callable $closure
     * @param          $ttl
     *
     * @return mixed
     */
    public function SGClosure($key, \closure $closure, $ttl) {

        return $closure();
    }

    /**
     * @return mixed
     */
    public function lastStatus() {

        return ['ttl' => 0, 'lastResultFromCache' => false];
    }
}