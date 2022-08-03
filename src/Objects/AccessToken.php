<?php

namespace Retinens\PontoPhp\Objects;

class AccessToken
{
    public string $access_token;
    public string $refresh_token;
    public array $header;

    public function __construct($accessToken, $refreshToken)
    {
        $this->access_token = $accessToken;
        $this->refresh_token = $refreshToken;
        $this->header = [
            'Authorization' => 'Bearer '.$this->access_token
        ];
    }
}
