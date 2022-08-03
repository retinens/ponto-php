<?php

namespace Retinens\PontoPhp\Objects;

class BasicAuthDetails
{
    public string $clientId;
    public string $clientSecret;
    public array $header;

    public function __construct(string $clientId, string $clientSecret)
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->header = ['Authorization' => 'Basic '.base64_encode($this->clientId.":".$this->clientSecret)];
    }
}
