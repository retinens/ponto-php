<?php

namespace Retinens\PontoPhp\Services;

use Retinens\PontoPhp\Objects\AccessToken;
use Retinens\PontoPhp\Objects\Account;
use Retinens\PontoPhp\Objects\FinancialInstitution;
use Retinens\PontoPhp\Objects\Synchronisation;
use Retinens\PontoPhp\PontoClient;

class FinancialInsitutionsService extends PontoService
{

    public function getList(
        $pageCount = 10,
        $pageBefore = null,
        $pageAfter = null,
        ?AccessToken $accessToken = null,
    ): array {
        $headers = [];
        if ($accessToken) {
            $headers = $accessToken->header;
        }
        $query = [
            'page' => [
                'limit' => $pageCount,
                'before' => $pageBefore,
                'after' => $pageAfter,
            ]
        ];
        $response = $this->client->httpClient->get('financial-institutions', compact('query', 'headers'));
        $responseData = json_decode($response->getBody(), true)['data'];
        $financialInstitutions = [];
        foreach ($responseData as $institution) {
            $financialInstitutions[] = new FinancialInstitution($institution['id'], $institution['attributes']);
        }
        return $financialInstitutions;
    }

    public function getFinancialInstitution($id, ?AccessToken $accessToken = null): FinancialInstitution
    {
        $headers = [];
        if ($accessToken) {
            $headers = $accessToken->header;
        }
        $response = $this->client->httpClient->get("financial-institutions/$id", compact('headers'));
        $responseData = json_decode($response->getBody(), true)['data'];
        return new FinancialInstitution($responseData['id'], $responseData['attributes']);
    }

    public function getListForOrganization(
        AccessToken $accessToken,
        $pageCount = 10,
        $pageBefore = null,
        $pageAfter = null
    ) {
        return $this->getList($pageCount,$pageBefore,$pageAfter,$accessToken);
    }

    public function getFinancialInstitutionForOrganization($id, AccessToken $accessToken)
    {
        return $this->getFinancialInstitution($id, $accessToken);
    }
}
