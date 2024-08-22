<?php

namespace UniPayment\SDK\Model;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Wallet Balance
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class WalletBalance
{
    /**
     * @SerializedName("asset_type")
     */
    private string $assetType;
    private float $balance;
    /**
     * @SerializedName("frozen_balance")
     */
    private float $frozenBalance;
    /**
     * @SerializedName("reversed_balance")
     */
    private float $reversedBalance;
    private float $available;

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

    public function getFrozenBalance(): float
    {
        return $this->frozenBalance;
    }

    public function setFrozenBalance(float $frozenBalance): void
    {
        $this->frozenBalance = $frozenBalance;
    }

    public function getReversedBalance(): float
    {
        return $this->reversedBalance;
    }

    public function setReversedBalance(float $reversedBalance): void
    {
        $this->reversedBalance = $reversedBalance;
    }

    public function getAvailable(): float
    {
        return $this->available;
    }

    public function setAvailable(float $available): void
    {
        $this->available = $available;
    }
}
