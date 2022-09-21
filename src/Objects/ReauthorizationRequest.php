<?php

namespace Retinens\PontoPhp\Objects;

class ReauthorizationRequest
{
    public string $redirectUrl;
    public ?string $id;

    public function __construct(string $redirectUrl, ?string $id)
    {
        $this->redirectUrl = $redirectUrl;
        $this->id = $id;
    }


}
