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
     * Initializes the whole application.
     * Sets parameters and path from environment if not defined
     * Caches request response on demand.
     *
     * @param null $path
     * @param null $params
     * @param bool $returnOutput
     * @return string
     */
    public function initialize($path = null, $params = null, $returnOutput = false) {


        //If path is set, then use from GET variable, otherwise use defined or set to empty string
        if ($path === null && isset($_GET['path'])) {
            $path = $_GET['path'];
        } else {
            $path = '';
        }

        //If params are set then use these, otherwise merge POST and GET.
        if ($params === null && isset($_POST) && isset($_GET)) {
            $params = array_merge($_POST, $_GET);
        } else {
            $params = [];
        }


        //Prepare responseDTO, set queryId and default return code and message.
        $responseDTO = new ResponseDTO([
            'api'   => new ApiDTO(['queryId' => md5(microtime() . '_' . mt_rand(0, 256000))]),
            'error' => new ErrorDTO(['code' => 200, 'message' => 'ok'])
        ]);

        //Instantiate OutputFormatter
        $outputFormatter = new OutputFormatter();

        //Attempt to get results from router and set response
        //Also using cache SGClosure for caching response on demand.
        try {
            //Instantiate router to manage routing.
            $router = new Router();

            Log\Timer::start('request');
            //Set result for response.
            $responseDTO->setResult(
            //Cache result from closure if required.
            //IF cache ise set to 0 then closure will be execute and result returned instantly.

                Cache::getInstance()->SGClosure(
                    md5($path . print_r($params, true)),
                    function () use ($router, $path, $params) {

                        return $router->route($path, $params);
                    },
                    isset($params['cache']) ? intval($params['cache']) : 0
                )
            );
            // If cache is set, only then return cache info.
            if (isset($params['cache'])) {
                $api = $responseDTO->getApi();
                $api->setCache(Cache::getInstance()->lastStatus());
            }
            //Set responseDTO to formatter so it could be printed out later.
            $outputFormatter->setInput($responseDTO);

        } catch(\Exception $e) {
            //If exception is thrown, then override ErrorDTO with message and code from thrown exception.
            $responseDTO->setError(
                new ErrorDTO(['message' => $e->getMessage(), 'code' => $e->getCode(), 'exceptionName' => get_class($e)])
            );
            //Overwrites the output with new exception.
            $outputFormatter->setInput($responseDTO);
        } finally {
            Log\Timer::stop('request');

            //Update response time after processing the request.
            $api            = $responseDTO->getApi();
            $api->queryTime = Log\Timer::getSeconds('request');
            $responseDTO->setApi($api);

            //Return output
            if ($returnOutput) {
                return $outputFormatter->toJson();
            } else {
                print $outputFormatter->toJson(true);
            }
        }
    }

}