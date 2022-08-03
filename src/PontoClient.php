<?php

namespace Retinens\PontoPhp;

use GuzzleHttp\Client;
use Retinens\PontoPhp\Objects\AccessToken;
use Retinens\PontoPhp\Objects\BasicAuthDetails;
use Retinens\PontoPhp\Objects\ClientAccessToken;
use Retinens\PontoPhp\Objects\OnboardingDetails;

class PontoClient
{
    public Client $httpClient;

    public function __construct($certPath, $sslPath, $certSecret)
    {
        $this->httpClient = new  Client([
            'base_uri' => 'https://api.ibanity.com/ponto-connect/',
            'cert' => [$certPath, $certSecret],
            'ssl_key' => [$sslPath],
            'headers' => [
                'Accept' => 'application/json'
            ],
        ]);
    }
}
