<?php

namespace UniPayment\SDK\Model;

/**
 * Get Quote Request
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class GetQuoteRequest
{
    private string $fromCurrency;
    private string $toCurrency;
    private float $exchangeAmount;

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

    public function getExchangeAmount(): float
    {
        return $this->exchangeAmount;
    }

    public function setExchangeAmount(float $exchangeAmount): void
    {
        $this->exchangeAmount = $exchangeAmount;
    }

    public function __toString()
    {
        // Build the query array
        $queryArray = [
            'from_currency' => $this->fromCurrency,
            'to_currency' => $this->toCurrency,
            'exchange_amount' => $this->exchangeAmount
        ];
        // Create query string
        return http_build_query($queryArray);
    }
}
