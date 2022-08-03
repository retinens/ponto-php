<?php

namespace Retinens\PontoPhp\Objects;

class Account
{
    public ?Synchronisation $latestSynchronisation;
    public ?string $id;
    public ?string $financialInstitutionId;

    public ?string $availability;
    public ?string $authorizationExpirationExpectedAt;
    public ?string $authorizedAt;
    public ?float $availableBalance = 0.0;
    public ?string $availableBalanceChangedAt;
    public ?string $availableBalanceReferenceDate;
    public ?string $availableBalanceVariationObservedAt;
    public ?string $currency;
    public ?float $currentBalance = 0.0;
    public ?string $currentBalanceChangedAt;
    public ?string $currentBalanceReferenceDate;
    public ?string $currentBalanceVariationObservedAt;
    public bool $deprecated;
    public ?string $description;
    public ?string $holderName;
    public ?string $internalReference;
    public ?string $product;
    public ?string $reference;
    public ?string $referenceType;
    public ?string $subtype;

    public function __construct(string $id, ?array $attributes = null, ?Synchronisation $synchronisation = null)
    {
        $this->id = $id;
        $this->financialInstitutionId = $attributes['financialInstitutionId'] ?? '';
        $this->latestSynchronisation = $synchronisation ?? null;
        $this->authorizationExpirationExpectedAt = $attributes['authorizationExpirationExpectedAt'] ?? '';
        $this->authorizedAt = $attributes['authorizedAt'] ?? '';
        $this->availableBalance = $attributes['availableBalance'] ?? 0.0;
        $this->availableBalanceChangedAt = $attributes['availableBalanceChangedAt'] ?? '';
        $this->availableBalanceReferenceDate = $attributes['availableBalanceReferenceDate'] ?? '';
        $this->availableBalanceVariationObservedAt = $attributes['availableBalanceVariationObservedAt'] ?? '';
        $this->currency = $attributes['currency'] ?? '';
        $this->currentBalance = $attributes['currentBalance'] ?? 0.0;
        $this->currentBalanceChangedAt = $attributes['currentBalanceChangedAt'] ?? '';
        $this->currentBalanceReferenceDate = $attributes['currentBalanceReferenceDate'] ?? '';
        $this->currentBalanceVariationObservedAt = $attributes['currentBalanceVariationObservedAt'] ?? '';
        $this->deprecated = $attributes['deprecated'] ?? '';
        $this->description = $attributes['description'] ?? '';
        $this->holderName = $attributes['holderName'] ?? '';
        $this->internalReference = $attributes['internalReference'] ?? '';
        $this->product = $attributes['product'] ?? '';
        $this->reference = $attributes['reference'] ?? '';
        $this->referenceType = $attributes['referenceType'] ?? '';
        $this->subtype = $attributes['subtype'] ?? '';
        $this->availability = $attributes['availability'] ?? '';
    }
}
