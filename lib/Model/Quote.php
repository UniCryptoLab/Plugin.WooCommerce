<?php

namespace UniPayment\SDK\Model;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

use DateTime;

/**
 *  Quote
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class Quote
{
    /**
     * @SerializedName("quote_id")
     */
    private string $quoteId;
    /**
     * @SerializedName("from_currency")
     */
    private string $fromCurrency;
    /**
     * @SerializedName("to_currency")
     */
    private string $toCurrency;
    /**
     * @SerializedName("requested_amount")
     */
    private float $requestedAmount;
    /**
     * @SerializedName("exchange_rate")
     */
    private ?float $exchangeRate;
    /**
     * @SerializedName("gross_amount")
     */
    private ?float $grossAmount;
    /**
     * @SerializedName("net_amount")
     */
    private ?float $netAmount;
    /**
     * @SerializedName("fee_currency")
     */
    private string $feeCurrency;
    private ?float $fee;
    /**
     * @SerializedName("valid_until")
     * @Type("DateTime<'Y-m-d\TH:i:s'>")
     */
    private DateTime $validUtil;

    public function getQuoteId(): string
    {
        return $this->quoteId;
    }

    public function setQuoteId(string $quoteId): void
    {
        $this->quoteId = $quoteId;
    }

    public function getFromCurrency(): string
    {
        return $this->fromCurrency;
    }

    public function setFromCurrency(string $fromCurrency): void
    {
        $this->fromCurrency = $fromCurrency;
    }

    public function getToCurrency(): string
    {
        return $this->toCurrency;
    }

    public function setToCurrency(string $toCurrency): void
    {
        $this->toCurrency = $toCurrency;
    }

    public function getRequestedAmount(): float
    {
        return $this->requestedAmount;
    }

    public function setRequestedAmount(float $requestedAmount): void
    {
        $this->requestedAmount = $requestedAmount;
    }

    public function getExchangeRate(): ?float
    {
        return $this->exchangeRate;
    }

    public function setExchangeRate(?float $exchangeRate): void
    {
        $this->exchangeRate = $exchangeRate;
    }

    public function getGrossAmount(): ?float
    {
        return $this->grossAmount;
    }

    public function setGrossAmount(?float $grossAmount): void
    {
        $this->grossAmount = $grossAmount;
    }

    public function getNetAmount(): ?float
    {
        return $this->netAmount;
    }

    public function setNetAmount(?float $netAmount): void
    {
        $this->netAmount = $netAmount;
    }

    public function getFeeCurrency(): string
    {
        return $this->feeCurrency;
    }

    public function setFeeCurrency(string $feeCurrency): void
    {
        $this->feeCurrency = $feeCurrency;
    }

    public function getFee(): ?float
    {
        return $this->fee;
    }

    public function setFee(?float $fee): void
    {
        $this->fee = $fee;
    }

    public function getValidUtil(): DateTime
    {
        return $this->validUtil;
    }

    public function setValidUtil(DateTime $validUtil): void
    {
        $this->validUtil = $validUtil;
    }
}