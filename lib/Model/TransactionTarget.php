<?php

namespace UniPayment\SDK\Model;

/**
 * Transaction Data
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class TransactionTarget
{
    private ?string $bic = null;
    private ?BankDetail $bank = null;
    private ?string $iban = null;
    private ?string $network = null;
    private ?string $reference = null;
    private ?TransactionBeneficiary $beneficiary = null;
    private ?string $accountNumber = null;
    private ?string $routingNumber = null;
    private ?string $intermediaryBank = null;

    public function getBic(): ?string
    {
        return $this->bic;
    }

    public function setBic(?string $bic): void
    {
        $this->bic = $bic;
    }

    public function getBank(): BankDetail
    {
        return $this->bank;
    }

    public function setBank(BankDetail $bank): void
    {
        $this->bank = $bank;
    }

    public function getIban(): ?string
    {
        return $this->iban;
    }

    public function setIban(?string $iban): void
    {
        $this->iban = $iban;
    }

    public function getNetwork(): ?string
    {
        return $this->network;
    }

    public function setNetwork(?string $network): void
    {
        $this->network = $network;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): void
    {
        $this->reference = $reference;
    }

    public function getBeneficiary(): ?TransactionBeneficiary
    {
        return $this->beneficiary;
    }

    public function setBeneficiary(?TransactionBeneficiary $beneficiary): void
    {
        $this->beneficiary = $beneficiary;
    }

    public function getAccountNumber(): ?string
    {
        return $this->accountNumber;
    }

    public function setAccountNumber(?string $accountNumber): void
    {
        $this->accountNumber = $accountNumber;
    }

    public function getRoutingNumber(): ?string
    {
        return $this->routingNumber;
    }

    public function setRoutingNumber(?string $routingNumber): void
    {
        $this->routingNumber = $routingNumber;
    }

    public function getIntermediaryBank(): ?string
    {
        return $this->intermediaryBank;
    }

    public function setIntermediaryBank(?string $intermediaryBank): void
    {
        $this->intermediaryBank = $intermediaryBank;
    }

}