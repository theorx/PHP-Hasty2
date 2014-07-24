<?php

namespace Hasty2\DTO\Collection;

use Hasty2\DTO\DTOBase;

class CacheDTO extends DTOBase {

    /**
     * @var integer
     */
    public $ttl;
    /**
     * @var boolean
     */
    public $lastResultFromCache;

    /**
     * @param mixed $lastResultFromCache
     */
    public function setLastResultFromCache($lastResultFromCache) {

        $this->lastResultFromCache = $lastResultFromCache;
    }

    /**
     * @return mixed
     */
    public function getLastResultFromCache() {

        return $this->lastResultFromCache;
    }

    /**
     * @param mixed $ttl
     */
    public function setTtl($ttl) {

        $this->ttl = $ttl;
    }

    /**
     * @return mixed
     */
    public function getTtl() {

        return $this->ttl;
    }


}