<?php

namespace UniPayment\SDK\Model;

/**
 * Exchange Rate
 *
 * @category Class
 * @package  UniPayment\SDK\Model
 */
class ExchangeRate
{
    private string $from;
    private string $to;
    private float $rate;
    private float $ask;
    private float $bid;

    public function getFrom(): string
    {
        return $this->from;
    }

    public function setFrom(string $from): void
    {
        $this->from = $from;
    }

    public function getTo(): string
    {
        return $this->to;
    }

    public function setTo(string $to): void
    {
        $this->to = $to;
    }

    public function getRate(): float
    {
        return $this->rate;
    }

    public function setRate(float $rate): void
    {
        $this->rate = $rate;
    }

    public function getAsk(): float
    {
        return $this->ask;
    }

    public function setAsk(float $ask): void
    {
        $this->ask = $ask;
    }

    public function getBid(): float
    {
        return $this->bid;
    }

    public function setBid(float $bid): void
    {
        $this->bid = $bid;
    }
}
