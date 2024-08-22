<?php

namespace UniPayment\SDK\Model;


use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Deposit Bank Account
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class DepositBankAccount
{
    private ?string $network;
    #[SerializedName('account_number')]
    private ?string $accountNumber;
    private ?string $iban;
    private ?string $bic;
    #[SerializedName('routing_number')]
    private ?string $routingNumber;
    private ?Beneficiary $beneficiary;
    private ?BankInfo $bankInfo;
    private ?string $reference;

    public function getNetwork(): ?string
    {
        return $this->network;
    }

    public function setNetwork(?string $network): void
    {
        $this->network = $network;
    }

    public function getAccountNumber(): ?string
    {
        return $this->accountNumber;
    }

    public function setAccountNumber(?string $accountNumber): void
    {
        $this->accountNumber = $accountNumber;
    }

    public function getIban(): ?string
    {
        return $this->iban;
    }

    public function setIban(?string $iban): void
    {
        $this->iban = $iban;
    }

    public function getBic(): ?string
    {
        return $this->bic;
    }

    public function setBic(?string $bic): void
    {
        $this->bic = $bic;
    }

    public function getRoutingNumber(): ?string
    {
        return $this->routingNumber;
    }

    public function setRoutingNumber(?string $routingNumber): void
    {
        $this->routingNumber = $routingNumber;
    }

    public function getBeneficiary(): ?Beneficiary
    {
        return $this->beneficiary;
    }

    public function setBeneficiary(?Beneficiary $beneficiary): void
    {
        $this->beneficiary = $beneficiary;
    }

    public function getBankInfo(): ?BankInfo
    {
        return $this->bankInfo;
    }

    public function setBankInfo(?BankInfo $bankInfo): void
    {
        $this->bankInfo = $bankInfo;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): void
    {
        $this->reference = $reference;
    }

}