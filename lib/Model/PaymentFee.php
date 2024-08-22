<?php

namespace UniPayment\SDK\Model;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Payment Fee
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class PaymentFee
{
    /**
     * @SerializedName("asset_type")
     */
    private string $assetType;
    private string $network;

    /**
     * @SerializedName("fee_type")
     */
    private string $feeType;

    /**
     * @SerializedName("fee_rate")
     */
    private float $feeRate;

    /**
     * @SerializedName("flat_rate")
     */
    private float $flatRate;

    /**
     * @SerializedName("min_txn_fee")
     */
    private ?float $minTransactionFee = null;

    /**
     * @SerializedName("max_txn_fee")
     */
    private ?float $maxTransactionFee = null;

    public function getAssetType(): string
    {
        return $this->assetType;
    }

    public function setAssetType(string $assetType): void
    {
        $this->assetType = $assetType;
    }

    public function getNetwork(): string
    {
        return $this->network;
    }

    public function setNetwork(string $network): void
    {
        $this->network = $network;
    }

    public function getFeeType(): string
    {
        return $this->feeType;
    }

    public function setFeeType(string $feeType): void
    {
        $this->feeType = $feeType;
    }

    public function getFeeRate(): float
    {
        return $this->feeRate;
    }

    public function setFeeRate(float $feeRate): void
    {
        $this->feeRate = $feeRate;
    }

    public function getFlatRate(): float
    {
        return $this->flatRate;
    }

    public function setFlatRate(float $flatRate): void
    {
        $this->flatRate = $flatRate;
    }

    public function getMinTransactionFee(): ?float
    {
        return $this->minTransactionFee;
    }

    public function setMinTransactionFee(?float $minTransactionFee): void
    {
        $this->minTransactionFee = $minTransactionFee;
    }

    public function getMaxTransactionFee(): ?float
    {
        return $this->maxTransactionFee;
    }

    public function setMaxTransactionFee(?float $maxTransactionFee): void
    {
        $this->maxTransactionFee = $maxTransactionFee;
    }
}