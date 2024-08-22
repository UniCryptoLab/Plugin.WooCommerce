<?php

namespace UniPayment\SDK\Model;

use DateTime;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Payment
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class Payment
{
    private string $id;
    #[SerializedName('customer_id')]
    private string $customerId;
    #[SerializedName('transfer_method')]
    private string $transferMethod;
    private string $network;
    #[SerializedName('asset_type')]
    private string $assetType;
    #[SerializedName('from_account_id')]
    private ?string $fromAccountId;
    private PaymentDestination $destination;
    private float $amount;
    private float $fee;
    #[SerializedName('total_amount')]
    private float $totalAmount;
    private ?string $reference = null;
    private ?string $reason = null;
    private ?string $note = null;
    private PaymentStatus $status;
    /**
     * @var DateTime
     */
    #[SerializedName('create_time')]
    private mixed $createTime;
    /**
     * @var DateTime
     */
    #[SerializedName('update_time')]
    private mixed $updateTime;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getCustomerId(): string
    {
        return $this->customerId;
    }

    public function setCustomerId(string $customerId): void
    {
        $this->customerId = $customerId;
    }

    public function getTransferMethod(): string
    {
        return $this->transferMethod;
    }

    public function setTransferMethod(string $transferMethod): void
    {
        $this->transferMethod = $transferMethod;
    }

    public function getNetwork(): string
    {
        return $this->network;
    }

    public function setNetwork(string $network): void
    {
        $this->network = $network;
    }

    public function getAssetType(): string
    {
        return $this->assetType;
    }

    public function setAssetType(string $assetType): void
    {
        $this->assetType = $assetType;
    }

    public function getFromAccountId(): ?string
    {
        return $this->fromAccountId;
    }

    public function setFromAccountId(?string $fromAccountId): void
    {
        $this->fromAccountId = $fromAccountId;
    }

    public function getDestination(): PaymentDestination
    {
        return $this->destination;
    }

    public function setDestination(PaymentDestination $destination): void
    {
        $this->destination = $destination;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    public function getFee(): float
    {
        return $this->fee;
    }

    public function setFee(float $fee): void
    {
        $this->fee = $fee;
    }

    public function getTotalAmount(): float
    {
        return $this->totalAmount;
    }

    public function setTotalAmount(float $totalAmount): void
    {
        $this->totalAmount = $totalAmount;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): void
    {
        $this->reference = $reference;
    }

    public function getReason(): ?string
    {
        return $this->reason;
    }

    public function setReason(?string $reason): void
    {
        $this->reason = $reason;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): void
    {
        $this->note = $note;
    }

    public function getStatus(): PaymentStatus
    {
        return $this->status;
    }

    public function setStatus(PaymentStatus $status): void
    {
        $this->status = $status;
    }

    /**
     * @return DateTime
     */
    public function getCreateTime(): mixed
    {
        return $this->createTime;
    }

    public function setCreateTime(mixed $createTime): void
    {
        $this->createTime = $createTime;
    }

    /**
     * @return DateTime
     */
    public function getUpdateTime(): mixed
    {
        return $this->updateTime;
    }

    public function setUpdateTime(mixed $updateTime): void
    {
        $this->updateTime = $updateTime;
    }
}