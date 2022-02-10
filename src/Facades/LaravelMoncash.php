<?php

namespace Fruitsbytes\LaravelMoncash\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Fruitsbytes\LaravelMoncash\LaravelMoncash
 */
class LaravelMoncash extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-moncash';
    }
}
