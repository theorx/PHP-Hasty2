<?php

//todo: Implement mysql cache provider

use \Hasty2\Cache\ICache;

class MysqlCacheProvider implements ICache {
    /**
     * @param $key
     *
     * @return mixed
     */
    public function get($key) {
        // TODO: Implement get() method.
    }

    /**
     * @param     $key
     * @param     $data
     * @param int $ttl
     *
     * @return mixed
     */
    public function store($key, $data, $ttl = 0) {
        // TODO: Implement store() method.
    }

    /**
     * @return mixed
     */
    public function flush() {
        // TODO: Implement flush() method.
    }

    /**
     * @param $key
     *
     * @return mixed
     */
    public function delete($key) {
        // TODO: Implement delete() method.
    }

    /**
     * @param          $key
     * @param callable $closure
     * @param          $ttl
     *
     * @return mixed
     */
    public function SGClosure($key, \closure $closure, $ttl) {
        // TODO: Implement SGClosure() method.
    }

    /**
     * @return mixed
     */
    public function lastStatus() {
        // TODO: Implement lastStatus() method.
    }

}