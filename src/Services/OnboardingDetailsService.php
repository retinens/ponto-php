<?php

namespace Retinens\PontoPhp\Services;

use Retinens\PontoPhp\Objects\ClientAccessToken;
use Retinens\PontoPhp\Objects\OnboardingDetails;
use Retinens\PontoPhp\PontoClient;

class OnboardingDetailsService extends PontoService
{
    public ClientAccessToken $clientAccessToken;

    public function __construct(
        PontoClient $client,
        ClientAccessToken $clientAccessToken
    ) {
        parent::__construct($client);
        $this->clientAccessToken = $clientAccessToken;
    }

    public function sendOnboardingDetails(
        OnboardingDetails $onboardingDetails,
    ): OnboardingDetails {
        $payload = [
            'data' => [
                'type' => 'onboardingDetails',
                'attributes' => $onboardingDetails->attributes,
            ],
        ];
        $headers = $this->clientAccessToken->header;

        $response = $this->client->httpClient->post('onboarding-details', ['json' => $payload, 'headers' => $headers]);
        $responseData = json_decode($response->getBody(), false)?->data;

        $onboardingDetails->id = $responseData->id;

        return $onboardingDetails;
    }
}
