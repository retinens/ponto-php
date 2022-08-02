<?php

namespace Retinens\PontoPhp\Objects;

class ClientAccessToken
{
    public string $accessToken;

    public function __construct($accessToken)
    {
        $this->accessToken = $accessToken;
    }
}