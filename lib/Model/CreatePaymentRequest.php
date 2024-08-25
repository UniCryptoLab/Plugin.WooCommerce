<?php

namespace UniPayment\SDK\Model;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Create Payment Request
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class CreatePaymentRequest
{
    /**
     * @SerializedName("from_account_id")
     */
    private string $fromAccountId;
    /**
     * @SerializedName("asset_type")
     */
    private string $assetType;
    private float $amount;
    /**
     * @SerializedName("payment_method_id")
     */
    private string $paymentMethodId;
    /**
     * @SerializedName("to_account_id")
     */
    private string $toAccountId;
    private string $reason;
    private string $reference;
    private string $note;
    /**
     * @SerializedName("unique_id")
     */
    private string $uniqueId;

    public function getFromAccountId(): string
    {
        return $this->fromAccountId;
    }

    public function setFromAccountId(string $fromAccountId): void
    {
        $this->fromAccountId = $fromAccountId;
    }

    public function getAssetType(): string
    {
        return $this->assetType;
    }

    public function setAssetType(string $assetType): void
    {
        $this->assetType = $assetType;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    public function getPaymentMethodId(): string
    {
        return $this->paymentMethodId;
    }

    public function setPaymentMethodId(string $paymentMethodId): void
    {
        $this->paymentMethodId = $paymentMethodId;
    }

    public function getToAccountId(): string
    {
        return $this->toAccountId;
    }

    public function setToAccountId(string $toAccountId): void
    {
        $this->toAccountId = $toAccountId;
    }

    public function getReason(): string
    {
        return $this->reason;
    }

    public function setReason(string $reason): void
    {
        $this->reason = $reason;
    }

    public function getReference(): string
    {
        return $this->reference;
    }

    public function setReference(string $reference): void
    {
        $this->reference = $reference;
    }

    public function getNote(): string
    {
        return $this->note;
    }

    public function setNote(string $note): void
    {
        $this->note = $note;
    }

    public function getUniqueId(): string
    {
        return $this->uniqueId;
    }

    public function setUniqueId(string $uniqueId): void
    {
        $this->uniqueId = $uniqueId;
    }
}
