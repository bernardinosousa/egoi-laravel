<?php

namespace Bernardinosousa\EgoiLaravel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Bernardinosousa\EgoiLaravel\EgoiLaravel
 */
class EgoiLaravel extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Bernardinosousa\EgoiLaravel\EgoiLaravel::class;
    }
}
