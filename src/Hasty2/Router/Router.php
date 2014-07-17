<?php


namespace Hasty2\Router;

use Hasty2\DTO\Collection\RequestPathDTO;

class Router {

    /**
     * @param $path
     * @param $input
     *
     * @return mixed
     * @throws \Hasty2\Exception\InvalidPathException
     * @throws \Hasty2\Exception\InvalidMethodException
     */
    public function route($path, $input) {

        $requestPathDto = $this->parsePath($path);

        if (class_exists($requestPathDto->getClassPath())) {
            $className = $requestPathDto->getClassPath();
            $controller = new $className;
            //check if loaded class is controller

            if (is_a($controller, 'Hasty2\Controller\ControllerBase')) {
                if (method_exists($controller, $requestPathDto->getMethod())) {
                    //Implement cache here
                    $reflector = new \ReflectionClass($controller);

                    //Get the parameters of a method

                    $parameters = $reflector->getMethod($requestPathDto->getMethod())->getParameters();
                    $callParams = [];

                    foreach ($parameters as $param) {

                        if ($param->getClass()) {
                            $paramClassName = $param->getClass()->name;
                            $parameterObject = new $paramClassName();
                            if (is_a($parameterObject, 'Hasty2\DTO\InputDTO')) {
                                $parameterObject->populate($input);
                            }
                            $callParams[] = $parameterObject;
                        } else {

                            if (isset($param, $input, $input[$param->getName()])) {
                                $callParams[] = $input[$param];
                            } else {
                                $callParams[] = "";
                            }
                        }
                    }

                    return call_user_func_array([$controller, $requestPathDto->getMethod()], $callParams);
                } else {
                    throw new \Hasty2\Exception\InvalidMethodException;
                }
            } else {
                throw new \Hasty2\Exception\InvalidControllerException($requestPathDto->getController());
            }
        } else {
            //load default class
            throw new \Hasty2\Exception\InvalidPathException($path);
        }

    }

    /**
     * @param $path
     *
     * @return RequestPathDTO
     */
    public function parsePath($path) {

        $pathParts = explode("/", $path);

        return new RequestPathDTO([
            'version'    => ucfirst(isset($pathParts[0]) ? htmlentities($pathParts[0], ENT_QUOTES) : ''),
            'controller' => ucfirst(isset($pathParts[1]) ? htmlentities($pathParts[1], ENT_QUOTES) . 'Controller' : ''),
            'method'     => ucfirst(isset($pathParts[2]) ? htmlentities($pathParts[2], ENT_QUOTES) . 'Action' : '')
        ]);

    }


}