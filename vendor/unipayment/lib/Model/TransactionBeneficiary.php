<?php

namespace UniPayment\SDK\Model;

/**
 * Transaction Beneficiary
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class TransactionBeneficiary
{
    private ?string $beneficiaryCity = null;
    private ?string $beneficiaryName = null;
    private ?string $beneficiaryState = null;
    private ?string $beneficiaryTitle = null;
    private ?string $beneficiaryAddress = null;
    private ?string $beneficiaryCountry = null;
    private ?string $beneficiaryZipCode = null;

    public function getBeneficiaryCity(): ?string
    {
        return $this->beneficiaryCity;
    }

    public function setBeneficiaryCity(?string $beneficiaryCity): void
    {
        $this->beneficiaryCity = $beneficiaryCity;
    }

    public function getBeneficiaryName(): ?string
    {
        return $this->beneficiaryName;
    }

    public function setBeneficiaryName(?string $beneficiaryName): void
    {
        $this->beneficiaryName = $beneficiaryName;
    }

    public function getBeneficiaryState(): ?string
    {
        return $this->beneficiaryState;
    }

    public function setBeneficiaryState(?string $beneficiaryState): void
    {
        $this->beneficiaryState = $beneficiaryState;
    }

    public function getBeneficiaryTitle(): ?string
    {
        return $this->beneficiaryTitle;
    }

    public function setBeneficiaryTitle(?string $beneficiaryTitle): void
    {
        $this->beneficiaryTitle = $beneficiaryTitle;
    }

    public function getBeneficiaryAddress(): ?string
    {
        return $this->beneficiaryAddress;
    }

    public function setBeneficiaryAddress(?string $beneficiaryAddress): void
    {
        $this->beneficiaryAddress = $beneficiaryAddress;
    }

    public function getBeneficiaryCountry(): ?string
    {
        return $this->beneficiaryCountry;
    }

    public function setBeneficiaryCountry(?string $beneficiaryCountry): void
    {
        $this->beneficiaryCountry = $beneficiaryCountry;
    }

    public function getBeneficiaryZipCode(): ?string
    {
        return $this->beneficiaryZipCode;
    }

    public function setBeneficiaryZipCode(?string $beneficiaryZipCode): void
    {
        $this->beneficiaryZipCode = $beneficiaryZipCode;
    }

}