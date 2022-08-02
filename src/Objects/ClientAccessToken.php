<?php

namespace Retinens\PontoPhp\Data;

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