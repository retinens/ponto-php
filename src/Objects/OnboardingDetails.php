<?php

namespace Retinens\PontoPhp\Objects;

class OnboardingDetails
{
    public array $attributes = [];
    public ?string $id;

    public function __construct(array $data, ?string $id = null)
    {
        $this->attributes = $data;
        $this->id = $id;
    }
}
