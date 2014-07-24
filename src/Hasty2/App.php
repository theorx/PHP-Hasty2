<?php


namespace Hasty2;

use Hasty2\DTO\Collection\ApiDTO;
use Hasty2\DTO\Collection\ErrorDTO;
use Hasty2\Router\Router;
use Hasty2\DTO\Collection\ResponseDTO;
use Hasty2\Formatter\OutputFormatter;
use Hasty2\Cache\Cache;


class App {

    public function __construct() {

        //load configuration
        $configuration = include(__DIR__ . '/../../config/configuration.php');
        \Hasty2\Config\Config::load($configuration);
    }

    /**
     * @param null $path
     * @param null $params
     * @param bool $returnOutput
     *
     * @return string
     */
    public function initialize($path = null, $params = null, $returnOutput = false) {

        Log\Timer::start('request');
        if ($path === null && isset($_GET['path'])) {
            $path = $_GET['path'];
        } else {
            $path = '';
        }

        if ($params === null && isset($_POST) && isset($_GET)) {
            $params = array_merge($_POST, $_GET);
        } else {
            $params = [];
        }

        $router          = new Router();
        $responseDTO     = new ResponseDTO([
            'api'   => new ApiDTO(['queryId' => md5(microtime() . '_' . mt_rand(0, 256000))]),
            'error' => new ErrorDTO(['code' => 200, 'message' => 'ok'])
        ]);
        $outputFormatter = new OutputFormatter();

        try {

            $responseDTO->setResult(
                Cache::getInstance()->SGClosure(
                    md5($path . print_r($params, true)),
                    function () use ($router, $path, $params) {

                        return $router->route($path, $params);
                    },
                    isset($params['cacheTtl']) ? intval($params['cacheTtl']) : 0
                )
            );

            $api = $responseDTO->getApi();
            $api->setCache(Cache::getInstance()->lastStatus());
            $outputFormatter->setInput($responseDTO);

        } catch (\Exception $e) {
            $responseDTO->setError(
                new ErrorDTO(['message' => $e->getMessage(), 'code' => $e->getCode(), 'exceptionName' => get_class($e)])
            );
            $outputFormatter->setInput($responseDTO);
        }
        Log\Timer::stop('request');

        $api            = $responseDTO->getApi();
        $api->queryTime = Log\Timer::getSeconds('request');
        $responseDTO->setApi($api);
        if ($returnOutput) {
            return $outputFormatter->toJson();
        } else {
            print $outputFormatter->toJson(true);
        }

    }

}