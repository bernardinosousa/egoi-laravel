<?php

namespace Bernardinosousa\EgoiLaravel\Api;

use Exception;
use Bernardinosousa\EgoiLaravel\EgoiLaravel;
use GuzzleHttp\Client;

abstract class AbstractApi
{
    protected $egoiLaravel;
    protected $apiInstance;

    public function __construct(EgoiLaravel $egoiLaravel)
    {
        $this->egoiLaravel = $egoiLaravel;
    }

    public function __call($method, $args)
    {
        if(!method_exists($this->apiInstance, $method)) {
            $className = get_class($this->apiInstance);
            throw new Exception("Invalid method $method from class $className");
        }

        return call_user_func_array([$this->apiInstance, $method], $args);
    }

    protected function getHttpClient()
    {
        if(!empty($this->egoiLaravel->getGuzzleOptions())) {
            return new Client(
                $this->egoiLaravel->getGuzzleOptions()
            );
        }
        
        return new Client();
    }
}