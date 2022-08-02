<?php

namespace Retinens\PontoPhp\Data;

class OnboardingDetails
{
    public ?string $email;
    public ?string $firstName;
    public ?string $lastName;
    public ?string $organizationName;
    public ?string $enterpriseNumber;
    public ?string $vatNumber;
    public ?string $addressStreetAddress;
    public ?string $addressCountry;
    public ?string $addressPostalCode;
    public ?string $addressCity;
    public ?string $phoneNumber;

    public function __construct($data)
    {
        $this->email = $data['email'] ?? '';
        $this->firstName = $data['firstName'] ?? '';
        $this->lastName = $data['lastName'] ?? '';
        $this->organizationName = $data['organizationName'] ?? '';
        $this->enterpriseNumber = $data['enterpriseNumber'] ?? '';
        $this->vatNumber = $data['vatNumber'] ?? '';
        $this->addressStreetAddress = $data['addressStreetAddress'] ?? '';
        $this->addressCountry = $data['addressCountry'] ?? '';
        $this->addressPostalCode = $data['addressPostalCode'] ?? '';
        $this->addressCity = $data['addressCity'] ?? '';
        $this->phoneNumber = $data['phoneNumber'] ?? '';
    }

    public function toArray(): array
    {
        return [
            'email' => $this->email,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'organizationName' => $this->organizationName,
            'enterpriseNumber' => $this->enterpriseNumber,
            'vatNumber' => $this->vatNumber,
            'addressStreetAddress' => $this->addressStreetAddress,
            'addressCountry' => $this->addressCountry,
            'addressPostalCode' => $this->addressPostalCode,
            'addressCity' => $this->addressCity,
            'phoneNumber' => $this->phoneNumber,
        ];
    }
}