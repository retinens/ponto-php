<?php

namespace Retinens\PontoPhp\Services;

use Retinens\PontoPhp\Objects\AccessToken;
use Retinens\PontoPhp\Objects\Account;
use Retinens\PontoPhp\Objects\Synchronisation;
use Retinens\PontoPhp\Objects\Transaction;
use Retinens\PontoPhp\PontoClient;

class TransactionsService extends PontoService
{
    public AccessToken $accessToken;

    public function __construct(PontoClient $client, AccessToken $accessToken)
    {
        parent::__construct($client);
        $this->accessToken = $accessToken;
    }

    public function getList(Account $account, $pageCount = 10, $pageBefore = null, $pageAfter = null): array
    {
        $headers = $this->accessToken->header;
        $query = [
            'page' => [
                'limit' => $pageCount,
                'before' => $pageBefore,
                'after' => $pageAfter,
            ]
        ];
        $response = $this->client->httpClient->get("accounts/$account->id/transactions", compact('query','headers'));
        $responseData = json_decode($response->getBody(), true)['data'];
        $transactions = [];
        foreach ($responseData as $transaction) {
            $transactions[] = new Transaction($transaction['id'], $transaction['attributes']);
        }
        return $transactions;
    }

    public function getTransaction(Account $account, $id): Transaction
    {
        $header = $this->accessToken->header;
        $response = $this->client->httpClient->get("accounts/$account->id/transactions/$id", ['headers' => $header]);
        $responseData = json_decode($response->getBody(), true)['data'];
        return new Transaction($responseData['id'], $responseData['attributes']);
    }
}
