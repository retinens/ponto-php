<?php

namespace Retinens\PontoPhp\Services;

use Retinens\PontoPhp\Objects\AccessToken;
use Retinens\PontoPhp\Objects\BasicAuthDetails;
use Retinens\PontoPhp\Objects\ClientAccessToken;
use Retinens\PontoPhp\PontoClient;

class TokensService extends PontoService
{
    public BasicAuthDetails $authDetails;

    public function __construct(PontoClient $client, $authDetails)
    {
        parent::__construct($client);
        $this->authDetails = $authDetails;
    }

    public function refreshAccessToken(AccessToken $token): AccessToken
    {
        $payload = [
            'grant_type' => 'refresh_token',
            'client_id' => $this->authDetails->clientId,
            'refresh_token' => $token->refresh_token,
        ];
        $header = $this->authDetails->header;
        $response = $this->client->httpClient->post('oauth2/token', ['json' => $payload, 'headers' => $header]);
        $responseData = json_decode($response->getBody(), false);
        $token->access_token = $responseData->access_token;
        $token->refresh_token = $responseData->refresh_token;
        return $token;
    }

    public function revokeAccessToken(AccessToken $token): void
    {
        $payload = [
            'token' => $token->refresh_token,
        ];
        $header = $this->authDetails->header;
        $this->client->httpClient->post('oauth2/revoke', ['json' => $payload, 'headers' => $header]);
    }

    public function requestInitialToken($code, $redirectUri, $verifier): AccessToken
    {
        $payload = [
            'grant_type' => 'authorization_code',
            'code' => $code,
            'client_id' => $this->authDetails->clientId,
            'redirect_uri' => $redirectUri,
            'code_verifier' => $verifier
        ];

        $header = $this->authDetails->header;

        $response = $this->client->httpClient->post('oauth2/token', ['json' => $payload, 'headers'=> $header]);
        $responseData = json_decode($response->getBody(), false);
        return new AccessToken($responseData->access_token, $responseData->refresh_token);
    }

    public function getClientAccessToken(): ClientAccessToken
    {
        $payload = [
            'grant_type' => 'client_credentials',
        ];
        $authHeader = $this->authDetails->header;

        $response = $this->client->httpClient->post("oauth2/token", ['json' => $payload, 'headers' => $authHeader]);
        $responseData = json_decode($response->getBody(), false);

        return new ClientAccessToken(
            $responseData->access_token,
        );
    }
}
