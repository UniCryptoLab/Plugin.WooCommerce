<?php

namespace UniPayment\SDK\Model;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Payment Destination
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class PaymentDestination
{
    private ?string $network;
    private ?string $address;
    private ?string $id;
    /**
     * @SerializedName("owner_id")
     */
    private ?string $ownerId;
    /**
     * @SerializedName("asset_type")
     */
    private ?string $assetType;
    /**
     * @SerializedName("account_number")
     */
    private ?string $accountNumber;
    /**
     * @SerializedName("friendly_name")
     */
    private ?string $friendlyName;
    /**
     * @SerializedName("beneficiary_name")
     */
    private ?string $beneficiaryName;
    /**
     * @SerializedName("beneficiary_address")
     */
    private ?string $beneficiaryAddress;
    /**
     * @SerializedName("beneficiary_city")
     */
    private ?string $beneficiaryCity;
    /**
     * @SerializedName("beneficiary_state")
     */
    private ?string $beneficiaryState;
    /**
     * @SerializedName("beneficiary_country")
     */
    private ?string $beneficiaryCountry;
    /**
     * @SerializedName("beneficiary_zipcode")
     */
    private ?string $beneficiaryZipcode;
    private ?string $iban;
    /**
     * @SerializedName("routing_number")
     */
    private ?string $routing_number;
    private ?string $bic;
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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): void
    {
        $this->address = $address;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    public function getOwnerId(): ?string
    {
        return $this->ownerId;
    }

    public function setOwnerId(?string $ownerId): void
    {
        $this->ownerId = $ownerId;
    }

    public function getAssetType(): ?string
    {
        return $this->assetType;
    }

    public function setAssetType(?string $assetType): void
    {
        $this->assetType = $assetType;
    }

    public function getAccountNumber(): ?string
    {
        return $this->accountNumber;
    }

    public function setAccountNumber(?string $accountNumber): void
    {
        $this->accountNumber = $accountNumber;
    }

    public function getFriendlyName(): ?string
    {
        return $this->friendlyName;
    }

    public function setFriendlyName(?string $friendlyName): void
    {
        $this->friendlyName = $friendlyName;
    }

    public function getBeneficiaryName(): ?string
    {
        return $this->beneficiaryName;
    }

    public function setBeneficiaryName(?string $beneficiaryName): void
    {
        $this->beneficiaryName = $beneficiaryName;
    }

    public function getBeneficiaryAddress(): ?string
    {
        return $this->beneficiaryAddress;
    }

    public function setBeneficiaryAddress(?string $beneficiaryAddress): void
    {
        $this->beneficiaryAddress = $beneficiaryAddress;
    }

    public function getBeneficiaryCity(): ?string
    {
        return $this->beneficiaryCity;
    }

    public function setBeneficiaryCity(?string $beneficiaryCity): void
    {
        $this->beneficiaryCity = $beneficiaryCity;
    }

    public function getBeneficiaryState(): ?string
    {
        return $this->beneficiaryState;
    }

    public function setBeneficiaryState(?string $beneficiaryState): void
    {
        $this->beneficiaryState = $beneficiaryState;
    }

    public function getBeneficiaryCountry(): ?string
    {
        return $this->beneficiaryCountry;
    }

    public function setBeneficiaryCountry(?string $beneficiaryCountry): void
    {
        $this->beneficiaryCountry = $beneficiaryCountry;
    }

    public function getBeneficiaryZipcode(): ?string
    {
        return $this->beneficiaryZipcode;
    }

    public function setBeneficiaryZipcode(?string $beneficiaryZipcode): void
    {
        $this->beneficiaryZipcode = $beneficiaryZipcode;
    }

    public function getIban(): ?string
    {
        return $this->iban;
    }

    public function setIban(?string $iban): void
    {
        $this->iban = $iban;
    }

    public function getRoutingNumber(): ?string
    {
        return $this->routing_number;
    }

    public function setRoutingNumber(?string $routing_number): void
    {
        $this->routing_number = $routing_number;
    }

    public function getBic(): ?string
    {
        return $this->bic;
    }

    public function setBic(?string $bic): void
    {
        $this->bic = $bic;
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