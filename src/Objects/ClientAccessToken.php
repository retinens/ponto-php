<?php

namespace Retinens\PontoPhp\Objects;

class ClientAccessToken
{
    public string $access_token;
    public array $header;

    public function __construct($access_token)
    {
        $this->access_token = $access_token;
        $this->header = [
            'Authorization' => 'Bearer '.$this->access_token
        ];
    }
}
