<?php

namespace Epic\R2RioBundle\Services\Api;

use Lsw\ApiCallerBundle\Call\HttpGetJson;
use Lsw\ApiCallerBundle\Caller\ApiCallerInterface;

class BaseService {

    protected $apiCaller = null;
    protected $apiKey = '';
    protected $apiServer = '';
    protected $apiType = 'Search';

    public function __construct(ApiCallerInterface $apiCaller, $apiKey, $apiServer)
    {
        $this->apiCaller = $apiCaller;
        $this->apiKey = $apiKey;
        $this->apiServer = $apiServer;
    }

    public function setApiType($apiType = 'Search')
    {
        $this->apiType = $apiType;
    }

    protected function callApi($parameters = array())
    {
        $parameters['key'] = $this->apiKey;
        $requestUrl = $this->apiServer.$this->apiType;

        $output = $this->apiCaller->call(new HttpGetJson($requestUrl, $parameters, true));

        return $output;
    }

    public function execute($parameters = array())
    {
        return $this->callApi($parameters);
    }
}