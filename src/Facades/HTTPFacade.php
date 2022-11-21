<?php

namespace FruitsBytes\Laravel\MonCash\Facades;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Client\Response;

/**
 * @method  static string getMode()
 * @method  static Response get(string $endpoint, array $params, string|null $auth = "Bearer")
 * @method  static Response postFormURLEncoded(string $endpoint, array $params, string|null $auth = "Bearer")
 * @method static Response postRaw(string $endpoint, mixed $rawData, string $contentType = 'application/json', string $auth = "Bearer")
 * @method static Response postJson(string $endpoint, mixed $rawData)
 */
class HTTPFacade
{

    /**
     * @param  string  $name
     * @param  array  $arguments
     *
     * @return null
     * @throws BindingResolutionException
     */
    public static function __callStatic(string $name, array $arguments)
    {
        return self::resolve($name, $arguments);
    }

    /**
     * @param  string  $name
     * @param  array  $arguments
     *
     * @return mixed
     * @throws BindingResolutionException
     */
    public static function resolve(string $name, array $arguments): mixed
    {
        return (app()->make('App\Services\MonCash\HTTPService'))->$name(...$arguments);
    }
}
