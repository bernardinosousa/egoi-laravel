<?php

namespace Bernardinosousa\EgoiLaravel;

use EgoiClient\Configuration;
use Exception;
use Illuminate\Support\Str;

class EgoiLaravel
{
    private $apiKey;

    private $config;

    private $guzzleOptions;

    public function __construct(string $apiKey = null)
    {
        $this->apiKey = $apiKey ?: config('egoi-laravel.api_key');
        $this->config = Configuration::getDefaultConfiguration()->setApiKey('Apikey', $this->apiKey);
        $this->guzzleOptions = config('egoi-laravel.guzzle_options') ?? [];
    }

    public function getConfig()
    {
        return $this->config;
    }

    public function getGuzzleOptions()
    {
        return $this->guzzleOptions;
    }

    public function api($name)
    {
        $className = $name;
        $apiMethodExists = class_exists($className = "\Bernardinosousa\EgoiLaravel\Api\\".Str::ucfirst($className));

        if (! $apiMethodExists) {
            return new Exception("Invalid class name: $className");
        }

        return new $className($this);
    }
}
