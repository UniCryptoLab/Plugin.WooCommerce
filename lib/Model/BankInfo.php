<?php

namespace UniPayment\SDK\Model;

/**
 * Bank Info
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class BankInfo
{
    private string $name;
    private string $address;
    private string $country;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

}