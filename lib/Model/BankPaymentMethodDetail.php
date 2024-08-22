<?php

namespace UniPayment\SDK\Model;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Internal Payment Method Detail
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class BankPaymentMethodDetail extends PaymentMethodDetail
{
    private ?string $network;
    /**
     * @SerializedName("account_number")
     */
    private ?string $accountNumber;
    private ?string $iban;
    private ?string $bic;
    /**
     * @SerializedName("routing_number")
     */
    private ?string $routingNumber;
    /**
     * @SerializedName("bank_identifier")
     */
    private ?string $bankIdentifier;
    private ?string $reference;
    /**
     * @SerializedName("bank_name")
     */
    private ?string $bankName;
    /**
     * @SerializedName("bank_address")
     */
    private ?string $bankAddress;
    /**
     * @SerializedName("bank_country")
     */
    private ?string $bankCountry;
    /**
     * @SerializedName("intermediary_bank_name")
     */
    private ?string $intermediaryBankName;
    /**
     * @SerializedName("intermediary_account_number")
     */
    private ?string $intermediaryAccountNumber;
    /**
     * @SerializedName("intermediary_bic")
     */
    private ?string $intermediaryBic;

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

    public function getBankIdentifier(): ?string
    {
        return $this->bankIdentifier;
    }

    public function setBankIdentifier(?string $bankIdentifier): void
    {
        $this->bankIdentifier = $bankIdentifier;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): void
    {
        $this->reference = $reference;
    }

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

    public function getIntermediaryBankName(): ?string
    {
        return $this->intermediaryBankName;
    }

    public function setIntermediaryBankName(?string $intermediaryBankName): void
    {
        $this->intermediaryBankName = $intermediaryBankName;
    }

    public function getIntermediaryAccountNumber(): ?string
    {
        return $this->intermediaryAccountNumber;
    }

    public function setIntermediaryAccountNumber(?string $intermediaryAccountNumber): void
    {
        $this->intermediaryAccountNumber = $intermediaryAccountNumber;
    }

    public function getIntermediaryBic(): ?string
    {
        return $this->intermediaryBic;
    }

    public function setIntermediaryBic(?string $intermediaryBic): void
    {
        $this->intermediaryBic = $intermediaryBic;
    }

}