<?php

namespace FruitsBytes\Laravel\MonCash\Facades;

use FruitsBytes\Laravel\MonCash\Models\Payment;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Client\Response;

/**
 * @method  static string createPayement(int $amount, ?string $orderId)
 * @method  static Payment getOrder(string $orderId);
 * @method  static Payment getTransaction(string $orderId);
 * @method  static Response getRawTransaction(string|int $transactionId)
 * @method  static Payment rawToPayment(Response $response)
 *
 */
class APIFacade
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
        return (app()->make('App\Services\MonCash\APIService'))->$name(...$arguments);
    }
}
