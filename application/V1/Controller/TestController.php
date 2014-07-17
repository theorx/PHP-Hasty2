<?php

namespace V1\Controller;

class TestController extends \Hasty2\Controller\ControllerBase {

    public function TestAction(\V1\DTO\Input\InputDTO $input, \V1\DTO\Output\OutputDTO $output) {

        return $input;

    }

}