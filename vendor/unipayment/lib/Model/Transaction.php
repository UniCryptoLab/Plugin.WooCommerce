<?php

namespace UniPayment\SDK\Model;

use DateTime;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Transaction
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class Transaction
{
    private string $id;
    private float $amount;
    private string $assetType;
    private float $balance;
    #[SerializedName('txn_type')]
    private mixed $txnType;
    private Direction $direction;
    private string $note;
    #[SerializedName('ref_id')]
    private string $referenceId;
    private TransactionData $data;

    /**
     * @var DateTime
     */
    #[SerializedName('create_time')]
    private mixed $createTime;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    public function getAssetType(): string
    {
        return $this->assetType;
    }

    public function setAssetType(string $assetType): void
    {
        $this->assetType = $assetType;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    public function setBalance(float $balance): void
    {
        $this->balance = $balance;
    }

    public function getTxnType(): mixed
    {
        return $this->txnType;
    }

    public function setTxnType(mixed $txnType): void
    {
        $this->txnType = $txnType;
    }

    public function getDirection(): Direction
    {
        return $this->direction;
    }

    public function setDirection(Direction $direction): void
    {
        $this->direction = $direction;
    }

    public function getNote(): string
    {
        return $this->note;
    }

    public function setNote(string $note): void
    {
        $this->note = $note;
    }

    public function getReferenceId(): string
    {
        return $this->referenceId;
    }

    public function setReferenceId(string $referenceId): void
    {
        $this->referenceId = $referenceId;
    }

    public function getData(): TransactionData
    {
        return $this->data;
    }

    public function setData(TransactionData $data): void
    {
        $this->data = $data;
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
}
