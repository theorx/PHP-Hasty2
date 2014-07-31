<?php


namespace Hasty2\Router;

use Hasty2\DTO\Collection\RequestPathDTO;
use Hasty2\Cache\Cache;
use Hasty2\Config\Config;

class Router {

    /**
     * @param $path
     * @param $input
     *
     * @return mixed
     * @throws \Hasty2\Exception\InvalidPathException
     * @throws \Hasty2\Exception\InvalidControllerException
     * @throws \Hasty2\Exception\InvalidMethodException
     */
    public function route($path, $input) {
        //Get parse
        $requestPathDto = $this->parsePath($path);

        if (class_exists($requestPathDto->getClassPath())) {
            $className  = $requestPathDto->getClassPath();
            $controller = new $className;
            //check if loaded class is controller

            if (is_a($controller, 'Hasty2\Controller\ControllerBase')) {
                if (method_exists($controller, $requestPathDto->getMethod())) {

                    $parameters = Cache::getInstance()->get($requestPathDto->getClassPath() . $requestPathDto->getMethod());

                    if ($parameters == false) {

                        $reflector  = new \ReflectionClass($controller);
                        $parameters = $reflector->getMethod($requestPathDto->getMethod())->getParameters();

                        $parsedParams = [];
                        foreach ($parameters as $key => $value) {
                            $parsedParams[] = [
                                'object'     => is_object(($value->getClass())),
                                'class_name' => is_object(($value->getClass())) ? $value->getClass()->name : '',
                                'name'       => $value->getName()
                            ];
                        }
                        $parameters = $parsedParams;

                        $config = Config::get('application_cache_settings');
                        if (isset($config['controller_parameter_hinting']) && (int)$config['controller_parameter_hinting'] > 0) {
                            $ttl = (int)$config['controller_parameter_hinting'];
                        } else {
                            $ttl = 30;
                        }

                        Cache::getInstance()->store($requestPathDto->getClassPath(), $parameters, $ttl);
                    }

                    $callParams = [];
                    foreach ($parameters as $param) {

                        if ($param['object']) {
                            $paramClassName  = $param['class_name'];
                            $parameterObject = new $paramClassName();
                            if (is_a($parameterObject, 'Hasty2\DTO\InputDTO')) {
                                $parameterObject->populate($input);
                            }
                            $callParams[] = $parameterObject;
                        } else {

                            if (isset($param, $input, $input[$param['name']])) {

                                $callParams[] = $input[$param['name']];
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