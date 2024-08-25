<?php

namespace UniPayment\SDK\Model;

use DateTime;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

/**
 * Exchange Order
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class ExchangeOrder extends Quote
{
    private string $id;

    /**
     * @SerializedName("status")
     */
    private string $status;

    /**
     * @SerializedName("exchange_amount")
     */
    private float $exchangeAmount;

    /**
     * @SerializedName("create_time")
     * @Type("DateTime<'Y-m-d\TH:i:s'>")
     */
    private ?DateTime $createTime;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getExchangeAmount(): float
    {
        return $this->exchangeAmount;
    }

    public function setExchangeAmount(float $exchangeAmount): void
    {
        $this->exchangeAmount = $exchangeAmount;
    }

    public function getCreateTime(): ?DateTime
    {
        return $this->createTime;
    }

    public function setCreateTime(?DateTime $createTime): void
    {
        $this->createTime = $createTime;
    }
}