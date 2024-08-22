<?php

namespace UniPayment\SDK\Model;

/**
 * Transaction Data
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class TransactionData
{
    private ?string $id = null;
    private ?float $fee = null;
    private ?string $version = null;
    private ?float $toAmount = null;
    private ?float $amount = null;
    private ?string $customerId = null;
    private ?float $fromAmount = null;
    private ?string $toCurrency = null;
    private ?float $exchangeRate = null;
    private ?string $fromCurrency = null;
    private ?string $note = null;
    private ?TransactionDetail $detail = null;
    private ?TransactionTarget $target = null;
    private ?string $network = null;
    private ?string $assetType = null;
    private ?string $createTime = null;
    private ?string $transferMethod = null;
    private ?string $type = null;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    public function getFee(): ?float
    {
        return $this->fee;
    }

    public function setFee(?float $fee): void
    {
        $this->fee = $fee;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(?string $version): void
    {
        $this->version = $version;
    }

    public function getToAmount(): ?float
    {
        return $this->toAmount;
    }

    public function setToAmount(?float $toAmount): void
    {
        $this->toAmount = $toAmount;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(?float $amount): void
    {
        $this->amount = $amount;
    }

    public function getCustomerId(): ?string
    {
        return $this->customerId;
    }

    public function setCustomerId(?string $customerId): void
    {
        $this->customerId = $customerId;
    }

    public function getFromAmount(): ?float
    {
        return $this->fromAmount;
    }

    public function setFromAmount(?float $fromAmount): void
    {
        $this->fromAmount = $fromAmount;
    }

    public function getToCurrency(): ?string
    {
        return $this->toCurrency;
    }

    public function setToCurrency(?string $toCurrency): void
    {
        $this->toCurrency = $toCurrency;
    }

    public function getExchangeRate(): ?float
    {
        return $this->exchangeRate;
    }

    public function setExchangeRate(?float $exchangeRate): void
    {
        $this->exchangeRate = $exchangeRate;
    }

    public function getFromCurrency(): ?string
    {
        return $this->fromCurrency;
    }

    public function setFromCurrency(?string $fromCurrency): void
    {
        $this->fromCurrency = $fromCurrency;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): void
    {
        $this->note = $note;
    }

    public function getDetail(): ?TransactionDetail
    {
        return $this->detail;
    }

    public function setDetail(?TransactionDetail $detail): void
    {
        $this->detail = $detail;
    }

    public function getTarget(): ?TransactionTarget
    {
        return $this->target;
    }

    public function setTarget(?TransactionTarget $target): void
    {
        $this->target = $target;
    }

    public function getNetwork(): ?string
    {
        return $this->network;
    }

    public function setNetwork(?string $network): void
    {
        $this->network = $network;
    }

    public function getAssetType(): ?string
    {
        return $this->assetType;
    }

    public function setAssetType(?string $assetType): void
    {
        $this->assetType = $assetType;
    }

    public function getCreateTime(): ?string
    {
        return $this->createTime;
    }

    public function setCreateTime(?string $createTime): void
    {
        $this->createTime = $createTime;
    }

    public function getTransferMethod(): ?string
    {
        return $this->transferMethod;
    }

    public function setTransferMethod(?string $transferMethod): void
    {
        $this->transferMethod = $transferMethod;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): void
    {
        $this->type = $type;
    }
}