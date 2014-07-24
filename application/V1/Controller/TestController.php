<?php

namespace V1\Controller;

class TestController extends \Hasty2\Controller\ControllerBase {

    public function TestAction(\V1\DTO\Input\InputDTO $input, \V1\DTO\Output\OutputDTO $output) {


        //Do Some Work

      //  usleep(500000);

        $output->populate(['apiToken' => '1234', 'validUntil' => time()]);

        return $output;

    }

    public function loginAction(\V1\DTO\Input\TestValidatingInputDTO $input, $limit) {


        $model = new \V1\Model\UserModel();

        return $input;

    }

}