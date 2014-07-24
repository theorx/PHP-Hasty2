<?php
namespace Hasty2\Cache\providers;

use \Hasty2\Cache\ICache;
use \Hasty2\Exception\CacheTimeoutException;
use \Hasty2\Config\Config;

class DiskCacheProvider implements ICache {

    private $lastCacheTtl = null;
    private $lastResultFromCache = false;

    /**
     * @param $key
     *
     * @return mixed
     */
    public function get($key) {

        $path      = $this->getPath();
        $cacheFile = $path . '/' . md5($key);
        $ttlFile   = $cacheFile . '_ttl';
        if (file_exists($cacheFile) && file_exists($ttlFile)) {
            //validate ttl
            $ttl = (int)file_get_contents($ttlFile);
            if (time() <= $ttl) {
                $this->lastCacheTtl        = $ttl;
                $this->lastResultFromCache = true;
                return unserialize(file_get_contents($cacheFile));
            } else {
                $this->lastCacheTtl        = null;
                $this->lastResultFromCache = false;
                return false;
            }
        } else {
            $this->lastCacheTtl        = null;
            $this->lastResultFromCache = false;
            return false;
        }

    }

    /**
     * @return null
     * @throws \Exception
     */
    private function getPath() {

        $path = Config::get('cache_settings', ['disk_cache' => ['path' => __DIR__ . '/../../../disk_cache/']]);

        if (isset($path['disk_cache'], $path['disk_cache']['path'])) {
            $path = $path['disk_cache']['path'];
        } else {
            throw new \Exception("Could not get disk_cache path from configuration.", 560);
        }

        return $path;
    }

    /**
     * @param     $key
     * @param     $data
     * @param int $ttl
     *
     * @return mixed
     */
    public function store($key, $data, $ttl = 0) {

        $path      = $this->getPath();
        $cacheFile = $path . '/' . md5($key);
        $ttlFile   = $cacheFile . '_ttl';

        file_put_contents($ttlFile, (int)(time() + $ttl));
        file_put_contents($cacheFile, serialize($data));
        return true;
    }

    /**
     * @return mixed
     */
    public function flush() {

        array_map('unlink', glob($this->getPath() . DS . '*'));
    }

    /**
     * @param $key
     *
     * @return mixed
     */
    public function delete($key) {

        $path      = $this->getPath();
        $cacheFile = $path . '/' . md5($key);
        $ttlFile   = $cacheFile . '_ttl';

        unlink($cacheFile);
        unlink($ttlFile);
    }

    /**
     * @return array
     */
    public function lastStatus() {

        return ['ttl' => $this->lastCacheTtl, 'lastResultFromCache' => $this->lastResultFromCache];
    }

    /**
     * @param          $key
     * @param callable $closure
     * @param          $ttl
     *
     * @return mixed
     * @throws \Hasty2\Exception\CacheTimeoutException
     */
    public function SGClosure($key, \closure $closure, $ttl = 0) {

        if ((int)$ttl == 0) {
            return $closure();
        } elseif ((int)$ttl > 0) {
            $result = $this->get($key);
            if ($result === false) {
                $result = $closure();
                $this->store($key, $result, (int)$ttl);
                return $result;
            }
            return $result;
        } else {
            throw new CacheTimeoutException($key);
        }
    }

}

