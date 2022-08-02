<?php

namespace Retinens\PontoPhp;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use Retinens\PontoPhp\Data\OnboardingDetails;

class PontoClient
{
    protected Client $client;

    public string $method = 'GET';
    public array $payload = [];
    public string $path;

    public function __construct($certPath, $sslPath, $certSecret)
    {

        $this->client = new  Client([
            'base_uri' => 'https://api.ibanity.com/ponto-connect',
            'cert' => [$certPath, $certSecret],
            'ssl_key' => [$sslPath],
            'headers' => [
                'Accept' => 'application/json'
            ],
        ]);

//        if ($basicAuthHeader) {
//            $this->httpClient->withBasicAuth(
//                config('services.ponto.client_id'),
//                config('services.ponto.client_secret')
//            );
//        }
//        if ($tenantAuth) {
//            $this->httpClient->withToken($tenantAuth->ponto_access_token);
//        }
    }

    public function sendRequest(): ResponseInterface
    {
        return match ($this->method) {
            'GET' => $this->client->get($this->path),
            'POST' => $this->client->post($this->path, $this->payload),
            'PATCH' => $this->client->patch($this->path, $this->payload),
            'DELETE' => $this->client->delete($this->path),
        };
    }

    public function prepareRequest(
        string $path,
        array $payload = [],
        string $method = 'GET'
    ): void {
        $this->path = $path;
        $this->payload = $payload;
        $this->method = $method;
    }

    public function sendOnboardingDetails(OnboardingDetails $onboardingDetails)
    {
        $payload = [
            'data' => [
                'type' => 'onboardingDetails',
                'attributes' => $onboardingDetails->toArray(),
            ],
        ];
        $response = $this->client->post('onboarding-details', [$payload]);

        return json_decode($response->getBody(), false)->data->id;
    }

}