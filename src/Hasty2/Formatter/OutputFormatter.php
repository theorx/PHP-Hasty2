<?php

namespace Hasty2\Formatter;

class OutputFormatter {

    private $_input;

    public function __construct($input = null) {

        $this->setInput($input);
    }

    public function setInput($input) {

        $this->_input = $input;
    }

    public function getInput() {

        return $this->_input;
    }

    public function toJson($setHeaders = false) {

        if ($setHeaders) {
            header('Content-type: application/json');
        }

        return json_encode($this->getInput());
    }

    public function toArray() {

        return (array)$this->getInput();
    }

}