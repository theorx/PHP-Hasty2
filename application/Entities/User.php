<?php

namespace Hasty2\Entities {

    /**
     * @Entity
     * @table(name="user")
     */
    class User extends \Hasty2\Db\EntityBase {

        /**
         * @Column(type="integer")
         * @Id
         * @GeneratedValue
         */
        public $id = null;
        /** @Column(length=32) */
        public $name = null;
        /** @Column(type="integer") */
        public $age = null;

        public $active = null;

        /**
         * @param null $name
         */
        public function setName($name) {

            $this->name = $name;
        }

        /**
         * @return null
         */
        public function getName() {

            return $this->name;
        }

        /**
         * @param null $age
         */
        public function setAge($age) {

            $this->age = $age;
        }

        /**
         * @return null
         */
        public function getAge() {

            return $this->age;
        }

        /**
         * @param null $active
         */
        public function setActive($active) {

            $this->active = $active;
        }

        /**
         * @return null
         */
        public function getActive() {

            return $this->active;
        }


    }
}