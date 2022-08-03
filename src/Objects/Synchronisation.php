<?php

namespace Retinens\PontoPhp\Objects;

class Synchronisation
{
    public ?string $updatedAt;
    public ?string $status;
    public ?array $errors;
    public ?string $createdAt;
    public ?string $id;
    public ?string $resourceType;
    public ?string $resourceId;
    public ?string $subtype;
    public ?string $customerIpAddress;

    public function __construct($id, $attributes)
    {
        $this->id = $id;
        $this->updatedAt = $attributes['updatedAt'] ?? null;
        $this->status = $attributes['status'] ?? null;
        $this->errors = $attributes['errors'] ?? null;
        $this->createdAt = $attributes['createdAt'] ?? null;
        $this->resourceType = $attributes['resourceType'] ?? null;
        $this->resourceId = $attributes['resourceId'] ?? null;
        $this->subtype = $attributes['subtype'] ?? null;
        $this->customerIpAddress = $attributes['customerIpAddress'] ?? null;
    }
}
