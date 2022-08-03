<?php

namespace Retinens\PontoPhp\Services;

use Retinens\PontoPhp\PontoClient;

class PontoService
{
    public PontoClient $client;

    public function __construct(PontoClient $client)
    {
        $this->client = $client;
    }
}
