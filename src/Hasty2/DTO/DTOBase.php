<?php

namespace Hasty2\DTO;

class DTOBase {

    public function __construct(array $input = null) {

        if ($input != null) {
            $this->populate($input);
        }
    }

    public function toArray() {

        return get_object_vars($this);
    }

    public function populate(array $input) {

        $vars = $this->toArray();

        foreach ($vars as $key => $value) {
            if (method_exists($this, 'set' . ucfirst($key))) {
                $this->{'set' . ucfirst($key)}(array_key_exists($key, $input) ? $input[$key] : '');
            }
        }

    }

}