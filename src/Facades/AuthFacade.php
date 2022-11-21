<?php

namespace FruitsBytes\Laravel\MonCash\Facades;

use Illuminate\Contracts\Container\BindingResolutionException;


/**
 * @method static string getClientSecret()
 * @method static string getClientId()
 * @method static string getToken()
 */
class AuthFacade
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
        return (app()->make('App\Services\MonCash\AuthService'))->$name(...$arguments);
    }
}
