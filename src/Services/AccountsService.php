<?php

namespace Retinens\PontoPhp\Services;

use Retinens\PontoPhp\Objects\AccessToken;
use Retinens\PontoPhp\Objects\Account;
use Retinens\PontoPhp\Objects\Synchronisation;
use Retinens\PontoPhp\PontoClient;

class AccountsService extends PontoService
{
    public AccessToken $accessToken;

    public function __construct(PontoClient $client, AccessToken $accessToken)
    {
        parent::__construct($client);
        $this->accessToken = $accessToken;
    }

    public function getList($pageCount = 10, $pageBefore = null, $pageAfter = null): array
    {
        $headers = $this->accessToken->header;
        $query = [
          'page' => [
              'limit' => $pageCount,
              'before' => $pageBefore,
              'after' => $pageAfter,
          ]
        ];
        $response = $this->client->httpClient->get('accounts', compact('query','headers'));
        $responseData = json_decode($response->getBody(), true)['data'];
        $accounts = [];
        foreach ($responseData as $account) {
            $account['attributes']['availability'] = $account['meta']['availability'];
            $account['attributes']['financialInstitutionId'] = $account['relationships']['financialInstitution']['data']['id'];
            $synchronisation = new Synchronisation(
                $account['meta']['latestSynchronization']['id'],
                $account['meta']['latestSynchronization']['attributes']
            );
            $accounts[] = new Account($account['id'], $account['attributes'], $synchronisation);
        }
        return $accounts;
    }

    public function getAccount($id): Account
    {
        $header = $this->accessToken->header;
        $response = $this->client->httpClient->get("accounts/$id", ['headers' => $header]);
        $responseData = json_decode($response->getBody(), true)['data'];
        $responseData['attributes']['availability'] = $responseData['meta']['availability'];
        $synchronisation = new Synchronisation(
            $responseData['meta']['latestSynchronization']['id'],
            $responseData['meta']['latestSynchronization']['attributes']
        );
        return new Account($responseData['id'], $responseData['attributes'], $synchronisation);
    }

    public function revokeAccount($id): void
    {
        $header = $this->accessToken->header;
        $this->client->httpClient->delete("accounts/$id", ['headers' => $header]);
    }

}
