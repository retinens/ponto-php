<?php

namespace Retinens\PontoPhp\Services;

use Retinens\PontoPhp\Objects\AccessToken;
use Retinens\PontoPhp\Objects\Account;
use Retinens\PontoPhp\Objects\Synchronisation;
use Retinens\PontoPhp\Objects\Transaction;
use Retinens\PontoPhp\PontoClient;

class ReauthorizationRequestsService extends PontoService
{
    public AccessToken $accessToken;

    public function __construct(PontoClient $client, AccessToken $accessToken)
    {
        parent::__construct($client);
        $this->accessToken = $accessToken;
    }

    public function getUrl(Account $account, string $redirectUrl): string
    {
        $header = $this->accessToken->header;
        $response = $this->client->httpClient->post("accounts/$account->id/reauthorization-requests", [
            'headers' => $header,
            'json' => [
                'data' => [
                    'type' => 'reauthorizationRequest',
                    'attributes' => [
                        'redirectUri' => $redirectUrl,
                    ]
                ]
            ]
        ]);
        $responseData = json_decode($response->getBody(), true)['data'];
        return $responseData['links']['redirect'];
    }

}
