<?php

namespace Hasty2\DTO\Collection;

use Hasty2\DTO\DTOBase;

class ApiDTO extends DTOBase {

    public $queryTime;
    public $queryId;

    /**
     * @param mixed $queryId
     */
    public function setQueryId($queryId) {

        $this->queryId = $queryId;
    }

    /**
     * @return mixed
     */
    public function getQueryId() {

        return $this->queryId;
    }

    /**
     * @param mixed $queryTime
     */
    public function setQueryTime($queryTime) {

        $this->queryTime = $queryTime;
    }

    /**
     * @return mixed
     */
    public function getQueryTime() {

        return $this->queryTime;
    }

}