<?php

namespace FruitsBytes\Laravel\MonCash\Services;

use FruitsBytes\Laravel\MonCash\Facades\AuthFacade;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use JetBrains\PhpStorm\ExpectedValues;


class HTTPService
{
    const HOST_REST_API = [
        "sandbox"    => "https://sandbox.moncashbutton.digicelgroup.com/Api",
        "production" => "https://moncashbutton.digicelgroup.com/Api"
    ];

    public string $host;


    #[ExpectedValues(['sandbox', 'production'])]
    private string $mode;

    public function __construct()
    {
        $mode = config('moncash.mode', 'sandbox');

        if (in_array($mode, ['production', 'live'])) {
            $this->mode = 'production';
        } else {
            $this->mode = $mode;
        }

        $this->host = self::HOST_REST_API[$mode];
    }

    /**
     * @param  string  $endpoint
     * @param  array  $params
     * @param  string|null  $auth
     *
     * @return Response
     */
    public function get(
        string $endpoint,
        array $params,
        #[ExpectedValues(['Basic', 'Bearer', null])]
        string|null $auth = "Bearer"
    ): Response {
        return $this->appendAuth($auth)->get($this->endpointToURL($endpoint), $params);
    }

    /**
     * @param  string  $endpoint
     * @param  array  $params
     * @param  string|null  $auth
     *
     * @return Response
     */
    public function postFormURLEncoded(
        string $endpoint,
        array $params,
        #[ExpectedValues(['Basic', 'Bearer', null])]
        string|null $auth = "Bearer"
    ): Response {
        return $this->appendAuth($auth)->asForm()->post($this->endpointToURL($endpoint), $params);
    }

    /**
     * @param  string  $endpoint
     * @param  mixed  $rawData
     * @param  string  $contentType
     * @param  string|null  $auth
     *
     * @return Response
     */
    public function postRaw(
        string $endpoint,
        mixed $rawData,
        string $contentType = 'application/json',
        #[ExpectedValues(['Basic', 'Bearer', null])]
        string|null $auth = "Bearer"
    ): Response {
        return $this->appendAuth($auth)->withBody($rawData, $contentType)->post($this->endpointToURL($endpoint));
    }

    /**
     * @param  string  $endpoint
     * @param  mixed  $rawData
     *
     * @return Response
     */
    public function postJson(string $endpoint, mixed $rawData): Response
    {

        return $this->postRaw($endpoint, $rawData);
    }

    private function endpointToURL(string $endpoint): string
    {
        return $this->host."$endpoint";
    }

    /**
     * @param  string|null  $type
     *
     * @return PendingRequest
     */
    private function appendAuth(
        #[ExpectedValues(['Basic', 'Bearer', null])]
        string|null $type
    ): PendingRequest {

        $h = match ($type) {
            'Basic' => Http::withBasicAuth(AuthFacade::getClientId(), AuthFacade::getClientSecret() ),
            'Bearer' => Http::withToken(AuthFacade::getToken()),
            default => Http::withToken(''),
        };

        return $h->withHeaders(['Accept' => 'application/json']);

    }

    public function getMode():string
    {
        return $this->mode;
    }
}
