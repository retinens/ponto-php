<?php

namespace Retinens\PontoPhp\Objects;

class Transaction
{
    public string $id;
    public ?string $valueDate;
    public ?string $updatedAt;
    public ?string $remittanceInformationType;
    public ?string $remittanceInformation;
    public ?string $purposeCode;
    public ?string $proprietaryBankTransactionCode;
    public ?string $mandateId;
    public ?string $internalReference;
    public ?string $fee;
    public ?string $executionDate;
    public ?string $endToEndId;
    public ?string $digest;
    public ?string $description;
    public ?string $currency;
    public ?string $creditorId;
    public ?string $createdAt;
    public ?string $counterpartReference;
    public ?string $counterpartName;
    public ?string $cardReferenceType;
    public ?string $cardReference;
    public ?string $bankTransactionCode;
    public ?float $amount;
    public ?string $additionalInformation;

    public function __construct(string $id, array $attributes)
    {
        $this->id = $id;
        $this->valueDate = $attributes['valueDate'];
        $this->updatedAt = $attributes['updatedAt'];
        $this->remittanceInformationType = $attributes['remittanceInformationType'];
        $this->remittanceInformation = $attributes['remittanceInformation'];
        $this->purposeCode = $attributes['purposeCode'];
        $this->proprietaryBankTransactionCode = $attributes['proprietaryBankTransactionCode'];
        $this->mandateId = $attributes['mandateId'];
        $this->internalReference = $attributes['internalReference'];
        $this->fee = $attributes['fee'];
        $this->executionDate = $attributes['executionDate'];
        $this->endToEndId = $attributes['endToEndId'];
        $this->digest = $attributes['digest'];
        $this->description = $attributes['description'];
        $this->currency = $attributes['currency'];
        $this->creditorId = $attributes['creditorId'];
        $this->createdAt = $attributes['createdAt'];
        $this->counterpartReference = $attributes['counterpartReference'];
        $this->counterpartName = $attributes['counterpartName'];
        $this->cardReferenceType = $attributes['cardReferenceType'];
        $this->cardReference = $attributes['cardReference'];
        $this->bankTransactionCode = $attributes['bankTransactionCode'];
        $this->amount = $attributes['amount'];
        $this->additionalInformation = $attributes['additionalInformation'];
    }
}
