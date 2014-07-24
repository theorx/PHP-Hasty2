<?php

namespace Hasty2\DTO\Collection;

use Hasty2\DTO\DTOBase;
use Hasty2\Exception\CacheProviderException;

class ApiDTO extends DTOBase {

    public $queryTime;
    public $queryId;
    /**
     * @var CacheDTO
     */
    public $cache;

    /**
     * @param \Hasty2\DTO\Collection\CacheDTO $cache
     */
    public function setCache($cache) {

        if (is_array($cache)) {
            $this->cache = new CacheDTO($cache);
        } elseif (is_object($cache)) {
            $this->cache = $cache;
        }
    }


    /**
     * @return \Hasty2\DTO\Collection\CacheDTO
     */
    public
    function getCache() {

        return $this->cache;
    }

    /**
     * @param mixed $queryId
     */
    public
    function setQueryId(
        $queryId
    ) {

        $this->queryId = $queryId;
    }

    /**
     * @return mixed
     */
    public
    function getQueryId() {

        return $this->queryId;
    }

    /**
     * @param mixed $queryTime
     */
    public
    function setQueryTime(
        $queryTime
    ) {

        $this->queryTime = $queryTime;
    }

    /**
     * @return mixed
     */
    public
    function getQueryTime() {

        return $this->queryTime;
    }

}