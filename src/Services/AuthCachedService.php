<?php

namespace FruitsBytes\Laravel\MonCash\Services;

use FruitsBytes\Laravel\MonCash\Exception;
use FruitsBytes\Laravel\MonCash\Facades\HTTPFacade;
use Exception as E;
use Illuminate\Support\Facades\Cache;

class AuthCachedService extends AuthService
{

    /**
     * @return string
     * @throws Exception
     */
    public function getToken(): string
    {
        try {
            return Cache::remember('token', config('moncash.ttl', 50), function () {

                $response = HTTPFacade::postFormURLEncoded('/oauth/token', [
                    'scope'      => 'read,write',
                    'grant_type' => 'client_credentials'
                ], 'Basic');


                $response->throw();

                return $response['access_token'];

            });

        } catch (E $e) {
            throw  new Exception('Could not authenticate request', 0, $e);
        }
    }

}
