<?php

namespace Hasty2\Db\Entities;

use \Hasty2\Db\EntityBase;

/**
 * @Entity
 * @table(name="logs")
 */
class Logs extends EntityBase {

    /**
     * @Column(type="integer")
     * @Id
     * @GeneratedValue
     */
    public $id = null;

    /**
     * @Column(type="datetime")
     * @var \DateTime
     */
    public $time = null;

    /** @Column(type="varchar", columnDefinition="ENUM('debug', 'error', 'info', 'warning)") */
    public $type = null;

    /** @Column(type="string") */
    public $message = null;

    /** @Column(type="string") */
    public $context_data = null;

    /**
     * @param mixed $context_data
     */
    public function setContextData($context_data) {
        $this->context_data = $context_data;
    }

    /**
     * @return mixed
     */
    public function getContextData() {
        return $this->context_data;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message) {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getMessage() {
        return $this->message;
    }

    /**
     * @param \DateTime $time
     */
    public function setTime($time) {
        $this->time = $time;
    }

    /**
     * @return \DateTime
     */
    public function getTime() {
        return $this->time;
    }

    /**
     * @param mixed $type
     */
    public function setType($type) {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getType() {
        return $this->type;
    }

    /**
     * @param mixed $id
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }


}
