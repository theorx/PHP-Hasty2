<?php

namespace Hasty2\Cache;

interface ICache {

    /**
     * @param $key
     *
     * @return mixed
     */
    public function get($key);

    /**
     * @param     $key
     * @param     $data
     * @param int $ttl
     *
     * @return mixed
     */
    public function store($key, $data, $ttl = 0);

    /**
     * @return mixed
     */
    public function flush();

    /**
     * @param $key
     *
     * @return mixed
     */
    public function delete($key);


}