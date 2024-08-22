<?php

namespace UniPayment\SDK\Model;

/**
 * Bank Detail
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class BankDetail
{
    private ?string $bankName = null;
    private ?string $bankAddress = null;
    private ?string $bankCountry = null;

    public function getBankName(): ?string
    {
        return $this->bankName;
    }

    public function setBankName(?string $bankName): void
    {
        $this->bankName = $bankName;
    }

    public function getBankAddress(): ?string
    {
        return $this->bankAddress;
    }

    public function setBankAddress(?string $bankAddress): void
    {
        $this->bankAddress = $bankAddress;
    }

    public function getBankCountry(): ?string
    {
        return $this->bankCountry;
    }

    public function setBankCountry(?string $bankCountry): void
    {
        $this->bankCountry = $bankCountry;
    }

}