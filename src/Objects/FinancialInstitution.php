<?php

namespace Retinens\PontoPhp\Objects;

class FinancialInstitution
{
    public string $id;
    public string $status;
    public ?string $sharedBrandReference;
    public ?string $sharedBrandName;
    public ?string $secondaryColor;
    public ?string $primaryColor;
    public array $periodicPaymentsProductTypes = [];
    public bool $periodicPaymentsEnabled;
    public array $paymentsProductTypes = [];
    public bool $paymentsEnabled;
    public ?string $maintenanceType;
    public ?string $maintenanceTo;
    public ?string $maintenanceFrom;
    public ?string $logoUrl;
    public bool $futureDatedPaymentsAllowed;
    public bool $deprecated;
    public ?string $country;
    public array $bulkPaymentsProductTypes = [];
    public bool $bulkPaymentsEnabled;
    public ?string $bic;

    public function __construct(string $id, array $attributes)
    {
        $this->id = $id;
        $this->status = $attributes['status'];
        $this->sharedBrandReference = $attributes['sharedBrandReference'];
        $this->sharedBrandName = $attributes['sharedBrandName'];
        $this->secondaryColor = $attributes['secondaryColor'];
        $this->primaryColor = $attributes['primaryColor'];
        $this->periodicPaymentsProductTypes = $attributes['periodicPaymentsProductTypes'];
        $this->periodicPaymentsEnabled = $attributes['periodicPaymentsEnabled'];
        $this->paymentsProductTypes = $attributes['paymentsProductTypes'];
        $this->paymentsEnabled = $attributes['paymentsEnabled'];
        $this->maintenanceType = $attributes['maintenanceType'];
        $this->maintenanceTo = $attributes['maintenanceTo'];
        $this->maintenanceFrom = $attributes['maintenanceFrom'];
        $this->logoUrl = $attributes['logoUrl'];
        $this->futureDatedPaymentsAllowed = $attributes['futureDatedPaymentsAllowed'];
        $this->deprecated = $attributes['deprecated'];
        $this->country = $attributes['country'];
        $this->bulkPaymentsProductTypes = $attributes['bulkPaymentsProductTypes'];
        $this->bulkPaymentsEnabled = $attributes['bulkPaymentsEnabled'];
        $this->bic = $attributes['bic'];
    }
}
