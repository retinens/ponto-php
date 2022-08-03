<?php

namespace Retinens\PontoPhp;

use Retinens\PontoPhp\Exceptions\PontoClientException;
use Retinens\PontoPhp\Objects\OnboardingDetails;

class OAuthUrlGenerator
{
    public bool $live = false;
    public string $verifier = '';

    public function __construct()
    {
    }


    private static function base64url_encode(string $pack): string
    {
        $base64 = base64_encode($pack);
        $base64 = trim($base64, '=');
        return strtr($base64, '+/', '-_');
    }

    public function getUrl(
        string $pontoClientId,
        string $urlRedirect,
        string $state,
        array $scope = ['offline_access', 'ai', 'name'],
        ?OnboardingDetails $onboardingDetails = null
    ): string {
        if (strlen($this->verifier) == 0) {
            throw new PontoClientException('You should generate a verifier before generating the URL.');
        }
        $challenge = self::base64url_encode(
            pack('H*', hash('sha256', $this->verifier))
        );
        $scopeStr = implode(' ', $scope);

        $baseUri = 'https://sandbox-authorization.myponto.com';
        if ($this->live) {
            $baseUri = 'https://authorization.myponto.com';
        }

        return "$baseUri/oauth2/auth?client_id=$pontoClientId&redirect_uri=$urlRedirect&response_type=code&scope=$scopeStr&state=$state&code_challenge=$challenge&code_challenge_method=S256".($onboardingDetails?->id ? "&onboarding_details_id=$onboardingDetails->id" : '');
    }

    public function generateVerifier(): string
    {
        $random = bin2hex(openssl_random_pseudo_bytes(32));
        $this->verifier = self::base64url_encode(pack('H*', $random));
        return $this->verifier;
    }
}
