<?php

namespace Retinens\PontoPhp\Objects;

class ClientAccessToken
{
    public string $accessToken;
    public string $validUntil;

    public function __construct($accessToken, $validUntil)
    {
        $this->accessToken = $accessToken;
        $this->validUntil = $validUntil;
    }
}